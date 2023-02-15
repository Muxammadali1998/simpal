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
            $currentTime = Carbon::now();

            $post = Obyekt::orderBy('updated_at', 'DESC')->select('start')->first();
    
            if ($currentTime->eq($post->start)) {
                
                event(new On());
               
            }

            event(new On());
        })->everyMinute();
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
