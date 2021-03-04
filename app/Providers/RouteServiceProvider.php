<?php

namespace App\Providers;

use App\Actions\UserLogout;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Module;
use App\Http\Livewire\Tenant;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();
        $this->registerRoutes();
    }

    /**
     * @return $this
     */
    protected function registerRoutes()
    {
        if ($this->app->runningInConsole()) {
            return $this;
        }

        Route::middleware('web')
            ->domain(config('tenancy.central_domains')[0])
            ->group(function() {

            // 全局路由
            Route::view('/', 'welcome');
            Route::view('/demo/{p}', 'demo.index');

            // 后台路由
            Route::group([
                'prefix' => 'admin',
                'as' => 'admin.'
            ], function () {

                Route::get('login', Login::class)->name('login')->middleware('guest:landlord');
                Route::group([
                    'middleware' => 'auth:landlord'
                ], function () {
                    // 房东路由
                    Route::post('logout', UserLogout::class)->name('logout');

                    Route::view('/', 'admin')->name('home');
                    Route::get('/tenant', Tenant::class)->name('tenant');

                    Route::get('/module', Module::class)->name('module');
                });
            });
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
