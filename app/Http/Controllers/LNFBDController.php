<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\DataRepository;
use App\Repositories\StudentRepository;
use App\Repositories\TeacherRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class LNFBDController extends Controller
{
    /**
     * @param $district_id
     * @param StudentRepository $studentRepository
     * @return View
     */
    public function districtStudentList($level,$district_id, StudentRepository $studentRepository) : View{
        if($level == 'all'){
            $level = '';
        }
        $request['level'] = $level;
        $request['district'] = decrypt($district_id);
        $students = $studentRepository->getLNFBDFilterStudentListingData($request);

        return view('imis.student.lnfbd.district_student_list', compact('students', 'level'));
    }

}
