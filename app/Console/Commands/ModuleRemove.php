<?php

namespace App\Console\Commands;

use App\Console\Process\ModuleInstaller;
use App\Models\ModuleAdmin;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Nwidart\Modules\Json;
use Nwidart\Modules\Process\Installer;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Process\Process;

class ModuleRemove extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'wd:remove';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove a module from the application';

    /**
     * @return int
     */
    public function handle() : int
    {
        $module_name = Str::studly($this->argument('module'));

        if(!$this->laravel['modules']->has($module_name)) {
            $this->error('module '.$module_name.' not exist!');
            return 0;
        }

        Process::fromShellCommandline(sprintf(
            'cd %s && rm -rf %s',
            $this->laravel['modules']->getPath($module_name),
            $module_name
        ))->run();

        // $this->laravel['modules']->delete($module_name);
        ModuleAdmin::where(['name' => $module_name])->forceDelete();

        $this->call('cache:clear');
        $this->info("Module {$this->argument('module')} has been deleted.");

        return 0;
    }

    protected function getArguments()
    {
        return [
            ['module', InputArgument::REQUIRED, 'The name of module to delete.'],
        ];
    }
}
