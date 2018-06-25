<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Sitemap::class,
        Commands\Production::class,
        Commands\Shop\Install::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        if (app('env') === 'production') {
            $schedule->command('backup:clean')
                     ->daily()
                     ->at('01:00')
                     ->thenPing('http://google.com'); // Must set heartbeats
            $schedule->command('backup:run')
                     ->daily()
                     ->at('02:00')
                     ->thenPing('http://google.com'); // Must set heartbeats
        }
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
