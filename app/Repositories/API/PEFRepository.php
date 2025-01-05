<?php

namespace App\Repositories\API;


use App\Models\LNFBDLearners;
use App\Models\LNFBDSchools;
use App\Models\LNFBDTeachers;
use App\Models\PEFSchools;
use App\Models\PEFStudents;
use App\Models\PEFTeachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PEFRepository
{
    public function storeData($data, $attribute) {

        if($attribute == 'Schools'){
            $this->updateSchools($data);
        }elseif($attribute == 'Teachers'){
            $this->updateTeachers($data);
        }elseif($attribute == 'Students'){
            $this->updateStudents($data);
        }
        return true;
    }

    public function updateSchools($schools) : array{

        DB::beginTransaction();
        try {
            set_time_limit(2500);
            foreach ($schools as $school) {
                $school = (array)$school;
                $school['SchoolAddress'] = preg_replace('/\s+/', ' ', trim($school['SchoolAddress']));
                $school['RegisterdFor'] = preg_replace('/\s+/', ' ', trim($school['RegisterdFor']));
                $school['SchoolLevel'] = preg_replace('/\s+/', ' ', trim($school['SchoolLevel']));
                PEFSchools::create($school);
            }
            DB::commit();
        }catch (\Exception $e) {
            DB::rollback();
            // Handle the exception
            dd($e);
        }
        return $schools;

    }

    public function updateTeachers($teachers) : array{
        Cache::put('teachers', $teachers, 60);

        DB::beginTransaction();
        try {
            ini_set('memory_limit', '900241M');

            set_time_limit(25000);

            foreach ($teachers as $teacher) {
                $teacher = (array)$teacher;
                $teacher['SchoolCode'] = preg_replace('/\s+/', ' ', trim($teacher['SchoolCode']));
                PEFTeachers::create($teacher);

//                LNFBDTeachers::create($teacher);
            }
//            foreach ($teachers as $teacher) {
//                $teacher = (array)$teacher;
//                $exist = LNFBDTeachers::where('teacher_id', $teacher['teacher_id'])->first();
//                if($exist){
//                    $exist->school_districtIdFK = $teacher['school_districtIdFK'];
//                    $exist->PITB_tehsil_id = $teacher['PITB_tehsil_id'];
//                    $exist->save();
//                }
////                LNFBDTeachers::create($teacher);
//            }
            DB::commit();
        }catch (\Exception $e) {
            DB::rollback();
            // Handle the exception
            dd($e);
        }
dd($teachers);

    }

    public function updateStudents($students) : array{
        Cache::put('students', $students, 60);
//        DB::beginTransaction();
        try {
            ini_set('memory_limit', '900241M');

            set_time_limit(25000);
            $cachedApiResponse = Cache::get('students');
            // Define the chunk size
            $chunkSize = 10000; // Adjust as needed
            //// Process the data in chunks
            collect($cachedApiResponse)->chunk($chunkSize)->each(function ($chunk) {
                // Inside this callback, $chunk is an array containing a chunk of data

                foreach ($chunk as $item) {
                    $learner = (array)$item;
                    $learner['Gender'] = preg_replace('/\s+/', ' ', trim($learner['Gender']));
                    $learner['FatherName'] = str_replace('`', '', $learner['FatherName']);
                    $learner['FatherName'] = preg_replace('/\s+/', ' ', trim($learner['FatherName']));
                    $learner['SchoolAdress'] = preg_replace('/[\s()+=>]+/', ' ', trim($learner['SchoolAdress']));
                    $learner['StudentAdress'] = preg_replace('/[\s()+=>]+/', ' ', trim($learner['StudentAdress']));

                    PEFStudents::create($learner);
                }
            });
//            set_time_limit(1500);
//            foreach ($learners as $learner) {
//                $learner = (array)$learner;
//                $exist = LNFBDLearners::where('lnfbd_id', $learner['id'])->first();
//
//                if($exist){
//                    $exist->PITB_tehsil_id = $learner['PITB_tehsil_id'];
//                    $exist->save();
//                }
////                LNFBDLearners::create($learner);
//            }
//            DB::commit();
        }catch (\Exception $e) {
            DB::rollback();
            // Handle the exception
            dd($e);
        }
dd($students);

    }

}
