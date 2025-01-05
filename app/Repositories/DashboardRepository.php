<?php

namespace App\Repositories;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class DashboardRepository
{
    public function getIMISData($request, $expiresAt) : array{

            return $this->getData($request);
    }

    public function getData($request): array
    {
        $district = $request['district'] ?? '';
        $tehsil = $request['tehsil'] ?? '';

        // Call Stored Procedure
        $procedureCall = "exec get_IMIS_Dashboard ?, ?";
        $parameters = [$district, $tehsil];

        $pdo = DB::connection('imis')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);
        $resultSet1 = $statement->fetchAll();
        $statement->closeCursor();

        //SED DATA SET
        $sed_schools = DB::connection('sed')->table('imis_sed.sis_schools')->where('s_status',1)->count();

        //LNFBD DATA SET
        $lnfbd_students = DB::connection('lnfbd')->table('lnfbd.learner_api')->count();
        $lnfbd_teachers = DB::connection('lnfbd')->table('lnfbd.teacher_api')->count();
        $lnfbd_schools = DB::connection('lnfbd')->table('lnfbd.schools_api')->where('school_status', 1)->count();

        //SPED DATA SET
        $sped_students = DB::connection('sped')->table('sped.students')->count();
        $sped_teachers = DB::connection('sped')->table('sped.staff')->count();
        $sped_schools = DB::connection('sped')->table('sped.schools')->count();

        //PEF DATA SET
        $pef_students = DB::connection('pef')->table('imis_pef.students')->count();
        $pef_teachers = DB::connection('pef')->table('imis_pef.teachers')->count();
        $pef_schools = DB::connection('pef')->table('imis_pef.schools')->count();

        $total_students = $lnfbd_students + $sped_students + $pef_students + 11211154 + 628077+ 9365;
        $total_schools = $lnfbd_schools + $sped_schools + $pef_schools + $sed_schools + 4272+ 16;
        $total_teachers = $lnfbd_teachers + $sped_teachers + $pef_teachers + 335192 + 21503+ 526;

        //Get all districts
        $districts = DB::connection('imis')->table('imis_db.imis_districts')->get();

        //Get all districts
        $tehsils = DB::connection('imis')
            ->table('imis_db.imis_tehsils')
            ->where('t_district_idFk', $district)
            ->get();

        //Set return Array
         $data['total_data'] = $resultSet1[0];
         $data['districts'] = $districts;
         $data['request_district'] = $district;
         $data['request_tehsil'] = $tehsil;
         $data['tehsils'] = $tehsils;
         $data['total_students'] = $total_students;
         $data['total_schools'] = $total_schools;
         $data['total_teachers'] = $total_teachers;
         $data['lnfbd_students'] = $lnfbd_students;
         $data['lnfbd_teachers'] = $lnfbd_teachers;
         $data['lnfbd_schools'] = $lnfbd_schools;
         $data['sped_students'] = $sped_students;
         $data['sped_teachers'] = $sped_teachers;
         $data['sped_schools'] = $sped_schools;
         $data['pef_students'] = $pef_students;
         $data['pef_teachers'] = $pef_teachers;
         $data['pef_schools'] = $pef_schools;
         $data['sed_schools'] = $sed_schools;
        return $data;
    }

}
