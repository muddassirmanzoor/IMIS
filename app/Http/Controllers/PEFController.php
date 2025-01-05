<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\DataRepository;
use App\Repositories\TeacherRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class PEFController extends Controller
{
    /**
     * @param $district_id
     * @param TeacherRepository $teacherRepository
     * @return View
     */
    public function districtTeacherList($district_id, TeacherRepository $teacherRepository) : View{
        $request['district'] = decrypt($district_id);
        $data = $teacherRepository->getPEFFilterTeacherListingData($request);
        $teachers = $data['filter_teachers'];
        return view('imis.teacher.pef.district_teacher_list', compact('teachers'));
    }

}
