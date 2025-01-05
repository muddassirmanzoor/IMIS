<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiConnect;
use App\Http\Traits\ApiLogTrait;
use App\Models\LNFBDSchools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoundationController extends Controller
{
    use ApiConnect, ApiLogTrait;
    protected $department;
    protected $domain;
    protected $parameters;

    public function __construct()
    {
        $this->department = 'PEF';
        $this->domain = env('PEF_DOMAIN_URL');
        $this->parameters = [];

    }
    public function getSchoolData() {

        //Set Endpoint
        $url = $this->domain.'students/bySchool';

        //Guzzle Request
        $request = $this->getRequest($url, $this->department, $this->parameters, 'Schools');

        dd($request);
    }

    public function getUpdatedSchoolData() {

        //Set Endpoint
        $url = $this->domain.'get_updated_schools_info';

        //Guzzle Request
        $request = $this->getRequest($url, $this->department, $this->parameters, 'Schools');
        dd($request);
    }

    public function getSuccessFlagSchoolData() {

        $schools = $this->postRequest('schools_with_success_flag');
        dd($schools);
    }

    public function getStudentsData($name) {

        //Set Endpoint
        $url = $this->domain.'students/byDistrict';
        $this->parameters['query']['district'] = $name;
        ini_set('memory_limit', '90241M');
        set_time_limit(25000);

        //Guzzle Request
        $request = $this->getRequest($url, $this->department, $this->parameters, 'Students');

        dd($request);
    }

    public function getUpdatedLearnersData() {

        $schools = $this->getRequest('get_updated_learners_info');
        dd($schools);
    }

    public function getTeachersData() {
        //Set Endpoint
        $url = $this->domain.'students';
        ini_set('memory_limit', '90241M');
        set_time_limit(25000);
        //Guzzle Request
        $request = $this->getRequest($url, $this->department, $this->parameters, 'Teachers');

        dd($request);
    }

    public function getUpdatedTeachersData() {

        $schools = $this->getRequest('get_updated_teachers_info');
        dd($schools);
    }
}
