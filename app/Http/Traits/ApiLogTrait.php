<?php
namespace App\Http\Traits;

use App\Models\ApiLog;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;


trait ApiLogTrait
{

    protected function logApiRequest($url, $department, $header, $status_code, $body, $message, $method)
    {
        ApiLog::create([
            'department' => $department,
            'endpoint' => $url,
            'status_code' => $status_code,
            'message' => $message,
            'method' => $method,
            'headers' => $header,
            'body' => $body,
        ]);
    }

}
