<?php

namespace App\Console;

use App\Events\On;
use App\Models\Site\Obyekt;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Artisan;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {


            $schedule->call(function () {
           

                $databaseTime = Obyekt::where('phone','+998907823396')->first();
                $currentTime = Carbon::now();
                $hour = $currentTime->hour;
                $minute = $currentTime->minute;
                $time = $hour . ':' . $minute;
        
                if ( $time >= $databaseTime->start) {
                    event(new On());
                   
                }
            })->everyFiveMinutes();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
