<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiConnect;
use App\Http\Traits\ApiLogTrait;
use App\Models\LNFBDLearners;
use App\Models\LNFBDSchools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiteracyController extends Controller
{
    use ApiConnect, ApiLogTrait;
    protected $department;
    protected $domain;
    protected $parameters;

    public function __construct()
    {
        $this->department = 'L&NFBD';
        $this->domain = env('LNFBD_DOMAIN_URL');
        $this->parameters = [
            'query' => [
                'api_key' => env('LNFBD_API_KEY'),
                'secret' => env('LNFBD_API_SECRET'),
            ],
        ];

    }
    public function getSchoolData() {

        //Set Endpoint
        $url = $this->domain.'get_schools_listing_info';

        //Guzzle Request
        return $this->getRequest($url, $this->department, $this->parameters, 'Schools');
    }

    public function getUpdatedSchoolData() {

        //Set Endpoint
        $url = $this->domain.'get_updated_schools_info';

        //Guzzle Request
        return $this->getRequest($url, $this->department, $this->parameters, 'Schools');
    }

    public function getSuccessFlagSchoolData() {

        $schools = $this->postRequest('schools_with_success_flag');
        dd($schools);
    }

    public function getSuccessFlagLearnerData($id) {
        $limit = 1000;  // Number of records you want to retrieve
        $offset = 0; // Number of records to skip

        $learners = LNFBDLearners::where('districtIDFK', $id)->where('send_PMIU', 0)
            ->skip($offset)
            ->take($limit)
            ->pluck('id')
            ->toArray();

        $this->postRequest('learners_with_success_flag', $learners, 'learners', 'L&NFBD');
        LNFBDLearners::wherein('id',$learners)->update(['send_PMIU'=>1]);
        dd($learners);

        foreach ($learners as $learner){
            $this->postRequest('learners_with_success_flag', $learner, 'learners', 'L&NFBD');
            LNFBDLearners::where('id',$learner)->update(['send_PMIU'=>1]);
        }
        dd(count($learners));
    }

    public function getLearnersData($id =null) {

        //Set Endpoint
        $url = $this->domain.'get_learners_listing_info';
        $this->parameters['query']['district'] = $id;
        ini_set('memory_limit', '1024M');

        //Guzzle Request
        return $this->getRequest($url, $this->department, $this->parameters, 'Learners');
    }

    public function getUpdatedLearnersData() {

        //Set Endpoint
        $url = $this->domain.'get_updated_learners_info';
//        $this->parameters['query']['district'] = $id;
        ini_set('memory_limit', '1024M');

        //Guzzle Request
        return $this->getRequest($url, $this->department, $this->parameters, 'Learners');
    }

    public function getTeachersData() {
        //Set Endpoint
        $url = $this->domain.'get_teachers_listing_info';

        //Guzzle Request
        return $this->getRequest($url, $this->department, $this->parameters, 'Teachers');
    }

    public function getUpdatedTeachersData() {

        $url = $this->domain.'get_updated_teachers_info';

        return $this->getRequest($url, $this->department, $this->parameters,'Teachers');
    }
}
