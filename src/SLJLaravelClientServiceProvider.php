<?php

/*
 * (c) SLJ.me <support@slj.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SLJ\SLJLaravelClient;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class SLJLaravelClientServiceProvider extends ServiceProvider
{
    /**
     * Publishes all the config file this package needs to function.
     */
    public function boot()
    {
        $this->app->register(\SLJ\SLJLaravelClient\Providers\EventServiceProvider::class);
        $this->registerPublishing();
        $this->registerRoutes();
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    protected function registerRoutes(): void
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config' => config_path(),
                __DIR__.'/../database/migrations' => database_path('migrations'),
            ], 'slj');
        }
    }

    /**
     * Get the Nova route group configuration array.
     *
     * @return array
     */
    protected function routeConfiguration()
    {
        return [
            'namespace' => 'SLJ\SLJLaravelClient\Http\Controllers',
            //'prefix' => 'slj',
            'as' => 'slj.',
            'middleware' => 'web',
        ];
    }
}
