<?php

namespace ErpNET\SCartTemplate\Providers;

use Illuminate\Support\ServiceProvider;

class TServiceProvider extends ServiceProvider
{
    protected $commands = [
        \ErpNET\SCartTemplate\Console\Commands\Install::class,
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $app = $this->app;

        $projectRootDir = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR;

        //Publish Config
        $this->publishes([
            $projectRootDir.'src/public/templates/tigresatemplate' => public_path('templates/tigresatemplate'),
            $projectRootDir.'src/views/templates/tigresatemplate' => resource_path('views/templates/tigresatemplate'),            
        ], 'erpnet');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // register the artisan commands
        $this->commands($this->commands);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
