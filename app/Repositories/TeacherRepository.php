<?php

namespace App\Repositories;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class TeacherRepository
{

    public function __construct()
    {
        if (auth()->check() && auth()->user()->hasRole('district') && auth()->user()->district) {
            $role = true;
        } else {
            $role = false;
        }
        $this->userHasDistrictRole = $role;
    }

    /**
     * @param $request
     * @param $date
     * @param $expiresAt
     * @return array
     */
    public function getTeachersData($request, $date, $expiresAt) : array{

        if ($request->isMethod('get') && !auth()->user()->district) {
            $data = Cache::remember('teachers', $expiresAt, function () use($request, $date){
                return $this->getSEDTeacherGraphData($request, $date);
//                return $this->getTeacherGraphData($request);
            });
        }else{
            // SED type
            if($request['school_type'] == 1){
                $data = $this->getSEDTeacherGraphData($request, $date);
            }elseif($request['school_type'] == 2){ //LNFBD School Type
                // Cache LNFBD Teachers. No Cache On District selection
                if($request['district']){
                    $data = $this->getLNFBDTeacherGraphData($request, $date);
                }else{
                    $data = Cache::remember('lnfbd_teachers', $expiresAt, function () use($request, $date){
                        return $this->getLNFBDTeacherGraphData($request, $date);
                    });
                }
            }elseif($request['school_type'] == 3){ //SPED School Type
                $data = $this->getSPEDTeacherGraphData($request, $date);
            }elseif($request['school_type'] == 5){ //SPED School Type
                $data = $this->getPEFTeacherGraphData($request, $date);
            }else{
                $data = $this->getSEDTeacherGraphData($request, $date);
//                $data = $this->getTeacherGraphData($request);
            }

        }
        return $data;
    }

    /**
     * @param $request
     * @return array
     */
    public function getTeachersListingData($request) : array{
        ini_set('memory_limit', '90241M');

        $data = [];
        // SED type
        if($request['school_type']== 1 || $request['school_type']== null){ //SED
            $data =  $this->getSEDTeacherListingData($request);
        }elseif($request['school_type'] == 2){ //LNFBD
            $data = $this->getLNFBDTeacherListingData($request);
        }elseif($request['school_type'] == 3){ //SPED
            $data = $this->getSPEDTeacherListingData($request);
        }elseif($request['school_type'] == 5){ //PEF
            $data = $this->getPEFTeacherListingData($request);
        }

        return $data;
    }
    /**
     * @param $request
     * @return array
     */
    public function getTeacherGraphData($request) : array{

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
    public function getSEDTeacherGraphData($request, $date) : array{

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
     * @param $level
     * @return array
     */
    public function getSEDTeacherListingData($request) : array{
        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';
        $markaz = $request['markaz'] ?? '';
        $level = $request['level'] ?? '';

        // Call Stored Procedure
        $procedureCall = 'exec imis_sed.getSchoolsListing ?, ?, ?, ?';
        $parameters = [$district, $tehsil, $markaz, $level];

        $pdo = DB::connection('sed')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);

        // Fetch the first result set
        $schools = $statement->fetchAll();

        return $schools;
    }

    /**
     * @param $request
     * @param $date
     * @return array
     */
    public function getLNFBDTeacherGraphData($request, $date) : array{

        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';

        // Call Stored Procedure
        $procedureCall = 'exec get_LNFBD_Teachers ?, ?';
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
        $qualification_count = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Close the statement
        $statement->closeCursor();
        $db_teachers = $resultSet1[0];
        $qualification_count = $qualification_count[0];

        $projects = [];

        // Projects Students
        foreach ($projects_count as $key => $project){
            $array['name'] = $project['project'];
            $array['y'] = (int)$project['TeachersCount'];
            $array['selected'] = true;
            $array['sliced'] = true;
            $projects[] = $array;
        }

        $graph_data = [
            'teachers_by_gender'=>[
                ['name' => 'Male', 'y' => (int)$db_teachers->Male,  'color' => "#3F51B5" ],
                ['name' => 'Female', 'y' => (int)$db_teachers->Female,  'color' => "#E91E63" ],
            ],
            'male_teachers_qualification'=>[
                ['name' => 'Matric', 'y' => (int)$qualification_count->MatricMaleCount,  'color' => "rgb(66, 126, 197, 0.94)"],
                ['name' => 'FA', 'y' => (int)$qualification_count->FAMaleCount,  'color' => "rgb(66, 126, 197, 0.84)"],
                ['name' => 'BA', 'y' => (int)$qualification_count->BAMaleCount,  'color' => "rgb(66, 126, 197, 0.74)"],
                ['name' => 'Master', 'y' => (int)$qualification_count->MasterMaleCount,  'color' => "rgb(66, 126, 197, 0.64)"],
                ['name' => 'BSCS', 'y' => (int)$qualification_count->BSCSMaleCount,  'color' => "rgb(66, 126, 197, 0.54)"],
                ['name' => 'B.SE', 'y' => (int)$qualification_count->BSEMaleCount,  'color' => "rgb(66, 126, 197, 0.44)"],
                ['name' => 'BSC', 'y' => (int)$qualification_count->BSCMaleCount,  'color' => "rgb(66, 126, 197, 0.34)"],
                ['name' => 'BBA', 'y' => (int)$qualification_count->BBAMaleCount,  'color' => "rgb(66, 126, 197, 0.24)"],
                ['name' => 'MBA', 'y' => (int)$qualification_count->MBAMaleCount,  'color' => "rgb(66, 126, 197, 0.14)"],
            ],
            'female_teachers_qualification'=>[
                ['name' => 'Matric', 'y' => (int)$qualification_count->MatricFemaleCount,  'color' => "rgb(243, 58, 134, 0.94)"],
                ['name' => 'FA', 'y' => (int)$qualification_count->FAFemaleCount,  'color' => "rgb(243, 58, 134, 0.84)"],
                ['name' => 'BA', 'y' => (int)$qualification_count->BAFemaleCount,  'color' => "rgb(243, 58, 134, 0.74)"],
                ['name' => 'Master', 'y' => (int)$qualification_count->MasterFemaleCount,  'color' => "rgb(243, 58, 134, 0.64)"],
                ['name' => 'BSCS', 'y' => (int)$qualification_count->BSCSFemaleCount,  'color' => "rgb(243, 58, 134, 0.54)"],
                ['name' => 'BSE', 'y' => (int)$qualification_count->BSEFemaleCount,  'color' => "rgb(243, 58, 134, 0.44)"],
                ['name' => 'BSC', 'y' => (int)$qualification_count->BSCFemaleCount,  'color' => "rgb(243, 58, 134, 0.34)"],
                ['name' => 'BBA', 'y' => (int)$qualification_count->BBAFemaleCount,  'color' => "rgb(243, 58, 134, 0.24)"],
                ['name' => 'MBA', 'y' => (int)$qualification_count->MBAFemaleCount,  'color' => "rgb(243, 58, 134, 0.14)"],
            ],
            'projects'=>$projects,
        ];
        $data = [
            'db_teachers' => $db_teachers,
            'project_teachers' => $projects_count,
            'graph_data' => $graph_data,
        ];
        return $data;
    }

    /**
     * @param $level
     * @return array
     */
    public function getLNFBDTeacherListingData($request) : array{
        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';
        $level = $request['level'] ?? '';

        // Call Stored Procedure
        $procedureCall = 'exec get_LNFBD_Teachers_Listing ?, ?, ?';
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
    public function getSPEDTeacherGraphData($request, $date) : array{

        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';

        // Call Stored Procedure
        $procedureCall = 'exec get_SPED_Teachers ?, ?';
        $parameters = [$district, $tehsil];

        $pdo = DB::connection('sped')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);

        // Fetch the first result set
        $resultSet1 = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $disability_type = $statement->fetchAll();

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $qualification_count = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $professional_qualification= $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $designations = $statement->fetchAll();

        // Close the statement
        $statement->closeCursor();
        $db_teachers = $resultSet1[0];
        $qualification_count = $qualification_count[0];

        $disabilities = [];

        // Projects Students
        foreach ($disability_type as $key => $disability){
            $array['name'] = $disability['disability_type'];
            $array['y'] = (int)$disability['TeachersCount'];
            $array['selected'] = true;
            $array['sliced'] = true;
            $disabilities[] = $array;
        }

        $graph_data = [
            'teachers_by_gender'=>[
                ['name' => 'Male', 'y' => (int)$db_teachers->Male,  'color' => "#3F51B5" ],
                ['name' => 'Female', 'y' => (int)$db_teachers->Female,  'color' => "#E91E63" ],
            ],
            'disabilities'=>$disabilities,
        ];
        $data = [
            'db_teachers' => $db_teachers,
            'designations' => $designations,
            'graph_data' => $graph_data,
        ];
        return $data;
    }

    /**
     * @param $request
     * @param $date
     * @return array
     */
    public function getSPEDTeacherListingData($request) : array{

        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';

        // Call Stored Procedure
        $procedureCall = 'exec get_SPED_Teachers_Listing ?, ?';
        $parameters = [$district, $tehsil];

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
    public function getPEFTeacherGraphData($request, $date) : array{

        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';

        // Call Stored Procedure
        $procedureCall = 'exec get_PEF_Teachers_api ?, ?';
        $parameters = [$district, $tehsil];

        $pdo = DB::connection('pef')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);

        // Fetch the first result set
        $resultSet1 = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $teacher_roles = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $qualification_male = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $qualification_female= $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $professional_qualification = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $teacher_genders = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Close the statement
        $statement->closeCursor();
        $db_teachers = $resultSet1[0];
        $data_gender = [];
        $data_role = [];
        $data_male_qualification = [];
        $data_female_qualification = [];

        // Teacher Gender
        foreach ($teacher_genders as $gender){
            $array['name'] = $gender->Gender;
            $array['y'] = (int)$gender->TeachersCount;
            $data_gender[] = $array;
        }

        // Teacher Role
        foreach ($teacher_roles as $role){
            $array1['name'] = $role->TeacherRole;
            $array1['y'] = (int)$role->TeachersCount;
            $data_role[] = $array1;
        }

        $val = '0.94';
        // Male Teacher Qualification
        foreach ($qualification_male as $qualification){
            $array2['name'] = $qualification->QulaficationLevel;
            $array2['y'] = (int)$qualification->MaleTeachersCount;
            $array2['color'] = 'rgb(66, 126, 197,'. $val.')';
            $val = $val - .10;
            $data_male_qualification[] = $array2;
        }

        $val = '0.94';
        // Female Teacher Qualification
        foreach ($qualification_female as $qualification){
            $array3['name'] = $qualification->QulaficationLevel;
            $array3['y'] = (int)$qualification->FemaleTeachersCount;
            $array3['color'] = 'rgb(243, 58, 134, '. $val.')';
            $val = $val - .10;
            $data_female_qualification[] = $array3;
        }

        // Male class students
        $male_class_students = array_map(function ($value) {
            return -(int)$value->MaleCount;
        }, $professional_qualification);

        // Female class students
        $female_class_students = array_map(function ($value) {
            return (int)$value->FemaleCount;
        }, $professional_qualification);

        $qualifications = array_column($professional_qualification, 'ProfessionalQualification');

        $graph_data = [
            'teachers_by_gender'=>$data_gender,
            'teachers_roles'=>$data_role,
            'teachers_male_qualification'=>$data_male_qualification,
            'teachers_female_qualification'=>$data_female_qualification,
            'male_class_students'=>$male_class_students,
            'female_class_students'=>$female_class_students,
            'qualifications'=>$qualifications,
        ];
        $data = [
            'db_teachers' => $db_teachers,
            'graph_data' => $graph_data,
        ];
        return $data;
    }

    /**
     * @param $request
     * @param $date
     * @return array
     */
    public function getPEFTeacherListingData($request) : array{

        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';

        // Call Stored Procedure
        $procedureCall = 'exec get_PEF_Teachers_api_Listing ?, ?';
        $parameters = [$district, $tehsil];

        $pdo = DB::connection('pef')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);

        // Fetch the first result set
        return $statement->fetchAll();
    }

    public function getPEFFilterTeacherListingData($request) : array{

        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';

        // Call Stored Procedure
        $procedureCall = 'exec get_PEF_Teachers_api_Listing ?, ?';
        $parameters = [$district, $tehsil];

        $pdo = DB::connection('pef')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);

        // Fetch the first result set
        $teachers =  $statement->fetchAll();
        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $filter_teachers = $statement->fetchAll();
        return [
            'teachers' => $teachers,
            'filter_teachers' => $filter_teachers,
        ];
    }

}
