<?php

namespace App\Providers;

use App\Utils\SvgComponent;
use App\Utils\WdBlueprint;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\View\Compilers\BladeCompiler;
use Laravel\Telescope\TelescopeServiceProvider;
use Xbhub\XGee\XGeeServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            // local mode
             $this->app->register(TelescopeServiceProvider::class);
            $this->app->register(XGeeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerComponents();

        if ($this->app->runningInConsole()) {
            // migrate中的自定义字段
            $this->registerBlueprint();

            // 注册命令
//            $this->commands([
//                SyncModulePermission::class,
//                WidgetMakeCommand::class,
//            ]);
        }

    }

    public function registerBlueprint()
    {
        // registerBlueprint
        Blueprint::macro('tenant', function (){ WdBlueprint::tenant($this); });
        Blueprint::macro('createby', function (){ WdBlueprint::createby($this); });
        Blueprint::macro('pathtree', function (){ WdBlueprint::pathtree($this); });
        Blueprint::macro('status', function (){ WdBlueprint::status($this); });
        Blueprint::macro('count', function (){ WdBlueprint::count($this); });
        Blueprint::macro('sort', function (){ WdBlueprint::sort($this); });
        Blueprint::macro('trace', function (){ WdBlueprint::trace($this); });
    }

    /**
     * 注册组件，大部分推荐使用静态匿名组件，非匿名组件推荐livewire
     */
    protected function registerComponents()
    {
        $this->callAfterResolving(BladeCompiler::class, function () {

            $filesystem = new Filesystem();

            // svg icon register
            $resource_path = config('wdcms.icon.path');
            foreach ($filesystem->allFiles($resource_path) as $file) {
                if ($file->getExtension() !== 'svg') {
                    continue;
                }
                Blade::component(
                    SvgComponent::class,
                    $file->getFilenameWithoutExtension(),
                    'icon'
                );
            }
        });
    }


}
