<?php

namespace App\Repositories;


use App\Services\DatabaseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ComponentOneRepository
{
    protected $databaseService;

    public function __construct(DatabaseService $databaseService)
    {
        $this->databaseService = $databaseService;
    }
    public function getFlnData(): array
    {
        // Call Stored Procedure
        $procedureCall = "exec getFLNDashboard ?, ?, ?, ?, ?, ?";
        $parameters = ['Summary','','','','',''];

        $pdo = DB::connection('fln')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);
        $statement->nextRowset();
        $resultSet1 = $statement->fetchAll();
        $statement->nextRowset();
        $resultSet2 = $statement->fetchAll();
        $statement->nextRowset();
        $resultSet3 = $statement->fetchAll();
        $statement->nextRowset();
        $resultSet4 = $statement->fetchAll();
        $statement->nextRowset();
        $resultSet5 = $statement->fetchAll();
        $statement->nextRowset();
        $resultSet6 = $statement->fetchAll();
        $statement->nextRowset();
        $resultSet7 = $statement->fetchAll();
        $statement->nextRowset();
        $resultSet8 = $statement->fetchAll();
        $statement->nextRowset();
        $resultSet9 = $statement->fetchAll();
        $statement->nextRowset();
        $resultSet10 = $statement->fetchAll();
        $statement->nextRowset();
        $resultSet11 = $statement->fetchAll();
        $statement->nextRowset();
        $resultSet12 = $statement->fetchAll();
        $statement->nextRowset();
        $resultSet13 = $statement->fetchAll();
        $statement->nextRowset();
        $resultSet14 = $statement->fetchAll();
        $statement->nextRowset();
        $resultSet15 = $statement->fetchAll();
        $statement->nextRowset();
        $resultSet16 = $statement->fetchAll();

        // Get Age wise Enrollment
        $rangeWiseEnrollment = array_map(function($value) {
            return (int)$value['NoOfCamps']; }, $resultSet8);

        // Get District wise Male Enrollment
        $maleEnrollment = array_map(function($value) {
            return (int)$value['Male']; }, $resultSet5);

        // Get District wise Female Enrollment
        $femaleEnrollment = array_map(function($value) {
            return (int)$value['Female']; }, $resultSet5);

        // Get Male Assessment
        $maleAssessment = array_map(function($value) {
            return round($value['Male'], 2); }, $resultSet11);

        // Get Female Assessment
        $femaleAssessment = array_map(function($value) {
            return round($value['Female'], 2); }, $resultSet11);

        // Get OOSC Male Assessment
        $ooscMaleAssessment = array_map(function($value) {
            return round($value['Male'], 2); }, $resultSet12);

        // Get OOSC Female Assessment
        $ooscFemaleAssessment = array_map(function($value) {
            return round($value['Female'], 2); }, $resultSet12);

        // Get OOSC Male Assessment
        $ageWiseEnrolled = array_map(function($value) {
            return (int)$value['Enrolled']; }, $resultSet9);

        // Get OOSC Female Assessment
        $ageWiseOOSC = array_map(function($value) {
            return (int)$value['OOSC']; }, $resultSet9);

        // Get District Total Camps
        $districtCamps = array_map(function($value) {
            return (int)$value['TotalCamps']; }, $resultSet14);

        // Get Age wise Enrollment
        $twoRangeWiseEnrollment = array_map(function($value) {
            return (int)$value['NoOfCamps']; }, $resultSet16);
        //Set Tehsils in Related District
        $districtTehsils = [];
        foreach($resultSet15 as $district){
            $districtName = str_replace(' ', '-', $district['District']);
            if($districtName == 'D.G.-KHAN'){
                $districtName = 'DERA-GHAZI-KHAN';
            }

            if (!isset($districtTehsils[$districtName])) {
                $districtTehsils[$districtName] = [];
            }

            $districtTehsils[$districtName][] = $district;
        }

        //Set Graph Data
        $graph_data = [
            'range_wise_enrollment'=>$twoRangeWiseEnrollment,
            'male_enrollment'=>$maleEnrollment,
            'female_enrollment'=>$femaleEnrollment,
            'male_assessment'=>$maleAssessment,
            'female_assessment'=>$femaleAssessment,
            'oosc_male_assessment'=>$ooscMaleAssessment,
            'oosc_female_assessment'=>$ooscFemaleAssessment,
            'age_wise_enrolled'=>$ageWiseEnrolled,
            'age_wise_oosc'=>$ageWiseOOSC,
            'district_camps'=>$districtCamps,
        ];

        //Set return Array
         $data['total_data'] = $resultSet1[0];
         $data['teacher_data'] = $resultSet13[0];
         $data['tehsil_wise_data'] = $resultSet14[0];
         $data['district_tehsil_data'] = $districtTehsils;
         $data['graph_data'] = $graph_data;
        return $data;
    }

    public function getFlnData_2024($district, $tehsil, $markaz)
    {
//        return $this->databaseService->runTransaction(function () use ($district, $tehsil, $markaz) {
            // Your existing logic here
            $procedureCall = "exec getFLNDashboard_2024 ?, ?, ?, ?, ?, ?";
            $parameters = ['Summary', '', $district, $tehsil, $markaz, ''];
            $selectedDistrict = $district;

            $pdo = DB::connection('fln_2024')->getPdo();
            $statement = $pdo->prepare($procedureCall);
            $statement->execute($parameters);

            // Fetch result sets
            $resultSets = [];
            for ($i = 0; $i < 9; $i++) {
                $resultSets[] = $statement->fetchAll();
                $statement->nextRowset();
            }
            // Process result sets with checks
            $resultSet1 = $resultSets[0] ?? [];
            $resultSet2 = $resultSets[1] ?? [];
            $resultSet3 = $resultSets[2] ?? [];
            $resultSet4 = $resultSets[3] ?? [];
            $resultSet7 = $resultSets[4] ?? [];
            $resultSet8 = $resultSets[5] ?? [];
            $resultSet10 = $resultSets[6] ?? [];
            $resultSet11 = $resultSets[7] ?? [];
            $resultSet12 = $resultSets[8] ?? [];

            $procedureCall = "exec getFLNDashboard_2024_2 ?, ?, ?, ?, ?, ?";

            $statement = $pdo->prepare($procedureCall);
            $statement->execute($parameters);

            // Fetch result sets
            $resultSets = [];
            for ($i = 0; $i < 10; $i++) {
                $resultSets[] = $statement->fetchAll();
                $statement->nextRowset();
            }

            $resultSet13 = $resultSets[0] ?? [];
            $resultSet14 = $resultSets[1] ?? [];
            $resultSet15 = $resultSets[2] ?? [];
            $resultSet16 = $resultSets[3] ?? [];
            $resultSet17 = $resultSets[4] ?? [];
            $resultSet18 = $resultSets[5] ?? [];
            $resultSet19 = $resultSets[6] ?? [];
            $resultSet21 = $resultSets[7] ?? [];
            $resultSet22 = $resultSets[8] ?? [];
            $resultSet24 = $resultSets[9] ?? [];

        $procedureCall = "exec getFLNDashboard_2024_a ?, ?, ?, ?, ?, ?";

        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);
        $resultSet6 = $statement->fetchAll();

            // Your existing data processing logic here...

            $attendanceDates = array_map(function($value) {
                return $value['Dated'];
            }, $resultSet6);

            $attendanceTotalEnroll = array_map(function($value) {
                return (int)$value['TotalStudents'];
            }, $resultSet6);

            $attendanceTotalPresent = array_map(function($value) {
                return (int)$value['PresentStudents'];
            }, $resultSet6);

            $rangeWiseEnrollment = array_map(function($value) {
                return (int)$value['NoOfCamps'];
            }, $resultSet8);

            $maleEnrollment = array_map(function($value) {
                return (int)$value['TotalMaleEnrollment'];
            }, $resultSet18);

            $femaleEnrollment = array_map(function($value) {
                return (int)$value['TotalFemaleEnrollment'];
            }, $resultSet18);

            $enrollmentDistrict = array_map(function($value) {
                return $value['xAxis'];
            }, $resultSet18);

            $beginnerBaseline = array_map(function($value) {
                return round($value['Beginner_Baseline'], 2);
            }, $resultSet11);

            $beginnerEndline = array_map(function($value) {
                return round($value['Beginner_Endline'], 2);
            }, $resultSet11);

            $intermediateBaseline = array_map(function($value) {
                return round($value['Intermediate_Baseline'], 2);
            }, $resultSet11);

            $intermediateEndline = array_map(function($value) {
                return round($value['Intermediate_Endline'], 2);
            }, $resultSet11);

            $beginnerBaselineOOSC = array_map(function($value) {
                return round($value['Beginner_Baseline'], 2);
            }, $resultSet12);

            $beginnerEndlineOOSC = array_map(function($value) {
                return round($value['Beginner_Endline'], 2);
            }, $resultSet12);

            $intermediateBaselineOOSC = array_map(function($value) {
                return round($value['Intermediate_Baseline'], 2);
            }, $resultSet12);

            $intermediateEndlineOOSC = array_map(function($value) {
                return round($value['Intermediate_Endline'], 2);
            }, $resultSet12);

            $ageWiseEnrolled = array_map(function($value) {
                return (int)$value['Enrolled'];
            }, $resultSet19);

            $ageWiseOOSC = array_map(function($value) {
                return (int)$value['OOSC'];
            }, $resultSet19);

            $ages = array_map(function($value) {
                return $value['xAxis'];
            }, $resultSet19);

            $districtCamps = array_map(function($value) {
                return (int)$value['TotalCamps'];
            }, $resultSet14);

            $districts_list = array_column($resultSet14, 'District');
            $tehsil_list = array_column($resultSet21, 'TEHSIL');
            $markaz_list = array_column($resultSet22, 'MARKAZ');

            $twoRangeWiseEnrollment = array_map(function($value) {
                return (int)$value['NoOfCamps'];
            }, $resultSet16);

            $districtTehsils = [];
            foreach ($resultSet15 as $district) {
                $districtName = str_replace(' ', '-', $district['District']);
                if ($districtName == 'D.G.-KHAN') {
                    $districtName = 'DERA-GHAZI-KHAN';
                }

                if (!isset($districtTehsils[$districtName])) {
                    $districtTehsils[$districtName] = [];
                }

                $districtTehsils[$districtName][] = $district;
            }

            $totalCamps = $resultSet1[0]['TotalCamps'];
            $functionalCamps = $resultSet1[0]['FunctionalCamps'];
            $notFunctionalCamps = $totalCamps - $functionalCamps;
            $functionalCampsPercent = round(($functionalCamps / $totalCamps) * 100, 1);
            $notFunctionalCampsPercent = round(($notFunctionalCamps / $totalCamps) * 100, 1);

            $underTwentyFiveCamps = 0;
            $aboveTwentyFiveCamps = 0;
            foreach ($resultSet2 as $entry) {
                if ($entry['TargetStats'] === 'Meet Target') {
                    $aboveTwentyFiveCamps = $entry['NoOfCamps'];
                } elseif ($entry['TargetStats'] === 'Where Enrollment < 25') {
                    $underTwentyFiveCamps = $entry['NoOfCamps'];
                }
            }
            $underFortyCampsPercent = (round(($underTwentyFiveCamps / $totalCamps) * 100, 1));
            $aboveFortyCampsPercent = round(($aboveTwentyFiveCamps / $totalCamps) * 100, 1);

            $lessThanThirty = $resultSet3[0]['LessThan30'];
            $lessThanSixty = $resultSet3[0]['LessThan6OOSC'];

            $pendingComplaints = 0;
            if ($resultSet4) {
                $pendingComplaints = $resultSet4[0]['TotalComplaint'];
                $resolvedComplaints = $resultSet4[1]['TotalComplaint'];
            }

            $resultSet1[0]['TotalEnrollment'] = $resultSet17[0]['TotalEnrollment'];
            $resultSet1[0]['TotalMale'] = $resultSet17[0]['TotalMaleEnrollment'];
            $resultSet1[0]['TotalFemale'] = $resultSet17[0]['TotalFemaleEnrollment'];

            $resultSet1[0]['TotalBeginnerEnrollment'] = $resultSet17[0]['TotalBeginnerEnrollment'];
            $resultSet1[0]['TotalMaleBeginner'] = $resultSet17[0]['TotalMaleBeginner'];
            $resultSet1[0]['TotalFemaleBeginner'] = $resultSet17[0]['TotalFemaleBeginner'];

            $resultSet1[0]['TotalIntermediateEnrollment'] = $resultSet17[0]['TotalIntermediateEnrollment'];
            $resultSet1[0]['TotalMaleIntermediate'] = $resultSet17[0]['TotalMaleIntermediate'];
            $resultSet1[0]['TotalFemaleIntermediate'] = $resultSet17[0]['TotalFemaleIntermediate'];

            $resultSet1[0]['TotalEnrollmentOOSC'] = $resultSet17[0]['TotalEnrollmentOOSC'];
            $resultSet1[0]['FemaleOOSC'] = $resultSet17[0]['FemaleOOSC'];
            $resultSet1[0]['MaleOOSC'] = $resultSet17[0]['MaleOOSC'];

            $attendanceThreshold = $this->getFlnCampsAttendance_2024($selectedDistrict, $tehsil, $markaz);
            $resultSet1[0]['campsBelowThreshold'] = count($attendanceThreshold);
            $resultSet1[0]['resolvedComplaints'] = (int)$resolvedComplaints;
            $resultSet1[0]['pendingComplaints'] = (int)$pendingComplaints;
            $resultSet1[0]['totalComplaints'] = (int)$pendingComplaints + (int)$resolvedComplaints;

            $graph_data = [
                'range_wise_enrollment' => $rangeWiseEnrollment,
                'male_enrollment' => $maleEnrollment,
                'female_enrollment' => $femaleEnrollment,
                'beginner_baseline' => $beginnerBaseline,
                'beginner_endline' => $beginnerEndline,
                'intermediate_baseline' => $intermediateBaseline,
                'intermediate_endline' => $intermediateEndline,
                'oosc_beginner_baseline' => $beginnerBaselineOOSC,
                'oosc_beginner_endline' => $beginnerEndlineOOSC,
                'oosc_intermediate_baseline' => $intermediateBaselineOOSC,
                'oosc_intermediate_endline' => $intermediateEndlineOOSC,
                'age_wise_enrolled' => $ageWiseEnrolled,
                'age_wise_oosc' => $ageWiseOOSC,
                'district_camps' => $districtCamps,
                'districts_list' => $districts_list,
                'enrollmentDistrict' => $enrollmentDistrict,
                'functionalCamps' => (int)$resultSet7[0]['NoOfCamps'],
                'functionalCampsPercent' => $functionalCampsPercent,
                'notFunctionalCampsPercent' => $notFunctionalCampsPercent,
                'notFunctionalCamps' => (int)$resultSet7[1]['NoOfCamps'],
                'underFortyCampsPercent' => $underFortyCampsPercent,
                'aboveFortyCampsPercent' => $aboveFortyCampsPercent,
                'lessThanThirty' => (int)$lessThanThirty,
                'lessThanSixty' => (int)$lessThanSixty,
                'pendingComplaints' => (int)$pendingComplaints,
                'resolvedComplaints' => (int)$resolvedComplaints,
                'ages' => $ages,
                'attendanceDates' => $attendanceDates,
                'attendanceTotalEnroll' => $attendanceTotalEnroll,
                'attendanceTotalPresent' => $attendanceTotalPresent,
                'tehsil_list' => $tehsil_list,
                'markaz_list' => $markaz_list,
                'TotalBaselineSubmittedStudents' => (int)$resultSet24[0]['TotalBaselineSubmittedStudents'],
                'RemainingBaselineSubmittedStudents' => $resultSet17[0]['TotalEnrollment']- (int)$resultSet24[0]['TotalBaselineSubmittedStudents'],
                'underTwentyFiveCamps' => $underTwentyFiveCamps,
                'aboveTwentyFiveCamps' => $aboveTwentyFiveCamps,
            ];

            $data['total_data'] = $resultSet1[0];
            $data['teacher_data'] = $resultSet13[0];
            $data['tehsil_wise_data'] = $resultSet14[0];
            $data['district_tehsil_data'] = $districtTehsils;
            $data['graph_data'] = $graph_data;

            return $data;
//        });
    }

    public function getFlnCamps_2024($district, $tehsil, $markaz): array
    {
        // Call Stored Procedure
        $procedureCall = "exec getFLNCamps_2024 ?, ?, ?, ?, ?";
        $parameters = [$district,$tehsil,$markaz,'',''];

        $pdo = DB::connection('fln_2024')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);
        // Fetch the first result set
        return $statement->fetchAll();
    }

    public function getFlnDistrictWiseEnrollment_2024(): array
    {
        // Call Stored Procedure
        $procedureCall = "exec getFLNEnrollment_2024 ?, ?, ?, ?, ?";
        $parameters = ['','','','',''];

        $pdo = DB::connection('fln_2024')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);
        // Fetch the first result set
        return $statement->fetchAll();
    }

    public function getFlnDistrictEnrollmentList_2024($district, $tehsil, $markaz): array
    {
        // Call Stored Procedure
        $procedureCall = "exec getFLNDistrictEnrollmentList_2024 ?, ?, ?, ?, ?";
        $parameters = [$district,$tehsil,$markaz,'',''];

        $pdo = DB::connection('fln_2024')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);
        // Fetch the first result set
        return $statement->fetchAll();
    }

    public function getFlnOOSCEnrollmentList_2024($district, $tehsil, $markaz): array
    {
        // Call Stored Procedure
        $procedureCall = "exec getFLNDOOSCEnrollmentList_2024 ?, ?, ?, ?, ?";
        $parameters = [$district,$tehsil,$markaz,'',''];

        $pdo = DB::connection('fln_2024')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);
        // Fetch the first result set
        return $statement->fetchAll();
    }

    public function getFlnCampsAttendance_2024($district, $tehsil, $markaz): array
    {
        // Call Stored Procedure
        $procedureCall = "exec getFLNAttendance_2024 ?, ?, ?, ?, ?";
        $parameters = [$district,$tehsil,$markaz,'',''];

        $pdo = DB::connection('fln_2024')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);
        // Fetch the first result set
        return $statement->fetchAll();
    }

    public function getFlnCampsComplaints_2024($district, $tehsil, $markaz): array
    {
        // Call Stored Procedure
        $procedureCall = "exec getFLNComplaints_2024 ?, ?, ?, ?, ?";
        $parameters = [$district,$tehsil,$markaz,'',''];

        $pdo = DB::connection('fln_2024')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);
        // Fetch the first result set
        return $statement->fetchAll();
    }

    public function getFlnResolveComplaint_2024($complaint_id): JsonResponse
    {
        $user_id = Auth::user()->id; // Ensure the user is authenticated

        // Call Stored Procedure
        try {
            $procedureCall = "exec ResolveComplaint ?, ?";
            $parameters = [$complaint_id, $user_id];

            $pdo = DB::connection('fln_2024')->getPdo();
            $statement = $pdo->prepare($procedureCall);
            $statement->execute($parameters);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function getLNFBDData(): array
    {
        // Call Stored Procedure
        $procedureCall = "exec get_LNFBD_Dashboard";

        $pdo = DB::connection('lnfbd')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute();
        $statement->nextRowset();
        $resultSet1 = $statement->fetchAll();
        $statement->nextRowset();
        $resultSet2 = $statement->fetchAll();
        $statement->nextRowset();
        $resultSet3 = $statement->fetchAll();

        // Get District List
        $districts = array_map(function($value) {
            return $value['District']; }, $resultSet2);

        // Get District Total NEFI
        $districtCamps = array_map(function($value) {
            return (int)$value['TotalNEFI']; }, $resultSet2);

        // Get 5-9 age learners
        $fnLearners = array_map(function($value) {
            return (int)$value['Learners_5_9']; }, $resultSet2);

        // Get 10-14 age learners
        $tfLearners = array_map(function($value) {
            return (int)$value['Learners_10_14']; }, $resultSet2);

        //Set Tehsils in Related District
        $districtTehsils = [];
        foreach($resultSet3 as $district){
            $districtName = str_replace(' ', '-', $district['District']);
            if($districtName == 'D.G.-KHAN'){
                $districtName = 'DERA-GHAZI-KHAN';
            }

            if (!isset($districtTehsils[$districtName])) {
                $districtTehsils[$districtName] = [];
            }

            $districtTehsils[$districtName][] = $district;
        }

        //Set Graph Data
        $graph_data = [
            'districts'=>$districts,
            'district_camps'=>$districtCamps,
            'fnLearners'=>$fnLearners,
            'tfLearners'=>$tfLearners,
        ];

        //Set return Array
         $data['total_data'] = $resultSet1[0];
         $data['district_tehsil_data'] = $districtTehsils;
         $data['graph_data'] = $graph_data;
        return $data;
    }

}
