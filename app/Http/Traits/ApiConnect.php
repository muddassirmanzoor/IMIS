<?php
namespace App\Http\Traits;

use App\Models\ApiLog;
use App\Models\LNFBDTeachers;
use App\Repositories\LNFBDRepository;
use App\Repositories\API\PEFRepository;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

trait ApiConnect
{

    use ApiLogTrait;
    public function getRequest($url, $department, $parameters, $attribute)
    {
        try {
            $client = new Client();
            $request = $client->request('GET', $url, $parameters);

            //API Log Data
             $data = $this->apiLog($request, $url, $department, $attribute);

             return $this->storeData($data, $department, $attribute);

        }
        catch (GuzzleException $e) {
            // Handle Guzzle HTTP client exceptions
            $header = $e->getFile().$e->getLine().$e->getTraceAsString();
            $this->logApiRequest($url, $department, $header, $e->getCode(), $e->getMessage(), 'GuzzleException', 'GET');
            return false;

        }catch (\Exception  $e){
            $header = $e->getFile().$e->getLine().$e->getTraceAsString();
            $this->logApiRequest($url, $department, $header, $e->getCode(), $e->getMessage(), 'Exception', 'GET');
            return false;
        }
    }

    public function postRequest($endpoint, $id, $attribute, $department)
    {
        try {
            $client = new \GuzzleHttp\Client();
            $url = env('LNFBD_DOMAIN_URL').$endpoint;
            $response = $client->request('POST', $url, [
                'query' => [
                    'api_key' => env('LNFBD_API_KEY'),
                    'secret' => env('LNFBD_API_SECRET'),
                ],
                'form_params' => [
//                    $attribute => $id
                    $attribute => [$id]
                ]
            ]);

            // Get the status code
            $statusCode = $response->getStatusCode();

            // Get the headers
            $headers = 'None';

            // Get the body contents
//            $message = $attribute. ' Updated successfully.'. $attribute.' count: '.count($id);
            $message = $attribute. ' Updated successfully.'. $attribute.' id: '.$id;
            $body = 'body';

            $this->logApiRequest($url, $department, $headers, $statusCode, $body, $message, 'POST');

        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            // Log the error message
            Log::error("Connection error: " . $e->getMessage());

            return false;
        }catch (\Exception $e) {
            // Log the error message
            Log::error("Error: " . $e->getMessage());

            return false;
        }
    }

    public function apiLog($request, $url, $department, $attribute){
        $body = json_decode($request->getBody());
        if($department == 'L&NFBD'){
            $data = $this->setLNFBDData($attribute, $body);
        } elseif($department == 'PEF'){
            $data = $this->setLPEFData($attribute, $body);
        }

        $header = json_encode($request->getHeaders());
        $status_code = $request->getStatusCode();
        //API Log Request
        $this->logApiRequest($url, $department, $header, $status_code, $data['body'], $data['message'], 'GET');
        return $body;
    }

    public function storeData($data, $department, $attribute){
        if($department == 'L&NFBD'){
            $LNFBDRepository = new LNFBDRepository();
            return $LNFBDRepository->storeData($data, $attribute);

        }elseif($department == 'PEF'){
            $LNFBDRepository = new PEFRepository();
            return $LNFBDRepository->storeData($data, $attribute);
        }
        return true;
    }

    /**
     * @param $attribute
     * @param $body
     * @return array
     */
    public function setLNFBDData($attribute, $body): array{

        if($attribute == 'Schools') {
            $data['body'] = 'Total ' . $attribute . ': ' . count($body->Result->data->schools);
        }elseif($attribute == 'Teachers'){
            $data['body'] = 'Total ' . $attribute . ': ' . count($body->Result->data->teachers);
        }elseif($attribute == 'Learners'){
            $data['body'] = 'Total ' . $attribute . ': ' . count($body->Result->data->learners);
        }
        $data['message'] = $body->Result->message;
        return $data;
    }

    /**
     * @param $attribute
     * @param $body
     * @return array
     */
    public function setLPEFData($attribute, $body): array{

        if($attribute == 'Schools') {
            $data['body'] = 'Total ' . $attribute . ': ' . count($body);
        }elseif($attribute == 'Teachers'){
            $data['body'] = 'Total ' . $attribute . ': ' . count($body);
        }elseif($attribute == 'Students'){
            $data['body'] = 'Total ' . $attribute . ': ' . count($body);
        }
        $data['message'] = 'PEF '.$attribute.' Data Successfully';
        return $data;
    }


}
