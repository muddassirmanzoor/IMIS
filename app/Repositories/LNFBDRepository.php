<?php

namespace App\Repositories;


use App\Http\Traits\ApiConnect;
use App\Models\LNFBDLearners;
use App\Models\LNFBDSchools;
use App\Models\LNFBDTeachers;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LNFBDRepository
{
    use ApiConnect;
    public function storeData($data, $attribute) {

        if($attribute == 'Schools'){
            return $this->updateSchools($data, $attribute);
        }elseif($attribute == 'Teachers'){
            return $this->updateTeachers($data);
        }elseif($attribute == 'Learners'){
            return $this->updateLearners($data, $attribute);
        }
        return true;
    }

    public function updateSchools($data, $attribute) : JsonResponse{
        $schools = $data->Result->data->schools;
//        DB::beginTransaction();
        try {
            set_time_limit(5500);
            foreach ($schools as $school) {
                $school = (array)$school;
                $school['opening_date'] = $this->formatDate($school['opening_date']);
                $school['session_start_date'] = $this->formatDate($school['session_start_date']);
                $school['school_createdAt'] = $this->formatDateTime($school['school_createdAt']);
                $school['school_updatedAt'] = $this->formatDateTime($school['school_updatedAt']);
                $school['ClosingDate'] = $this->formatDateTime($school['ClosingDate']);

                //                dd($school);
                LNFBDSchools::updateOrCreate(['school_id' => $school['school_id']], $school);

                $this->postRequest('schools_with_success_flag', $school['school_id'], 'schools', 'L&NFBD');
            }
            return response()->json($schools, 200);
//            DB::commit();
        }catch (\Exception $e) {
            DB::rollback();
            // Handle the exception
            dd($e);
        }
        return $schools;

    }
    // Helper method to format date
    private function formatDate($date)
    {
        if ($date && $date !== '0000-00-00' && $date !== '0000-00-00 00:00:00') {
            try {
                return Carbon::parse($date)->format('Y-m-d');
            } catch (\Exception $e) {
                // Handle exception if the date is not valid
                return null;
            }
        }
        return null;
    }

    // Helper method to format date and time
    private function formatDateTime($dateTime)
    {
        if ($dateTime && $dateTime !== '0000-00-00 00:00:00') {
            try {
                return Carbon::parse($dateTime)->format('Y-m-d H:i:s');
            } catch (\Exception $e) {
                // Handle exception if the date-time is not valid
                return null;
            }
        }
        return null;
    }

    public function updateTeachers($data) : JsonResponse{
        $teachers = $data->Result->data->teachers;

        //        DB::beginTransaction();
        try {
            set_time_limit(1500);
            foreach ($teachers as $teacher) {
                $teacher = (array)$teacher;
                LNFBDTeachers::updateOrCreate(['teacher_id' => $teacher['teacher_id']], $teacher);

                $this->postRequest('teachers_with_success_flag', $teacher['teacher_id'], 'teachers', 'L&NFBD');
            }

            return response()->json($teachers, 200);

//            DB::commit();
        }catch (\Exception $e) {
            DB::rollback();
            // Handle the exception
            dd($e);
        }
dd($teachers);

    }

    public function updateLearners($data, $attribute){
        $learners = $data->Result->data->learners;
        Cache::put('learners', $learners, 60);
//        DB::beginTransaction();
        try {
            set_time_limit(9500);
            $cachedApiResponse = Cache::get('learners');
            // Define the chunk size
            $chunkSize = 10000; // Adjust as needed
            // Process the data in chunks
            collect($cachedApiResponse)->chunk($chunkSize)->each(function ($chunk) use($attribute){
                // Inside this callback, $chunk is an array containing a chunk of data

                foreach ($chunk as $item) {
                    $learner = (array)$item;
                    unset($learner['bform_number_archive']);
                    unset($learner['bform_file']);
                    LNFBDLearners::updateOrCreate(['id' => $learner['id']], $learner);

                    $this->postRequest('learners_with_success_flag', $learner['id'], 'learners', 'L&NFBD');
                }

            });

            return true;

        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            // Log the error message
            Log::error("Connection error: " . $e->getMessage());

            return false;
        }catch (\Exception $e) {
            // Log the error message
            Log::error("Error: " . $e->getMessage());

            return false;

        }

    }

}
