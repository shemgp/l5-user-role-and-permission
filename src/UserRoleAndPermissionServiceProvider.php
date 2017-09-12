<?php

namespace RafflesArgentina\UserRoleAndPermission;

use Illuminate\Support\ServiceProvider;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;

use RafflesArgentina\UserRoleAndPermission\Models\User;

use RafflesArgentina\UserRoleAndPermission\Observers\RoleObserver;
use RafflesArgentina\UserRoleAndPermission\Observers\UserObserver;
use RafflesArgentina\UserRoleAndPermission\Observers\PermissionObserver;

use RafflesArgentina\UserRoleAndPermission\Providers\RouteServiceProvider;
use RafflesArgentina\UserRoleAndPermission\Providers\ExceptionServiceProvider;
use RafflesArgentina\UserRoleAndPermission\Providers\ViewComposerServiceProvider;

class UserRoleAndPermissionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/Config/user-role-and-permission.php' => config_path('user-role-and-permission.php')], 'user-role-and-permission');

        $this->publishes([__DIR__.'/Database/Migrations' => database_path('migrations')], 'user-role-and-permission');

        $this->publishes([__DIR__.'/Resources/Views' => resource_path('views/vendor/user-role-and-permissions')], 'user-role-and-permission');

        $this->publishes([__DIR__.'/../assets/js/user-role-and-permission.js' => public_path('js/user-role-and-permission.js')], 'user-role-and-permission');

        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');

        $this->loadViewsFrom(__DIR__.'/Resources/Views', 'user-role-and-permission');

        Role::observe(RoleObserver::class);
        User::observe(UserObserver::class);
        Permission::observe(PermissionObserver::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/Config/user-role-and-permission.php', 'user-role-and-permission');

        $this->app->register('Caffeinated\Shinobi\ShinobiServiceProvider');

        $this->app->register(RouteServiceProvider::class);
        $this->app->register(ExceptionServiceProvider::class);
        $this->app->register(ViewComposerServiceProvider::class);

        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Shinobi', \Caffeinated\Shinobi\Facades\Shinobi::class);
    }
}
