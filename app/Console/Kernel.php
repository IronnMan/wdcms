<?php

namespace App\Console;

use App\Console\Commands\ModuleInstall;
use App\Console\Commands\ModuleRemove;
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
        ModuleInstall::class,
        ModuleRemove::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
          // $schedule->command('biu:test --tenant_id=wjinfo')->everyMinute();
    }
}
