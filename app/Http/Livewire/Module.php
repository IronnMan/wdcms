<?php
namespace App\Http\Livewire;

use App\Jobs\TenantAdminCreate;
use App\Models\ModuleAdmin;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\Component;
use Nwidart\Modules\Facades\Module as NModule;

class Module extends Component
{

    protected $modules;
    public $moduleModal = false;
    private $moduleAdmin;

    /**
     * git服务器模块拉取
     * @var array
     */
    public $gitModules;

    public $moduleForm = [
        'name' => ''
    ];

    /**
     * @throws \Exception
     */
    public function mount()
    {
        // 获取服务器模块
        $git_module_cache_key = 'gitee_module';
        $gitModules = cache($git_module_cache_key);

        if(!$gitModules) {
            $res = Http::get(config('wdcms.git.host'), [
                'access_token' => 'f62b9257e4e2fec9ba368af267345253',
                'type' => 'all', //all, public, private
                'page' => '1',
                'per_page' => '20'
            ]);

            if($res->successful()) {
                $gitModules = $res->object();
                cache([$git_module_cache_key => $gitModules], now()->addHour());
            }else{
                Log::error('wdcms modules pull error: '.$res->object()->message);
            }
        }

        // 找到module名字
        $this->gitModules = !$gitModules
            ? collect()
            : collect($gitModules)->filter(function($item){
                return Str::contains($item->name, '-module');
            })->map(function($item) {
                return [
                    'name' => Str::studly(str_replace('-module', '', $item->name)),
                    'logo' => $item->homepage,
                    'desc' => $item->description
                ];
            });
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        $this->moduleForm = ModuleAdmin::where(['name' => $id])->first()->toArray();
        if(!$this->moduleForm) {
            return;
        }
        $this->moduleModal = true;
    }

    /**
     * @param $name
     * @param $status
     */
    public function updateStatus($name, $status)
    {
        if(strtolower($name) == 'core') {
            return false;
        }
        $module = NModule::findOrFail($name);
        if($status === 0) {
            $module->disable();
        }else if($status === 1){
            $module->enable();
        }
    }

    /**
     * @param ModuleAdmin $module
     * @return mixed
     */
    public function render(ModuleAdmin $module)
    {
        $this->modules = NModule::all();
        $notInstall = $this->gitModules->filter(function($v, $k) {
            return !in_array($v['name'], collect($this->modules)->keys()->toArray());
        });
        return view('livewire.module.index', [
            'modules' => $this->modules,
            'notInstall' => $notInstall
        ])->extends('layouts.landlord');
    }

}
