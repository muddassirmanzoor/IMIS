<?php

namespace App\Repositories;


use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class StudentRepository
{

    public function __construct()
    {
        if (auth()->check() && auth()->user()->hasRole('district') && auth()->user()->district) {
            $role = true;
        } else {
            $role = false;
        }
        $this->userHasDistrictRole = $role;
        ini_set('memory_limit', '90241M');
    }

    /**
     * @param $request
     * @param $date
     * @param $expiresAt
     * @return array
     */
    public function getStudentsData($request, $date, $expiresAt) : array{

        if ($request->isMethod('get') && !auth()->user()->district) {
            $data = Cache::remember('students', $expiresAt, function () use($request, $date){
                return $this->getSEDStudentGraphData($request, $date);
//                return $this->getStudentGraphData($request);
            });
        }else{
            // SED type
            if($request['school_type'] == 1){ //SED
                $data = $this->getSEDStudentGraphData($request, $date);
            }elseif($request['school_type'] == 2){ //LNFBD

                $data = $this->getLNFBDStudentGraphData($request, $date);

//                if($request['district']){ // No Cache
//                    $data = $this->getLNFBDStudentGraphData($request, $date);
//                }else{ //Cache
//                    $data = Cache::remember('lnfbd_students', $expiresAt, function () use($request, $date){
//                        return $this->getLNFBDStudentGraphData($request, $date);
//                    });
//                }
            }elseif($request['school_type'] == 3){ //SPED
                $data = $this->getSPEDStudentGraphData($request, $date);
            }
//            elseif($request['school_type'] == 5){ //PEF
//                $data = $this->getPEFStudentGraphData($request, $date);
//            }
            else{
                $data = $this->getSEDStudentGraphData($request, $date);
//                $data = $this->getStudentGraphData($request);
            }

        }
        return $data;
    }

    /**
     * @param $request
     * @return array
     */
    public function getStudentsListingData($request) : array{

        $data = [];
        // SED type
        if($request['school_type']== 1 || $request['school_type']== null){ //SED
            $data =  $this->getSEDTeacherListingData($request);
        }elseif($request['school_type'] == 2){ //LNFBD
            $data = $this->getLNFBDStudentListingData($request);
        }elseif($request['school_type'] == 3){ //SPED
            $data = $this->getSPEDStudentListingData($request);
        }elseif($request['school_type'] == 5){ //PEF
            $data = $this->getPEFTeacherListingData($request);
        }

        return $data;
    }
    /**
     * @param $request
     * @return array
     */
    public function getStudentGraphData($request) : array{

        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';

        // Call Stored Procedure
        $procedureCall = "exec get_IMIS_Dashboard ?, ?";
        $parameters = [$district, $tehsil];

        $pdo = DB::connection('imis')->getPdo();
        $statement = $pdo->prepare($procedureCall);

        $statement->execute($parameters);

        $resultSet1 = $statement->fetchAll();

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $resultSet2 = $statement->fetchAll(\PDO::FETCH_OBJ);

        $db_schools = $resultSet2[0];
        $graph_data = [
            'schools_by_gender'=>[
                ['Male', (int)$db_schools->Male],
                ['Female', (int)$db_schools->Female],
            ],
            'schools_by_level'=>[
                ['name' => 'sMosqueM', 'y' => (int)$db_schools->sMosqueMale, 'sliced'=> true, 'selected'=> true, 'color'=> "#427ec6"],
                ['name' => 'H.sc Male', 'y' => (int)$db_schools->HighSecondaryMale, 'color'=> "#f33a86"],
                ['name' => 'H.sc Female', 'y' => (int)$db_schools->HighSecondaryFemale],
                ['name' => 'High Male', 'y' => (int)$db_schools->HighMale],
                ['name' => 'High Female', 'y' => (int)$db_schools->HighFemale],
                ['name' => 'Middle Male', 'y' => (int)$db_schools->MiddleMale],
                ['name' => 'Middle Female', 'y' => (int)$db_schools->MiddleFemale],
                ['name' => 'Primary Male', 'y' => (int)$db_schools->PrimaryMale],
                ['name' => 'Primary Female', 'y' => (int)$db_schools->PrimaryFemale],
            ],
            'school_by_area'=>[
                ['name' => 'Rural Area Schools', 'y' => (int)$db_schools->Rural, 'color'=> "#427ec6"],
                ['name' => 'Urban Area Schools', 'y' => (int)$db_schools->Urban, 'color'=> "#60c3ab"]
            ]
        ];
        $data = [
            'db_schools' => $db_schools,
            'graph_data' => $graph_data
        ];
        return $data;
    }

    /**
     * @param $request
     * @param $date
     * @return array
     */
    public function getSEDStudentGraphData($request, $date) : array{

        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';
        $markaz = $request['markaz'] ?? '';
        $emis_code = $request['emis_code'] ?? '';

        // Call Stored Procedure
        $procedureCall = 'exec imis_sed.getSchoolsDashboard ?, ?, ?, ?, ?';
        $parameters = [$district, $tehsil, $markaz, $emis_code, $date];

        $pdo = DB::connection('sed')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);

        // Fetch the first result set
        $resultSet1 = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $school_ownership = $statement->fetchAll(\PDO::FETCH_OBJ);

//        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $construction_type = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $building_safety = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Close the statement
        $statement->closeCursor();


        $db_schools = $resultSet1[0];
        $data_owner = [];
        $data_construction = [];
        $data_safety = [];

        // School Ownership
        foreach ($school_ownership as $key => $ownership){
            $array['name'] = $ownership->xAxis;
            $array['y'] = (int)$ownership->IndicatorValue;
            $array['selected'] = true;
            $array['sliced'] = true;
            $data_owner[] = $array;
        }
        // School Construction Type
        foreach ($construction_type as $construction){
            $array['name'] = $construction->xAxis;
            $array['y'] = (int)$construction->IndicatorValue;
            $array['selected'] = true;
            $array['sliced'] = true;
            $data_construction[] = $array;
        }
        // School Building Safety
        foreach ($building_safety as $safety){
            $array['name'] = $safety->xAxis;
            $array['y'] = (int)$safety->IndicatorValue;
            $array['selected'] = true;
            $array['sliced'] = true;
            $data_safety[] = $array;
        }

        $graph_data = [
            'schools_by_gender'=>[
                ['Male', (int)$db_schools->Male],
                ['Female', (int)$db_schools->Female],
            ],
            'schools_by_level'=>[
                ['name' => 'sMosqueM', 'y' => (int)$db_schools->sMosqueMale, 'sliced'=> true, 'selected'=> true, 'color'=> "#427ec6"],
                ['name' => 'H.sc Male', 'y' => (int)$db_schools->HighSecondaryMale, 'color'=> "#f33a86"],
                ['name' => 'H.sc Female', 'y' => (int)$db_schools->HighSecondaryFemale],
                ['name' => 'High Male', 'y' => (int)$db_schools->HighMale],
                ['name' => 'High Female', 'y' => (int)$db_schools->HighFemale],
                ['name' => 'Middle Male', 'y' => (int)$db_schools->MiddleMale],
                ['name' => 'Middle Female', 'y' => (int)$db_schools->MiddleFemale],
                ['name' => 'Primary Male', 'y' => (int)$db_schools->PrimaryMale],
                ['name' => 'Primary Female', 'y' => (int)$db_schools->PrimaryFemale],
            ],
            'school_by_area'=>[
                ['name' => 'Rural Area Schools', 'y' => (int)$db_schools->Rural, 'color'=> "#427ec6"],
                ['name' => 'Urban Area Schools', 'y' => (int)$db_schools->Urban, 'color'=> "#60c3ab"]
            ],
            'school_ownership'=>$data_owner,
            'construction_type'=>$data_construction,
            'building_safety'=>$data_safety
        ];
        $data = [
            'db_schools' => $db_schools,
            'graph_data' => $graph_data
        ];
        return $data;
    }
    /**
     * @param $request
     * @param $date
     * @return array
     */
    public function getLNFBDStudentGraphData($request, $date) : array{

        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';

        // Call Stored Procedure
        $procedureCall = 'exec get_LNFBD_Students ?, ?';
        $parameters = [$district, $tehsil];

        $pdo = DB::connection('lnfbd')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);

        // Fetch the first result set
        $resultSet1 = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $projects_count = $statement->fetchAll();

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $area_count = $statement->fetchAll();

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $class_gender_count = $statement->fetchAll();

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $age_class_count = $statement->fetchAll();

        // Close the statement
        $statement->closeCursor();
        $db_students = $resultSet1[0];

        $projects = [];

        // Projects Students
        foreach ($projects_count as $key => $project){
            $array['name'] = $project['project'];
            $array['y'] = (int)$project['StudentsCount'];
            $array['selected'] = true;
            $array['sliced'] = true;
            $projects[] = $array;
        }

        $urban_count = array_column($area_count, 'Urban');
        $rural_count = array_column($area_count, 'Rural');
        $null_count = array_column($area_count, 'AreaNotGIven');

        // Male class students
        $male_class_students = array_map(function ($value) {
            return -(int)$value['MaleCount'];
        }, $class_gender_count);

        // Female class students
        $female_class_students = array_map(function ($value) {
            return (int)$value['FemaleCount'];
        }, $class_gender_count);

        $graph_data = [
            'students_by_gender'=>[
                ['Male', (int)$db_students->Male],
                ['Female', (int)$db_students->Female],
            ],
            'projects'=>$projects,
            'male_class_students'=>$male_class_students,
            'female_class_students'=>$female_class_students,
            'urban_count'=>(int)$urban_count[0],
            'rural_count'=>(int)$rural_count[0],
            'null_count'=>(int)$null_count[0],
        ];
        $data = [
            'db_students' => $db_students,
            'project_students' => $projects_count,
            'graph_data' => $graph_data,
        ];
        return $data;
    }
    /**
     * @param $request
     * @return array
     */
    public function getLNFBDStudentListingData($request) : array{

        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';
        $level = $request['level'] ?? '';

        // Call Stored Procedure
        $procedureCall = 'exec get_LNFBD_Students_Listing ?, ?, ?';
        $parameters = [$district, $tehsil, $level];

        $pdo = DB::connection('lnfbd')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);

        // Fetch the first result set
        return $statement->fetchAll();
    }
    /**
     * @param $request
     * @return array
     */
    public function getLNFBDFilterStudentListingData($request) : array{

        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';
        $level = $request['level'] ?? '';

        // Call Stored Procedure
        $procedureCall = 'exec get_LNFBD_District_Students_Listing ?, ?, ?';
        $parameters = [$district, $tehsil, $level];

        $pdo = DB::connection('lnfbd')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);

        // Fetch the first result set
        return $statement->fetchAll();
    }
    /**
     * @param $request
     * @param $date
     * @return array
     */
    public function getSPEDStudentGraphData($request, $date) : array{

        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';

        // Call Stored Procedure
        $procedureCall = 'exec get_SPED_Students ?, ?';
        $parameters = [$district, $tehsil];

        $pdo = DB::connection('sped')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);

        // Fetch the first result set
        $resultSet1 = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $class_gender_count = $statement->fetchAll();

        // Close the statement
        $statement->closeCursor();
        $db_students = $resultSet1[0];


        // Male class students
        $male_class_students = array_map(function ($value) {
            return -(int)$value['MaleCount'];
        }, $class_gender_count);

        // Female class students
        $female_class_students = array_map(function ($value) {
            return (int)$value['FemaleCount'];
        }, $class_gender_count);

        //  Classes
        $classes = array_map(function ($value) {
            return $value['class'];
        }, $class_gender_count);

        $graph_data = [
            'students_by_gender'=>[
                ['Male', (int)$db_students->Male],
                ['Female', (int)$db_students->Female],
            ],
            'students_by_disability'=>[
                ['name' => 'Visually Impaired', 'y' => (int)$db_students->VisuallyImpaired, 'sliced'=> true, 'selected'=> true],
                ['name' => 'Slow Learners', 'y' => (int)$db_students->SlowLearners],
                ['name' => 'Hearing Impaired', 'y' => (int)$db_students->HearingImpaired],
                ['name' => 'Training Colleges', 'y' => (int)$db_students->TrainingColleges],
                ['name' => 'Mentally Challenged', 'y' => (int)$db_students->MentallyChallenged],
                ['name' => 'Vocational Training Centers', 'y' => (int)$db_students->VocationalTrainingCenters],
                ['name' => 'Physically Handicapped', 'y' => (int)$db_students->PhysicallyHandicapped],
            ],
            'male_class_students'=>$male_class_students,
            'female_class_students'=>$female_class_students,
            'classes'=>$classes,
        ];
        $data = [
            'db_students' => $db_students,
            'graph_data' => $graph_data,
        ];
        return $data;
    }
    /**
     * @param $request
     * @return array
     */
    public function getSPEDStudentListingData($request) : array{

        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';
        $level = $request['level'] ?? '';

        // Call Stored Procedure
        $procedureCall = 'exec get_SPED_Students_Listing ?, ?, ?';
        $parameters = [$district, $tehsil, $level];

        $pdo = DB::connection('sped')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);

        // Fetch the first result set
        return $statement->fetchAll();


    }
    /**
     * @param $request
     * @param $date
     * @return array
     */
    public function getPEFStudentGraphData($request, $date) : array{

        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';

        // Call Stored Procedure
        $procedureCall = 'exec get_SPED_Students_api ?, ?';
        $parameters = [$district, $tehsil];

        $pdo = DB::connection('sped')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);

        // Fetch the first result set
        $resultSet1 = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $class_gender_count = $statement->fetchAll();

        // Close the statement
        $statement->closeCursor();
        $db_students = $resultSet1[0];


        // Male class students
        $male_class_students = array_map(function ($value) {
            return -(int)$value['MaleCount'];
        }, $class_gender_count);

        // Female class students
        $female_class_students = array_map(function ($value) {
            return (int)$value['FemaleCount'];
        }, $class_gender_count);

        //  Classes
        $classes = array_map(function ($value) {
            return $value['class'];
        }, $class_gender_count);

        $graph_data = [
            'students_by_gender'=>[
                ['Male', (int)$db_students->Male],
                ['Female', (int)$db_students->Female],
            ],
            'students_by_disability'=>[
                ['name' => 'Visually Impaired', 'y' => (int)$db_students->VisuallyImpaired, 'sliced'=> true, 'selected'=> true],
                ['name' => 'Slow Learners', 'y' => (int)$db_students->SlowLearners],
                ['name' => 'Hearing Impaired', 'y' => (int)$db_students->HearingImpaired],
                ['name' => 'Training Colleges', 'y' => (int)$db_students->TrainingColleges],
                ['name' => 'Mentally Challenged', 'y' => (int)$db_students->MentallyChallenged],
                ['name' => 'Vocational Training Centers', 'y' => (int)$db_students->VocationalTrainingCenters],
                ['name' => 'Physically Handicapped', 'y' => (int)$db_students->PhysicallyHandicapped],
            ],
            'male_class_students'=>$male_class_students,
            'female_class_students'=>$female_class_students,
            'classes'=>$classes,
        ];
        $data = [
            'db_students' => $db_students,
            'graph_data' => $graph_data,
        ];
        return $data;
    }

    /**
     * @param $student_id
     * @return array
     */
    public function getSEDStudentProfile($student_id) : array{
        $student =  DB::connection('sis')->table('students')
            ->leftJoin('school_class_sections', 'students.s_section_idFk', '=', 'school_class_sections.scs_id')
            ->leftJoin('classes', 'students.s_class_idFk', '=', 'classes.c_id')
            ->leftJoin('schools', 'students.s_school_idFk', '=', 'schools.s_id')
            ->select(
                'students.*', // Select all columns from students table
                'school_class_sections.scs_name',
                'classes.c_name',
                'schools.s_name as school_name','schools.s_emis_code','schools.s_district_idFk','schools.s_tehsil_idFk','schools.s_markaz_idFk'
            )
            ->where('students.s_id', $student_id)
            ->first();

        // Transfer Logs
        $transfer_logs =  DB::connection('sis')->table('students_transfer_logs')
            ->leftJoin('schools as from_school', 'students_transfer_logs.stl_from_school_idFk', '=', 'from_school.s_id')
            ->leftJoin('schools as to_school', 'students_transfer_logs.stl_to_school_idFk', '=', 'to_school.s_id')
            ->select(
                'students_transfer_logs.*', // Select all columns from students table
                'from_school.s_name as from_school_name', 'from_school.s_emis_code as from_school_emis_code',
                'to_school.s_name as to_school_name', 'to_school.s_emis_code as to_school_emis_code'
            )
            ->where('stl_student_idFk', $student_id)
            ->whereColumn('stl_from_school_idFk', '!=', 'stl_to_school_idFk')
            ->get()->toArray();

        // Rejoin Logs
        $rejoin_logs =  DB::connection('sis')->table('students_transfer_logs')
            ->leftJoin('schools as from_school', 'students_transfer_logs.stl_from_school_idFk', '=', 'from_school.s_id')
            ->leftJoin('schools as to_school', 'students_transfer_logs.stl_to_school_idFk', '=', 'to_school.s_id')
            ->select(
                'students_transfer_logs.*', // Select all columns from students table
                'from_school.s_name as from_school_name', 'from_school.s_emis_code as from_school_emis_code',
                'to_school.s_name as to_school_name', 'to_school.s_emis_code as to_school_emis_code'
            )
            ->where('stl_student_idFk', $student_id)
            ->whereColumn('stl_from_school_idFk', '=', 'stl_to_school_idFk')
            ->get()->toArray();

        $district = DB::connection('imis')->table('imis_db.imis_districts')->where('d_id', $student->s_district_idFk)->first();
        $tehsil = DB::connection('imis')->table('imis_db.imis_tehsils')->where('t_id', $student->s_tehsil_idFk)->first();
        $markaz = DB::connection('sed')->table('imis_sed.sis_markazes')->where('m_id', $student->s_markaz_idFk)->first();

        $student->d_name = $district->d_name;
        $student->t_name = $tehsil->t_name;
        $student->m_name = $markaz->m_name;

        return [
            'student' => $student,
            'transfer_logs' => $transfer_logs,
            'rejoin_logs' => $rejoin_logs
        ];
    }

    /**
     * @param $request
     * @return array
     */
    public function searchSEDStudent($request) : array{
        //Set values
        $cnic =  $request['cnic'] ?? '';
        $b_form = $request['b_form'] ?? '';
        $emis_code = $request['emis_code'] ?? '';
        $search_type = '';
        $search_value = '';

        $students =  DB::connection('sis')->table('students')
            ->leftJoin('schools', 'students.s_school_idFk', '=', 'schools.s_id')
            ->leftJoin('classes', 'students.s_class_idFk', '=', 'classes.c_id')
            ->select(
                'students.*',
                'classes.c_name',
                'schools.s_name as school_name','schools.s_emis_code','schools.s_type','schools.s_district_idFk','schools.s_tehsil_idFk','schools.s_markaz_idFk'
            );
        if ($b_form) {
            $students = $students->where('students.s_form_b', $b_form);
            $search_type = 'B-Form';
            $search_value = $b_form;
        }
        if ($cnic) {
            $students = $students->where('students.s_fg_cnic', $cnic);
            $search_type = 'Father CNIC';
            $search_value = $cnic;
        }
        if ($emis_code) {
            $students = $students->where('schools.s_emis_code', $emis_code);
            $search_type = 'EMIS Code';
            $search_value = $emis_code;
        }
        $students = $students->where('students.s_status', 'Active');
        $students = $students->get();
        return [
            'students' => $students,
            'search_type' => $search_type,
            'search_value' => $search_value
        ];
    }

}
