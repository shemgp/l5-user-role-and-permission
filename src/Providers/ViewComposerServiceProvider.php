<?php

namespace RafflesArgentina\UserRoleAndPermission\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    protected $module, $prefix, $resourceName;

    public function __construct()
    {
        $this->prefix = config('user-role-and-permission.prefix');
        if ($this->prefix) {
            $this->prefix .= '.';
        }

        $this->module = config('user-role-and-permission.module') ?: 'user-role-and-permission';
        if ($this->module) {
            $this->module .= '::';
        }

        $this->resourceName = config('user-role-and-permission.resource_name') ?: 'users';

        $this->roleResourceName = config('user-role-and-permission.role_resource_name') ?: 'roles';
    }


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeLayout();
        $this->composeUsers();
        $this->composeRoles();
    }

    private function composeLayout()
    {
        view()->composer($this->module.$this->prefix.'partials.header', 'RafflesArgentina\UserRoleAndPermission\Http\ViewComposers\LayoutPartialsComposer@composeHeader');
        view()->composer('vendor.user-role-and-permission.partials.header', 'RafflesArgentina\UserRoleAndPermission\Http\ViewComposers\LayoutPartialsComposer@composeHeader');
    }

    private function composeUsers()
    {
        view()->composer($this->module.$this->prefix.$this->resourceName.'.index', 'RafflesArgentina\UserRoleAndPermission\Http\ViewComposers\UsersComposer@composeIndex');
        view()->composer('vendor.user-role-and-permission.users.index', 'RafflesArgentina\UserRoleAndPermission\Http\ViewComposers\UsersComposer@composeIndex');

        view()->composer($this->module.$this->prefix.$this->resourceName.'.create', 'RafflesArgentina\UserRoleAndPermission\Http\ViewComposers\UsersComposer@composeCreate');
        view()->composer('vendor.user-role-and-permission.users.create', 'RafflesArgentina\UserRoleAndPermission\Http\ViewComposers\UsersComposer@composeCreate');

        view()->composer($this->module.$this->prefix.$this->resourceName.'.show', 'RafflesArgentina\UserRoleAndPermission\Http\ViewComposers\UsersComposer@composeShow');
        view()->composer('vendor.user-role-and-permission.users.show', 'RafflesArgentina\UserRoleAndPermission\Http\ViewComposers\UsersComposer@composeShow');

        view()->composer($this->module.$this->prefix.$this->resourceName.'.edit', 'RafflesArgentina\UserRoleAndPermission\Http\ViewComposers\UsersComposer@composeEdit');
        view()->composer('vendor.user-role-and-permission.users.edit', 'RafflesArgentina\UserRoleAndPermission\Http\ViewComposers\UsersComposer@composeEdit');
    }

    private function composeRoles()
    {
        view()->composer($this->module.$this->prefix.$this->roleResourceName.'.index', 'RafflesArgentina\UserRoleAndPermission\Http\ViewComposers\RolesComposer@composeIndex');
        view()->composer('vendor.user-role-and-permission.roles.index', 'RafflesArgentina\UserRoleAndPermission\Http\ViewComposers\RolesComposer@composeIndex');

        view()->composer($this->module.$this->prefix.$this->roleResourceName.'.create', 'RafflesArgentina\UserRoleAndPermission\Http\ViewComposers\RolesComposer@composeCreate');
        view()->composer('vendor.user-role-and-permission.roles.create', 'RafflesArgentina\UserRoleAndPermission\Http\ViewComposers\RolesComposer@composeCreate');

        view()->composer($this->module.$this->prefix.$this->roleResourceName.'.show', 'RafflesArgentina\UserRoleAndPermission\Http\ViewComposers\RolesComposer@composeShow');
        view()->composer('vendor.user-role-and-permission.roles.show', 'RafflesArgentina\UserRoleAndPermission\Http\ViewComposers\RolesComposer@composeShow');

        view()->composer($this->module.$this->prefix.$this->roleResourceName.'.edit', 'RafflesArgentina\UserRoleAndPermission\Http\ViewComposers\RolesComposer@composeEdit');
        view()->composer('vendor.user-role-and-permission.roles.edit', 'RafflesArgentina\UserRoleAndPermission\Http\ViewComposers\RolesComposer@composeEdit');
    }
}
