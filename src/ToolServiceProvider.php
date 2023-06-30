<?php

namespace Marshmallow\Maintenance;

use Laravel\Nova\Nova;
use App\Http\Middleware\Test;
use Illuminate\Routing\Router;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Http\Middleware\Authenticate;
use Marshmallow\Maintenance\Http\Middleware\Authorize;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Kernel $kernel)
    {
        $this->app->booted(function () {
            $this->routes();
        });

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'mm-maintenance');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/marshmallow/maintenance'),
            __DIR__ . '/../config/maintenance.php' =>  config_path('maintenance.php'),
        ], 'mm-maintenance');

        Nova::serving(function (ServingNova $event) {
            //
        });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Nova::router(['nova', Authenticate::class, Authorize::class], 'maintenance')
            ->group(__DIR__ . '/../routes/inertia.php');

        Route::middleware(['nova', Authorize::class])
            ->prefix('nova-vendor/maintenance')
            ->group(__DIR__ . '/../routes/api.php');
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\InstallCommand::class,
            ]);
        }
    }
}
