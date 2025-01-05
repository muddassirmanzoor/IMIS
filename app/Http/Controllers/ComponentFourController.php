<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComponentFourController extends Controller
{
    public function asp(){

        $year = 1; // Replace this with your desired value

        $pdo = DB::connection('sqlsrv')->getPdo();
        $stmt = $pdo->prepare('EXEC [dbo].[asp_dashboard] ?');
        $stmt->execute([$year]);

        $allResultSets = [];

        do {
            $result = $stmt->fetchAll(\PDO::FETCH_OBJ);

            if (!empty($result)) {
                $allResultSets[] = $result;
            }
        } while ($stmt->nextRowset());
        $district_wise_schools=$allResultSets[1];
        $categories = [];
        $maleSchools = [];
        $femaleSchools = [];

        foreach ($district_wise_schools as $district) {
            $categories[] = $district->d_name; // Use -> for object property access
            $maleSchools[] = (int)$district->male_school_count;
            $femaleSchools[] = (int)$district->female_school_count;
        }
        
       // dd( $district_wise_schools );
        return view('component4.asp', compact('categories', 'maleSchools', 'femaleSchools'));

    }
}
