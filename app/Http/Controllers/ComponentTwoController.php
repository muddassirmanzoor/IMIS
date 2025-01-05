<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\ComponentOneRepository;
use App\Repositories\DataRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ComponentTwoController extends Controller
{
    /**
     * @return View
     */
    public function iei(){
        
        

        $pdo = DB::connection('sqlsrv')->getPdo();
        $stmt = $pdo->prepare('EXEC [dbo].[iei_dashboard]');
        $stmt->execute();

        $allResultSets = [];

        do {
            $result = $stmt->fetchAll(\PDO::FETCH_OBJ);

            if (!empty($result)) {
                $allResultSets[] = $result;
            }
        } while ($stmt->nextRowset());
        
        $count_card = $allResultSets[0];
        $screen_stat_table = $allResultSets[1];
        //dd($count_card);
        return view('component2.iei', compact('count_card','screen_stat_table'));
    }

    public function sped() : View{

        return view('component2.sped');
    }

}
