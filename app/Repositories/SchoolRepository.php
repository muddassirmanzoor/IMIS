<?php

namespace App\Repositories;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SchoolRepository
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
    public function getSchoolsData($request, $date, $expiresAt) : array{

        if ($request->isMethod('get') && !auth()->user()->district) {
            $data = Cache::remember('schools', $expiresAt, function () use($request, $date){
                return $this->getSEDSchoolGraphData($request, $date);
//                return $this->getSchoolGraphData($request);
            });
        }else{
            // SED type
            if($request['school_type'] == 1){ //SED
                if($request['emis_code']){
                    $data = $this->getSEDSchoolData($request, $date);
                }else{
                    $data = $this->getSEDSchoolGraphData($request, $date);
                }
            }elseif($request['school_type'] == 2){ //LNFBD
                $data = $this->getLNFBDSchoolGraphData($request, $date);
            }elseif($request['school_type'] == 3){ //SPED
                $data = $this->getSPEDSchoolGraphData($request, $date);
            }elseif($request['school_type'] == 5){ //PEF
                $data = $this->getPEFSchoolGraphData($request, $date);
            }else{
                $data = $this->getSEDSchoolGraphData($request, $date);
//                $data = $this->getSchoolGraphData($request);
            }

        }
        return $data;
    }

    /**
     * @param $request
     * @param $date
     * @param $expiresAt
     * @return array
     */
    public function getSchoolsListingData($request, $expiresAt) : array{
        ini_set('memory_limit', '90241M');

        $data = [];
            // SED type
            if($request['school_type']== 1 || $request['school_type']== null){ //SED
                $data =  $this->getSEDSchoolListingData($request);
            }elseif($request['school_type'] == 2){ //LNFBD
                $data = $this->getLNFBDSchoolListingData($request);
            }elseif($request['school_type'] == 3){ //SPED
                $data = $this->getSPEDSchoolListingData($request);
            }elseif($request['school_type'] == 5){ //PEF
                $data = $this->getPEFSchoolListingData($request);
            }

        return $data;
    }

    /**
     * @param $request
     * @return array
     */
    public function getSchoolGraphData($request) : array{

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
    public function getSEDSchoolData($request, $date) : array{

        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';
        $markaz = $request['markaz'] ?? '';
        $emis_code = $request['emis_code'] ?? '';

        $district = DB::connection('imis')->table('imis_db.imis_districts')->where('d_id', $district)->first();
        $tehsil = DB::connection('imis')->table('imis_db.imis_tehsils')->where('t_id', $tehsil)->first();
        $markaz = DB::connection('sed')->table('imis_sed.sis_markazes')->where('m_id', $markaz)->first();

        $school = DB::connection('sis')->table('schools')
            ->join('school_info', 'schools.s_id', '=', 'school_info.si_school_idFk')
            ->leftJoin(DB::raw("(SELECT ssp_school_idFk, SUM(ssp_count) AS total_posts, SUM(ssp_filled) AS filled_posts FROM school_sanctioned_posts WHERE ssp_status = '1' AND  ssp_type = 'Teachers' GROUP BY ssp_school_idFk) AS sanctioned_posts"), 'schools.s_id', '=', 'sanctioned_posts.ssp_school_idFk')
            ->leftJoin(DB::raw("(SELECT sgc_school_idFk, SUM(sgc_enrolled) AS enrolled_students, SUM(sgc_male) AS male_students, SUM(sgc_female) AS female_students FROM stats2_gender_comparison GROUP BY sgc_school_idFk) AS t_students"), 'schools.s_id', '=', 't_students.sgc_school_idFk')
            ->where('schools.s_emis_code', $emis_code)
            ->get()
            ->toArray();

        $data = [
            'district' => $district,
            'tehsil' => $tehsil,
            'markaz' => $markaz,
            'school' => $school[0]
        ];
        return $data;
    }

    /**
     * @param $level
     * @return array
     */
    public function getSEDSchoolListingData($request) : array{
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
    public function getSEDSchoolGraphData($request, $date) : array{

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
                ['Primary Female ', (int)$db_schools->PrimaryFemale, '#8664bc', 'Primary Female'],
                ['Primary Male ', (int)$db_schools->PrimaryMale, '#66369a', 'Primary Male'],
                ['Middle Female ', (int)$db_schools->MiddleFemale, '#8faadc', 'Middle Female'],
                ['Middle Male ', (int)$db_schools->HighFemale, '#2f5597', 'Middle Male'],
                ['High Female ', (int)$db_schools->HighFemale, '#f5d574', 'High Female '],
                ['High Male', (int)$db_schools->HighMale, '#ffc000', 'High Male'],
                ['H.sc Female ', (int)$db_schools->HighSecondaryFemale, '#f4b183', 'H.sc Female'],
                ['H.sc Male', (int)$db_schools->HighSecondaryMale, '#c55a11', 'H.sc Male'],
                ['Mosque Male  ', (int)$db_schools->sMosqueMale, '#fa4b42', 'Mosque Male']
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
    public function getLNFBDSchoolGraphData($request, $date) : array{

        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';

        // Call Stored Procedure
        $procedureCall = 'exec get_LNFBD_Schools ?, ?';
        $parameters = [$district, $tehsil];

        $pdo = DB::connection('lnfbd')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);

        // Fetch the first result set
        $resultSet1 = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Close the statement
        $statement->closeCursor();


        $db_schools = $resultSet1[0];

        $building_types = ['TeacherHouse', 'Ground', 'CommunityProvided', 'Other', 'Masjid', 'Maddrasa', 'Brick_Kiln'];
        $project_types = ['TSKL', 'GPE', 'NCHD', 'BECS', 'PNFEP'];

        // School Ownership
        foreach($building_types as $building){
            $building_type['name'] = $building;
            $building_type['y'] = (int)$db_schools->$building;
            $building_type['selected'] = true;
            $building_type['sliced'] = true;
            $data_type[] = $building_type;
        }

        // School Projects
        foreach ($project_types as $project_type){
            $array['name'] = $project_type;
            $array['y'] = (int)$db_schools->$project_type;
            $array['selected'] = true;
            $array['sliced'] = true;
            $data_project[] = $array;
        }

        $graph_data = [
            'school_by_area'=>[
                ['name' => 'Rural Area Schools', 'y' => (int)$db_schools->Rural, 'color'=> "#427ec6"],
                ['name' => 'Urban Area Schools', 'y' => (int)$db_schools->Urban, 'color'=> "#60c3ab"],
                ['name' => 'Not Given', 'y' => (int)$db_schools->Urban]
            ],
            'school_ownership'=>$data_type,
            'school_project'=>$data_project,
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
    public function getLNFBDSchoolListingData($request) : array{
        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';
        $level = $request['level'] ?? '';

        // Call Stored Procedure
        $procedureCall = 'exec get_LNFBD_Schools_Listing ?, ?, ?';
        $parameters = [$district, $tehsil, $level];

        $pdo = DB::connection('lnfbd')->getPdo();
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
    public function getSPEDSchoolGraphData($request, $date) : array{

        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';

        // Call Stored Procedure
        $procedureCall = 'exec get_SPED_Schools ?, ?';
        $parameters = [$district, $tehsil];

        $pdo = DB::connection('sped')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);

        // Fetch the first result set
        $resultSet1 = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $district_institute = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $division_institute = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Close the statement
        $statement->closeCursor();

        $db_schools = $resultSet1[0];

        // School Building Safety
        foreach ($division_institute as $division){
            $array['name'] = $division->division;
            $array['y'] = (int)$division->school_count;
            $data_division[] = $array;
        }

        $graph_data = [
            'schools'=>[
                ['name' => 'Disabilities Centre', 'y' => (int)$db_schools->DisabilitiesCentre],
                ['name' => 'Braille Printing Press', 'y' => (int)$db_schools->BraillePrintingPress],
                ['name' => 'Degree College', 'y' => (int)$db_schools->DegreeCollege],
                ['name' => 'DG Office', 'y' => (int)$db_schools->DGOffice],
                ['name' => 'Hearing Impaired Children', 'y' => (int)$db_schools->HearingImpairedChildren],
                ['name' => 'Mentally Challenged Children', 'y' => (int)$db_schools->MentallyChallengedChildren],
                ['name' => 'Office', 'y' => (int)$db_schools->Office],
                ['name' => 'Others', 'y' => (int)$db_schools->Others],
                ['name' => 'Physically Handicapped Children', 'y' => (int)$db_schools->PhysicallyHandicappedChildren],
                ['name' => 'Slow Learner', 'y' => (int)$db_schools->SlowLearner],
                ['name' => 'Training College', 'y' => (int)$db_schools->TrainingCollege],
                ['name' => 'Visually Impaired Children', 'y' => (int)$db_schools->VisuallyImpairedChildren],
                ['name' => 'Vocational Rehabilitation Centre', 'y' => (int)$db_schools->VocationalRehabilitationCentre],
                ['name' => 'Vocational Training Centre', 'y' => (int)$db_schools->VocationalTrainingCentre],
                ['name' => 'Workshop', 'y' => (int)$db_schools->Workshop],
            ],
            'division_institute'=>$data_division
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
    public function getSPEDSchoolListingData($request) : array{

        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';
        $level = $request['level'] ?? '';

        // Call Stored Procedure
        $procedureCall = 'exec get_SPED_Schools_Listing ?, ?, ?';
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
    public function getPEFSchoolGraphData($request, $date) : array{

        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';

        // Call Stored Procedure
        $procedureCall = 'exec get_PEF_Schools_api ?, ?';
        $parameters = [$district, $tehsil];

        $pdo = DB::connection('pef')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);

        // Fetch the first result set
        $resultSet1 = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $programme_schools = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $school_levels = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $school_areas = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $school_ownership = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $school_gender = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Close the statement
        $statement->closeCursor();

        $db_schools = $resultSet1[0];
        $data_programs = [];
        $data_levels = [];
        $data_areas = [];
        $data_ownership = [];
        $data_gender = [];

        // School Programs
        foreach ($programme_schools as $school){
            $array['name'] = $school->SchoolProgram;
            $array['y'] = (int)$school->SchoolsCount;
            $data_programs[] = $array;
        }
        // School Levels
        foreach ($school_levels as $school){
            $array1['name'] = $school->SchoolLevel;
            $array1['y'] = (int)$school->SchoolsCount;
            $data_levels[] = $array1;
        }
        // School Areas
        foreach ($school_areas as $school){
            $array2['name'] = $school->AreaType;
            $array2['y'] = (int)$school->SchoolsCount;
            $data_areas[] = $array2;
        }
        // School Ownership
        foreach ($school_ownership as $school){
            $array3['name'] = $school->OWNERSHIP;
            $array3['y'] = (int)$school->SchoolsCount;
            $data_ownership[] = $array3;
        }
        // School Gender
        foreach ($school_gender as $school){
            $array4['name'] = $school->RegisterdFor;
            $array4['y'] = (int)$school->SchoolsCount;
            $data_gender[] = $array4;
        }

        $graph_data = [
            'data_programs'=>$data_programs,
            'data_levels'=>$data_levels,
            'data_areas'=>$data_areas,
            'data_ownership'=>$data_ownership,
            'data_gender'=>$data_gender,
        ];
        $data = [
            'db_schools' => $db_schools,
            'data_programs'=>$programme_schools,
            'graph_data' => $graph_data
        ];
        return $data;
    }
    /**
     * @param $request
     * @param $date
     * @return array
     */
    public function getPEFSchoolListingData($request) : array{

        // Check auth user district
        if(auth()->check() && auth()->user()->hasRole('District') && auth()->user()->district){
            $request['district'] = auth()->user()->district->name;
        }
        //Set values
        $district =  $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';
        $level = $request['level'] ?? '';

        // Call Stored Procedure
        $procedureCall = 'exec get_PEF_Schools_api_Listing ?, ?, ?';
        $parameters = [$district, $tehsil, $level];

        $pdo = DB::connection('pef')->getPdo();
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
    public function getSEDSchoolClassData($school_id) : array{
        return DB::connection('sis')->table('stats2_gender_comparison')->where('sgc_school_idFk', $school_id)->orderBy('sgc_class_idFk')->get()->toArray();
    }

    /**
     * @param $request
     * @param $date
     * @return array
     */
    public function getSEDSchoolClassStudentsData($school_id, $class_id) : array{
        $students =  DB::connection('sis')->table('students')
            ->leftJoin('school_class_sections', 'students.s_section_idFk', '=', 'school_class_sections.scs_id')
            ->leftJoin('classes', 'students.s_class_idFk', '=', 'classes.c_id')
            ->where('s_school_idFk', $school_id)->where('s_class_idFk', $class_id)
            ->where('students.s_status', 'Active')
            ->where('students.s_verification_status', '!=','Rejected')
            ->orderBy('school_class_sections.scs_name')
            ->get()->toArray();
        $school =  DB::connection('sis')->table('schools')->where('s_id', $school_id)->first();

        $data = [
            'students' => $students,
            'school' => $school
        ];
        return $data;
    }
}
