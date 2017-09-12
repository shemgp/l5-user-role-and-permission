<?php

namespace RafflesArgentina\UserRoleAndPermission\Http\ViewComposers;

use Illuminate\Contracts\View\View;

use RafflesArgentina\UserRoleAndPermission\Repositories\RoleRepository;
use RafflesArgentina\UserRoleAndPermission\Repositories\UserRepository;

class LayoutPartialsComposer
{
    protected $role, $user;

    public function __construct(RoleRepository $role, UserRepository $user)
    {
        $this->Role = $role;
        $this->User = $user;

        $this->alias = config('user-role-and-permission.alias');
        if ($this->alias) {
            $this->alias .= '.';
        }

        $this->module = config('user-role-and-permission.module') ?: 'user-role-and-permission';
        if ($this->module) {
            $this->module .= '::';
        }

        $this->prefix = config('user-role-and-permission.prefix');
        if ($this->prefix) {
            $this->prefix .= '.';
        }

        $this->layout = $this->module.$this->prefix.'layouts.default';

        $this->resource_name = config('user-role-and-permission.resource_name') ?: 'users';
        $this->index_route = $this->alias.$this->resource_name.'.index';
        $this->create_route = $this->alias.$this->resource_name.'.create';
        $this->store_route = $this->alias.$this->resource_name.'.store';
        $this->show_route = $this->alias.$this->resource_name.'.show';
        $this->edit_route = $this->alias.$this->resource_name.'.edit';
        $this->update_route = $this->alias.$this->resource_name.'.update';
        $this->destroy_route = $this->alias.$this->resource_name.'.destroy';

        $this->role_resource_name = config('user-role-and-permission.role_resource_name') ?: 'roles';
        $this->role_index_route = $this->alias.$this->role_resource_name.'.index';
    }

    public function composeHeader(View $view)
    {
        $view->with('create_route', $this->create_route)
             ->with('role_index_route', $this->role_index_route);

        $view->with('usersCount', $this->User->count());
        $view->with('rolesCount', $this->Role->count());
    }
}
