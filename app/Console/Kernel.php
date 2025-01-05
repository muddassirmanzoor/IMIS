<?php

namespace App\Console;

use App\Jobs\ProcessLNFBDApiData;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('app:fetch-l-n-f-b-d-api-data')->everySixHours();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        \App\Console\Commands\FetchLNFBDApiData::class;

        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
