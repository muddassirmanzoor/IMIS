<?php

namespace App\Repositories;


use App\Constants\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class DataRepository
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
     * @return array
     */
    public function getDropDownData($request): array
    {
        // Check auth user district
        if ($this->userHasDistrictRole) {
            $request['district'] = auth()->user()->district->name;
        }

        // School Types
        $schoolTypes = DB::connection('imis')->table("imis_db.imis_school_type")->where('imis_st_status', 'active')->get();

        //Form request data
        $district = $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';
        $markaz = $request['markaz'] ?? '';

        //Get Dept. Name
        $dept = $this->getDepartmentName($request);


        //Get all districts
        $districts = DB::connection('imis')->table('imis_db.imis_districts')->get();

        //Get all districts
        $tehsils = DB::connection('imis')
            ->table('imis_db.imis_tehsils')
            ->where('t_district_idFk', $district)
            ->get();

        //Get all markaz
        $markazs = DB::connection('sed')
            ->table('imis_sed.sis_markazes')
            ->where('m_status', 1)
            ->where('m_district_idFk', $district)
            ->where('m_tehsil_idFk', $tehsil)
            ->get();

        //Get all EMIS Code
        $emis_code = DB::connection('sed')
            ->table('imis_sed.sis_schools')
            ->select('s_emis_code', 's_emis_code AS emis_code')
            ->where('s_status', 1)
            ->where('s_district_idFk', $district)
            ->where('s_tehsil_idFk', $tehsil)
            ->where('s_markaz_idFk', $markaz)
            ->orderBy('s_emis_code')
            ->get();

        $data['school_types'] = $schoolTypes;
        $data['districts'] = $districts;
        $data['district'] = $district;
        $data['tehsils'] = $tehsils;
        $data['markaz'] = $markazs;
        $data['emis_code'] = $emis_code;
        $data['request'] = $request;
        $data['dept'] = $dept;
        $data['userHasDistrictRole'] = $this->userHasDistrictRole;
        return $data;
    }

    /**
     * @return array
     */
    public function getASPGraphData(): array
    {
        // Call Stored Procedure
        $procedureCall = 'CALL ASP_Dashboard()';

        $pdo = DB::connection('mysql')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute();

        // Fetch the first result set
        $count_data = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $gender_wise_data = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $district_wise_data = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Get districts
        $districts = array_column($district_wise_data, 'District');

        // Get districts
        $asp_districts = array_column($district_wise_data, 'District');

        // Get district schools
        $district_schools = array_column($district_wise_data, 'TotalSchools');

        // Get district teachers
        $district_teachers = array_column($district_wise_data, 'TotalTeachers');

        // Get district students
        $district_students = array_column($district_wise_data, 'TotalStudents');
        $district_male_students = array_map(function ($value) {
            return (int)$value->MaleStudents;
        }, $district_wise_data);

        $district_female_students = array_map(function ($value) {
            return (int)$value->FemaleStudents;
        }, $district_wise_data);
        $district_other_students = array_column($district_wise_data, 'OtherStudents');

        // Get district male teachers
        $district_male_teachers = array_map(function ($value) {
            return (int)$value->MaleTeachers;
        }, $district_wise_data);

        // Get district female teachers
        $district_female_teachers = array_map(function ($value) {
            return (int)$value->FemaleTeachers;
        }, $district_wise_data);

        // Get district class 6th students
        $district_six_male = array_map(function ($value) {
            return (int)$value->SixMale;
        }, $district_wise_data);

        $district_six_female = array_map(function ($value) {
            return (int)$value->SixFemale;
        }, $district_wise_data);

        // Get district class 7th students
        $district_seven_male = array_map(function ($value) {
            return (int)$value->SevenMale;
        }, $district_wise_data);

        $district_seven_female = array_map(function ($value) {
            return (int)$value->SevenFemale;
        }, $district_wise_data);

        // Get district class 8th students
        $district_eight_male = array_map(function ($value) {
            return (int)$value->EightMale;
        }, $district_wise_data);

        $district_eight_female = array_map(function ($value) {
            return (int)$value->EightFemale;
        }, $district_wise_data);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $districts_count_data = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Move to the next result set
        $statement->nextRowset();

        // Fetch the second result set
        $building_safety = $statement->fetchAll(\PDO::FETCH_OBJ);

        // Close the statement
        $statement->closeCursor();
        $class_wise_data = $districts_count_data[0];
        $graph_data = [
            'districts' => $districts,
            'district_schools' => $district_schools,
            'district_teachers' => $district_teachers,
            'district_students' => $district_students,
            'district_male_teachers' => $district_male_teachers,
            'district_female_teachers' => $district_female_teachers,
            'district_six_male' => $district_six_male,
            'district_six_female' => $district_six_female,
            'district_seven_male' => $district_seven_male,
            'district_seven_female' => $district_seven_female,
            'district_eight_male' => $district_eight_male,
            'district_eight_female' => $district_eight_female,
            'district_male_students' => $district_male_students,
            'district_female_students' => $district_female_students,
            'asp_districts' => $asp_districts,
            'total_schools' => [
                ['name' => 'Male Afternoon Schools', 'y' => (int)$gender_wise_data[1]->TotalSchools, 'sliced' => true, 'selected' => true, 'color' => "#427ec6"],
                ['name' => 'Female Afternoon Schools', 'y' => (int)$gender_wise_data[0]->TotalSchools, 'color' => "#f33a86"],
            ],
            'total_enrollment' => [
                ['name' => 'Male Enrollment', 'y' => (int)$gender_wise_data[1]->TotalStudents, 'sliced' => true, 'selected' => true, 'color' => "#427ec6"],
                ['name' => 'Female Enrollment', 'y' => (int)$gender_wise_data[0]->TotalStudents, 'color' => "#f33a86"],
            ],
            'total_teachers' => [
                ['name' => 'Male Teachers', 'y' => (int)$gender_wise_data[1]->TotalTeachers, 'sliced' => true, 'selected' => true, 'color' => "#427ec6"],
                ['name' => 'Female Teachers', 'y' => (int)$gender_wise_data[0]->TotalTeachers, 'color' => "#f33a86"],
            ],
            'asp_male_class_students' => [-(int)$class_wise_data->ECEMale, -(int)$class_wise_data->KatchiMale, -(int)$class_wise_data->OneMale, -(int)$class_wise_data->TwoMale,
                -(int)$class_wise_data->ThreeMale, -(int)$class_wise_data->FourMale, -(int)$class_wise_data->FiveMale, -(int)$class_wise_data->SixMale, -(int)$class_wise_data->SevenMale, -(int)$class_wise_data->EightMale],
            'asp_female_class_students' => [(int)$class_wise_data->ECEFemale, (int)$class_wise_data->KatchiFemale, (int)$class_wise_data->OneFemale, (int)$class_wise_data->TwoFemale,
                (int)$class_wise_data->ThreeFemale, (int)$class_wise_data->FourFemale, (int)$class_wise_data->FiveFemale, (int)$class_wise_data->SixFemale, (int)$class_wise_data->SevenFemale, (int)$class_wise_data->EightFemale],
        ];
        $data = [
            'count_data' => $count_data[0],
            'districts_count_data' => $districts_count_data[0],
            'gender_wise_data' => $gender_wise_data,
            'graph_data' => $graph_data
        ];
        return $data;
    }

    /**
     * @param $request
     * @return string
     */
    public function getDepartmentName($request):string
    {
        return match ($request['school_type']) {
            '1' => Constants::DEPT_SED,
            '2' => Constants::DEPT_LNFBD,
            '3' => Constants::DEPT_SPED,
            '4' => Constants::DEPT_QAED,
            '5' => Constants::DEPT_PEF,
            default => Constants::DEPT_SED
//            default => Constants::ALL
        };
    }

}
