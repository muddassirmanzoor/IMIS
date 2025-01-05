<?php

namespace App\Http\Controllers;

use App\Repositories\SchoolRepository;
use App\Repositories\StudentRepository;
use App\Repositories\TeacherRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class IMISController extends Controller
{
    const CACHE_LIFE_TIME = 24;

    public function __construct()
    {
        $this->expiresAt = Carbon::now()->addDays(self::CACHE_LIFE_TIME);
        $this->ztp_districts = ['BAHAWALNAGAR', 'BAHAWALPUR', 'BHAKKAR', 'CHINIOT', 'D.G. KHAN', 'JHANG', 'KASUR', 'KHANEWAL', 'LAYYAH','LODHRAN', 'MUZAFFARGARH', 'OKARA', 'PAPKATTAN', 'RAJANPUR', 'RAHIMYAR KHAN', 'VEHARI'];
    }

    /**
     * @param Request $request
     * @param SchoolRepository $schoolRepository
     * @return View
     */
    public function schools(Request $request, SchoolRepository $schoolRepository) : View{
        $date = Carbon::now()->subYear()->format('Y');

        $data = $schoolRepository->getSchoolsData($request, $date, $this->expiresAt);

        if($request['school_type'] == 2){
            $view = 'imis.school.lnfbd.school_lnfbd';
        }elseif($request['school_type'] == 3){
            $view = 'imis.school.sped.school_sped';
        } elseif($request['school_type'] == 5){
            $view = 'imis.school.pef.school_pef';
        } else{
            $view = $request['emis_code'] ? 'imis.school.about_school':'imis.school.sed.school_sed';
        }
        $ztp_districts = $this->ztp_districts;

        return view($view, compact('data','ztp_districts'));
    }

    /**
     * @param Request $request
     * @param StudentRepository $studentRepository
     * @return View
     */
    public function students(Request $request, StudentRepository $studentRepository) :View{
        $date = Carbon::now()->subYear()->format('Y');
        ini_set('memory_limit', '90241M');

        $data = $studentRepository->getStudentsData($request, $date, $this->expiresAt);

        if($request['school_type'] == 2){
            $view = 'imis.student.lnfbd.student_lnfbd';
        }elseif($request['school_type'] == 3){
            $view = 'imis.student.sped.student_sped';
        }elseif($request['school_type'] == 5){
            $view = 'imis.student.pef.student_pef';
        }else{
            $view = 'imis.student.sed.student_sed';
        }
        return view($view, compact('data'));

    }

    /**
     * @param Request $request
     * @param TeacherRepository $teacherRepository
     * @return View
     */
    public function teachers(Request $request, TeacherRepository $teacherRepository) :View{
        $date = Carbon::now()->subYear()->format('Y');

        $data = $teacherRepository->getTeachersData($request, $date, $this->expiresAt);

        if($request['school_type'] == 2){
            $view = 'imis.teacher.lnfbd.teacher_lnfbd';
        }elseif($request['school_type'] == 3){
            $view = 'imis.teacher.sped.teacher_sped';
        }elseif($request['school_type'] == 5){
            $view = 'imis.teacher.pef.teacher_pef';
        }else{
            $view = 'imis.teacher.sed.teacher_sed';
        }
        return view($view, compact('data'));
    }

    /**
     * @return View
     */
    public function aboutSchool() :View{

        return view('about_school');
    }

    /**
     * @return View
     */
    public function classList($school_id, SchoolRepository $schoolRepository) :View{
        $school_id = decrypt($school_id);
        $classes = $schoolRepository->getSEDSchoolClassData($school_id);
        return view('imis.school.class_list', compact('classes'));
    }

    /**
     * @return View
     */
    public function aboutClass($school_id, $class_id, SchoolRepository $schoolRepository) :View{
        $school_id = decrypt($school_id);
        $class_id = decrypt($class_id);
        $data = $schoolRepository->getSEDSchoolClassStudentsData($school_id, $class_id);
        $students = $data['students'];
        $school = $data['school'];

        return view('imis.student.student_list', compact('students', 'school'));
    }

    /**
     * @return View
     */
    public function aboutStudent($student_id,  StudentRepository $studentRepository) :View{
        $student_id = decrypt($student_id);
        $data = $studentRepository->getSEDStudentProfile($student_id);
        $student = $data['student'];
        $transfer_logs = $data['transfer_logs'];
        $rejoin_logs = $data['rejoin_logs'];
        $ztp_districts = $this->ztp_districts;

        return view('imis.student.about_student', compact('student','transfer_logs', 'rejoin_logs','ztp_districts'));
    }

    /**
     */
    public function pdfStudent($student_id,  StudentRepository $studentRepository) {
        $student_id = decrypt($student_id);
        $data = $studentRepository->getSEDStudentProfile($student_id);
        $student = $data['student'];
        $transfer_logs = $data['transfer_logs'];
        $rejoin_logs = $data['rejoin_logs'];
        $ztp_districts = $this->ztp_districts;
        set_time_limit(25000);

        $pdf = Pdf::loadView('imis.student.student-profile-print', compact('student','transfer_logs', 'rejoin_logs','ztp_districts'))->setPaper('a4');
        $output = $pdf->output();
        return new Response($output, 200, [
            'Content-Type' => 'application/pdf','filename'=>"student.pdf"
        ]);
    }

    /**
     * @param Request $request
     * @param SchoolRepository $schoolRepository
     * @return View
     */
    public function schoolsListing(Request $request, SchoolRepository $schoolRepository) : View{

        $schools = $schoolRepository->getSchoolsListingData($request, $this->expiresAt);

        if($request['school_type'] == 2){
            $view = 'imis.school.lnfbd.school_list';
        }elseif($request['school_type'] == 3){
            $view = 'imis.school.sped.school_list';
        } elseif($request['school_type'] == 5){
            $view = 'imis.school.pef.school_list';
        } else{
            $view = 'imis.school.sed.school_list';
        }

        return view($view, compact('schools','request'));
    }

    /**
     * @param Request $request
     * @param TeacherRepository $teacherRepository
     * @return View
     */
    public function teachersListing(Request $request, TeacherRepository $teacherRepository) : View{

        $teachers = $teacherRepository->getTeachersListingData($request);

        if($request['school_type'] == 2){
            $view = 'imis.teacher.lnfbd.teacher_list';
        }elseif($request['school_type'] == 3){
            $view = 'imis.teacher.sped.teacher_list';
        } elseif($request['school_type'] == 5){
            $view = 'imis.teacher.pef.teacher_list';
        } else{
            $view = 'imis.teacher.sed.teacher_list';
        }
        return view($view, compact('teachers'));
    }

    /**
     * @param Request $request
     * @param StudentRepository $studentRepository
     * @return View
     */
    public function studentsListing(Request $request, StudentRepository $studentRepository) : View{

        $students = $studentRepository->getStudentsListingData($request);

        if($request['school_type'] == 2){
            $view = 'imis.student.lnfbd.student_list';
        }elseif($request['school_type'] == 3){
            $view = 'imis.student.sped.student_list';
        } elseif($request['school_type'] == 5){
            $view = 'imis.student.pef.student_list';
        } else{
            $view = 'imis.student.sed.student_list';
        }
        return view($view, compact('students', 'request'));
    }

    /**
     * @param Request $request
     * @param StudentRepository $studentRepository
     * @return View
     */
    public function searchSEDStudent(Request $request, StudentRepository $studentRepository) {

        $validator = Validator::make($request->all(), [
            'cnic' => 'required_without_all:b_form,emis_code',
            'b_form' => 'required_without_all:cnic,emis_code',
            'emis_code' => 'required_without_all:cnic,b_form',
        ]);

        if ($validator->fails()) {
            // Handle validation failure
            return redirect('/schools');
        }
        $data = $studentRepository->searchSEDStudent($request);
        $students = $data['students'];
        $search_type = $data['search_type'];
        $search_value = $data['search_value'];

        return view('imis.student.search_student_list', compact('students', 'search_type', 'search_value'));
    }

}
