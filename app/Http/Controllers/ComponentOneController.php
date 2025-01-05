<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\ComponentOneRepository;
use App\Repositories\DataRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ComponentOneController extends Controller
{
    const CACHE_LIFE_TIME = 24;
    protected Carbon $expiresAt;
    protected ComponentOneRepository $componentOneRepository;

    public function __construct(ComponentOneRepository $componentOneRepository)
    {
        $this->expiresAt = Carbon::now()->addDays(self::CACHE_LIFE_TIME);
        $this->componentOneRepository = $componentOneRepository;
    }

    /**
     * @return View
     */
    public function cpdp() : View{

        return view('component1.cpdp');
    }

    /**
     * @return View
     */
    public function oosc() :View{

        $data = Cache::remember('fln', $this->expiresAt, function (){
            return $this->componentOneRepository->getFlnData();
        });

        return view('component1.oosc.oosc', compact('data'));
    }

    /**
     * @return View
     */
    public function oosc_2024(Request $request, $district = null, $tehsil = null, $markaz = null) :View{
        if($district){
            $district = decrypt($district);
        }
        if($tehsil){
            $tehsil = decrypt($tehsil);
        }
        if($markaz){
            $markaz = decrypt($markaz);
        }

        // Generate a unique cache key based on the method parameters
        $cacheKey = "fln_data_2024_{$district}_{$tehsil}_{$markaz}";
        $cacheDuration = 60 * 60 * 24 * 60; // Cache duration in minutes

        // Retrieve the data from cache or execute the method if not cached
        $data = Cache::remember($cacheKey, $cacheDuration, function () use ($district, $tehsil, $markaz) {
            return $this->componentOneRepository->getFlnData_2024($district, $tehsil, $markaz);
        });

        $districts = $data['graph_data']['districts_list'];
        $tehsils = $data['graph_data']['tehsil_list'];
        $markazs = $data['graph_data']['markaz_list'];
        $selectedDistrict = $district;
        $selectedTehsil = $tehsil;
        $selectedMarkaz = $markaz;
        return view('component1.oosc.oosc_2024', compact('data','districts','selectedDistrict',
            'tehsils','selectedTehsil', 'selectedMarkaz', 'markazs'));
    }

    /**
     * @return View
     */
    public function campsListing(Request $request) :View{

        $district = $request->district;
        $tehsil = $request->tehsil;
        $markaz = $request->markaz;
        $camps = $this->componentOneRepository->getFlnCamps_2024($district, $tehsil, $markaz);
        return view('component1.oosc.camps_list', compact('camps'));
    }
    /**
     * @return View
     */
    public function districtWiseEnrollment() :View{

        $enrollment = $this->componentOneRepository->getFlnDistrictWiseEnrollment_2024();
        return view('component1.oosc.district_enrollment', compact('enrollment'));
    }
    /**
     * @return View
     */
    public function districtEnrollmentList($district, $tehsil = null, $markaz = null) :View{
        $district = decrypt($district);
        if($tehsil){
            $tehsil = decrypt($tehsil);
        }
        if($markaz){
            $markaz = decrypt($markaz);
        }
        $enrollment = $this->componentOneRepository->getFlnDistrictEnrollmentList_2024($district, $tehsil, $markaz);
        return view('component1.oosc.district_enrollment_list', compact('enrollment'));
    }
    /**
     * @return View
     */
    public function ooscEnrollmentList($district, $tehsil = null, $markaz = null) :View{
        $district = decrypt($district);
        if($tehsil){
            $tehsil = decrypt($tehsil);
        }
        if($markaz){
            $markaz = decrypt($markaz);
        }
        $enrollment = $this->componentOneRepository->getFlnOOSCEnrollmentList_2024($district, $tehsil, $markaz);
        return view('component1.oosc.district_enrollment_list', compact('enrollment'));
    }

    /**
     * @return View
     */
    public function campsAttendance(Request $request, $district = null, $tehsil = null, $markaz = null) :View{
        if($district){
            $district = decrypt($district);
        }
        if($tehsil){
            $tehsil = decrypt($tehsil);
        }
        if($markaz){
            $markaz = decrypt($markaz);
        }

        $attendance = $this->componentOneRepository->getFlnCampsAttendance_2024($district, $tehsil, $markaz);
        return view('component1.oosc.camps_attendance', compact('attendance'));
    }

    /**
     * @return View
     */
    public function campsComplaints(Request $request, $district = null, $tehsil = null, $markaz = null) :View{
        if($district){
            $district = decrypt($district);
        }
        if($tehsil){
            $tehsil = decrypt($tehsil);
        }
        if($markaz){
            $markaz = decrypt($markaz);
        }

        $complaints = $this->componentOneRepository->getFlnCampsComplaints_2024($district, $tehsil, $markaz);
        return view('component1.oosc.camps_complaints', compact('complaints'));
    }

    /**
     * @return View
     */
    public function resolveComplaint(Request $request) :JsonResponse{
        $complaint_id = $request->id;

        $this->componentOneRepository->getFlnResolveComplaint_2024($complaint_id);
        return response()->json(['success' => true]);
    }

    /**
     * @return View
     */
    public function nfei() :View{
        $data = Cache::remember('lnfbd', $this->expiresAt, function (){
            return $this->componentOneRepository->getLNFBDData();
        });
        return view('component1.nfei', compact('data'));
    }

}
