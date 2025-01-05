<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ComponentFiveController extends Controller
{
    public function comms() : View{

        return view('component5.communication');
    }
	public function backtoSchool() : View{

        return view('component5.back-to-school');
    }
	public function resourceMaterial() : View{

        return view('component5.resource-material');
    }
	public function policyDialogue() : View{

        return view('component5.policy-dialogue');
    }
	public function communityMobilization() : View{

        return view('component5.community-mobilization');
    }
	public function schoolCouncilCampaign() : View{

        return view('component5.school-council-campaign');
    }
}
