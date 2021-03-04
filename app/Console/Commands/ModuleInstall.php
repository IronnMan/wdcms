<?php

namespace App\Console\Commands;

use App\Console\Process\ModuleInstaller;
use App\Models\ModuleAdmin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Modules\Openshop\Api\Douyin\Kernel\Exceptions\Exception;
use Nwidart\Modules\Facades\Module;
use Nwidart\Modules\Json;
use Nwidart\Modules\Process\Installer;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ModuleInstall extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'wd:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the specified module by given package name (vendor/name).';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle() : int
    {
        if (is_null($this->argument('name'))) {
            return $this->installFromFile();
        }

        $this->install(
            $this->argument('name'),
            $this->argument('version'),
            $this->option('type') ?? 'gitee',
            $this->option('tree'),
            $this->option('dev')
        );


        return 0;
    }

    /**
     * Install modules from modules.json file.
     */
    protected function installFromFile() : int
    {
        if (!file_exists($path = base_path('modules.json'))) {
            $this->error("File 'modules.json' does not exist in your project root.");

            return E_ERROR;
        }

        $modules = Json::make($path);

        $dependencies = $modules->get('require', []);

        foreach ($dependencies as $module) {
            $module = collect($module);

            $this->install(
                $module->get('name'),
                $module->get('version'),
                $module->get('type')
            );
        }

        return 0;
    }

    /**
     * Install the specified module.
     *
     * @param string $name
     * @param string $version
     * @param string $type
     * @param bool   $tree
     */
    protected function install($name, $version = 'dev-master', $type = 'gitee', $tree = false, $dev = false)
    {
        $giteeName = 'wdcms/'.strtolower($name).'-module';

        // 检查依赖
        $this->checkRequires($name, $giteeName);

        $installer = new ModuleInstaller(
            $giteeName,
            $version,
            $type ?: $this->option('type'),
            $tree ?: $this->option('tree'),
            $dev
        );

        $installer->setRepository($this->laravel['modules']);
        $installer->setConsole($this);

        if ($timeout = $this->option('timeout')) {
            $installer->setTimeout($timeout);
        }
        if ($path = $this->option('path')) {
            $installer->setPath($path);
        }
        $res = $installer->run();

        if(!$res->isSuccessful()) {
            $this->error('token miss:Please make sure you have the correct access rightsand the repository exists');
            return 0;
        }

        // create module status
        ModuleAdmin::updateOrCreate(['name' => $installer->getModuleName()],['active' => true]);

        $this->call('cache:clear');
        if (!$this->option('no-update')) {
            $this->call('module:update', [
                'module' => $installer->getModuleName(),
            ]);
        }

        // migrate
        $this->call('module:migrate', [
            'module' => $installer->getModuleName()
        ]);
    }

    /**
     * @param $name
     * @param $gitName
     * @return bool
     */
    private function checkRequires($name, $gitName)
    {
        $r = Http::get('https://gitee.com/api/v5/repos/'.$gitName.'/contents/module.json?access_token='.config('wdcms.git.personal_access_tokens'));
        if(!$r->successful()) {
            $this->error('get module info failed');
            return false;
        }

        $content = json_decode(base64_decode($r->object()->content), true);
        foreach ($content['requires'] as $_require) {
            if(!Module::has(Str::studly($_require))) {
                $this->call('wd:install', [
                    'name' => $_require
                ]);
            }
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::OPTIONAL, 'The name of module will be installed.'],
            ['version', InputArgument::OPTIONAL, 'The version of module will be installed.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['timeout', null, InputOption::VALUE_OPTIONAL, 'The process timeout.', null],
            ['path', null, InputOption::VALUE_OPTIONAL, 'The installation path.', null],
            ['type', null, InputOption::VALUE_OPTIONAL, 'The type of installation.', null],
            ['tree', null, InputOption::VALUE_NONE, 'Install the module as a git subtree', null],
            ['dev', null, InputOption::VALUE_NONE, 'Install the module in a dev environment', null],
            ['no-update', null, InputOption::VALUE_NONE, 'Disables the automatic update of the dependencies.', null],
        ];
    }
}
