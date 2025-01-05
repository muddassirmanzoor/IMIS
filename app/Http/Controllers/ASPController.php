<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\DataRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ASPController extends Controller
{
    const CACHE_LIFE_TIME = 24;
    protected Carbon $expiresAt;
    protected DataRepository $dataRepository;

    public function __construct(DataRepository $dataRepository)
    {
        $this->expiresAt = Carbon::now()->addDays(self::CACHE_LIFE_TIME);
        $this->dataRepository = $dataRepository;
    }

    /**
     * @return View
     */
    public function schools() : View{

        $data = Cache::remember('asp', $this->expiresAt, function (){
            return $this->dataRepository->getASPGraphData();
        });

        return view('asp.schools', compact('data'));
    }

    /**
     * @return View
     */
    public function students() :View{

        $data = Cache::remember('asp', $this->expiresAt, function () {
            return $this->dataRepository->getASPGraphData();
        });

        return view('asp.students', compact('data'));
    }

    /**
     * @return View
     */
    public function teachers() :View{

        $data = Cache::remember('asp', $this->expiresAt, function () {
            return $this->dataRepository->getASPGraphData();
        });

        return view('asp.teachers', compact('data'));
    }

}
