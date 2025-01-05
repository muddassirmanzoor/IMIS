<?php

namespace App\Console\Commands;

use App\Http\Controllers\api\LiteracyController;
use App\Jobs\ProcessLNFBDApiData;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class FetchLNFBDApiData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-l-n-f-b-d-api-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch LNFBD Api Data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Define your API endpoints here
//        $apiEndpoints = [
//            [
//                'value'=>'get_updated_schools_info',
//                'attribute'=>'Schools',
//            ],
//            [
//                'value'=>'get_updated_learners_info',
//                'attribute'=>'Learners',
//            ],
//            [
//                'value'=>'get_updated_teachers_info',
//                'attribute'=>'Teachers',
//            ],
//        ];
//
//        // Dispatch the ProcessApiData job
//        ProcessLNFBDApiData::dispatch($apiEndpoints);

        // Create an instance of the LiteracyController
        $literacyController = new LiteracyController();

//        $literacyController->getSuccessFlagLearnerData(36);
//        $this->info('LNFBD learners status update initiated.');

        // Call the getSchoolData method
        Log::info('LNFBD New Schools data Initiated');
        $this->info('LNFBD New Schools data processing initiated.');

        $literacyController->getSchoolData();

        Log::info('LNFBD New Schools data saved successfully');
        $this->info('LNFBD New Schools data saved successfully.');

        // Call the getUpdatedSchoolData method
        Log::info('LNFBD Updated Schools data Initiated');
        $this->info('LNFBD Updated Schools data processing initiated.');

        $literacyController->getUpdatedSchoolData();

        Log::info('LNFBD Updated Schools data updated successfully');
        $this->info('LNFBD Updated Schools data updated successfully.');

        // Call the getNewTeachersData method
        Log::info('LNFBD New Teachers data Initiated');
        $this->info('LNFBD New Teachers data processing initiated.');

        $literacyController->getTeachersData();

        Log::info('LNFBD New Teachers data created successfully');
        $this->info('LNFBD New Teachers data saved successfully.');

        // Call the getUpdatedTeachersData method
        Log::info('LNFBD Updated Teachers data Initiated');
        $this->info('LNFBD Updated Teachers data processing initiated.');

        $literacyController->getUpdatedTeachersData();

        Log::info('LNFBD Teachers data updated successfully');
        $this->info('LNFBD Teachers data updated successfully.');

        // Call the getUpdatedLearnersData method
        Log::info('LNFBD Updated Learners data Initiated');
        $this->info('LNFBD Updated Learners data processing initiated.');

        $literacyController->getUpdatedLearnersData();

        Log::info('LNFBD Learners data updated successfully');
        $this->info('LNFBD Learners data updated successfully');

        for ($i=1; $i<= 36; $i++){
            $maxRetries = 5;
            $attempt = 0;
            $response = false;

            while ($response === false && $attempt < $maxRetries) {

                $this->info("LNFBD New Learners data  for province ID $i processing initiated.");
                Log::info("LNFBD Learners data for province ID $i initiated successfully.");

                $response = $literacyController->getLearnersData($i);
                $attempt++;

                if ($response === false) {
                    $this->info("Attempt $attempt: LNFBD Learners data retrieval failed for province ID $i. Retrying...");
                    Log::warning("LNFBD Learners data retrieval failed for province ID $i on attempt $attempt.");
                    sleep(2); // Optional delay between retries
                }
            }
            if ($response === false) {
                $this->error("Failed to retrieve LNFBD Learners data for province ID $i after $maxRetries attempts.");
                Log::error("Failed to retrieve LNFBD Learners data for province ID $i after $maxRetries attempts.");
            } else {
                $this->info("LNFBD Learners data for province ID $i retrieved successfully.");
                Log::info("LNFBD Learners data for province ID $i created successfully.");
            }

        }
    }
}
