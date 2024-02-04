<?php

namespace TomatoPHP\TomatoTasks;

use Illuminate\Support\ServiceProvider;
use TomatoPHP\TomatoAdmin\Facade\TomatoMenu;
use TomatoPHP\TomatoAdmin\Services\Contracts\Menu;


class TomatoTasksServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register generate command
        $this->commands([
           \TomatoPHP\TomatoTasks\Console\TomatoTasksInstall::class,
        ]);

        //Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/tomato-tasks.php', 'tomato-tasks');

        //Publish Config
        $this->publishes([
           __DIR__.'/../config/tomato-tasks.php' => config_path('tomato-tasks.php'),
        ], 'tomato-tasks-config');

        //Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        //Publish Migrations
        $this->publishes([
           __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'tomato-tasks-migrations');
        //Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tomato-tasks');

        //Publish Views
        $this->publishes([
           __DIR__.'/../resources/views' => resource_path('views/vendor/tomato-tasks'),
        ], 'tomato-tasks-views');

        //Register Langs
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tomato-tasks');

        //Publish Lang
        $this->publishes([
           __DIR__.'/../resources/lang' => base_path('lang/vendor/tomato-tasks'),
        ], 'tomato-tasks-lang');

        //Register Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

    }

    public function boot(): void
    {
        TomatoMenu::register([
            Menu::make()
                ->group(__('PMS'))
                ->label(__('Sprints'))
                ->route('admin.sprints.index')
                ->icon('bx bx-circle'),
            Menu::make()
                ->group(__('PMS'))
                ->label(__('Issues'))
                ->route('admin.issues.index')
                ->icon('bx bx-circle')
        ]);
    }
}
