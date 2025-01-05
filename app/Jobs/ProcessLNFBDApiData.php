<?php

namespace App\Jobs;

use App\Http\Traits\ApiConnect;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessLNFBDApiData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, ApiConnect;

    protected $apiEndpoints;
    /**
     * Create a new job instance.
     */
    public function __construct(array $apiEndpoints)
    {
        $this->apiEndpoints = $apiEndpoints;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->apiEndpoints as $apiEndpoint) {

            $url = env('LNFBD_DOMAIN_URL').$apiEndpoint['value'];
            $parameters = [
                'query' => [
                    'api_key' => env('LNFBD_API_KEY'),
                    'secret' => env('LNFBD_API_SECRET'),
                ],
            ];

            // Fetch data from the API
            $data = $this->getRequest($url, 'L&NFBD', $parameters, $apiEndpoint['attribute']);

        }
    }
}
