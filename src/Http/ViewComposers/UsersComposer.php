<?php

namespace RafflesArgentina\UserRoleAndPermission\Http\ViewComposers;

use Illuminate\Contracts\View\View;

use RafflesArgentina\UserRoleAndPermission\Filters\UserFilters;
use RafflesArgentina\UserRoleAndPermission\Sorters\UserSorters;

use RafflesArgentina\UserRoleAndPermission\Repositories\UserRepository;

class UsersComposer
{
    protected $user;

    public function __construct(UserSorters $sorters)
    {
        $this->sorters = $sorters;

        $this->alias = config('user-role-and-permission.alias');
        if ($this->alias) {
            $this->alias .= '.';
        }

        $this->prefix = config('user-role-and-permission.prefix');
        if ($this->prefix) {
            $this->prefix .= '.';
        }

        $this->module = config('user-role-and-permission.module') ?: 'user-role-and-permission';
        if ($this->module) {
            $this->module .= '::';
        }

        $this->title = 'Usuarios';

        $this->layout = $this->module.$this->prefix.'layouts.default';

        $this->resource_name = config('user-role-and-permission.resource_name') ?: 'user-role-and-permissions';
        $this->index_route = $this->alias.$this->resource_name.'.index';
        $this->create_route = $this->alias.$this->resource_name.'.create';
        $this->store_route = $this->alias.$this->resource_name.'.store';
        $this->show_route = $this->alias.$this->resource_name.'.show';
        $this->edit_route = $this->alias.$this->resource_name.'.edit';
        $this->update_route = $this->alias.$this->resource_name.'.update';
        $this->destroy_route = $this->alias.$this->resource_name.'.destroy';
    }

    public function composeHeader(View $view)
    {
        //
    }

    public function composeIndex(View $view)
    {
        $view->with('title', $this->title)
             ->with('module', $this->module)
             ->with('prefix', $this->prefix)
             ->with('layout', $this->layout)
             ->with('edit_route', $this->edit_route)
             ->with('show_route', $this->show_route)
             ->with('index_route', $this->index_route)
             ->with('create_route', $this->create_route)
             ->with('destroy_route', $this->destroy_route)
             ->with('resource_name', $this->resource_name);

        $appliedFilters = UserFilters::getAppliedFilters();
        $appliedSorters = $this->sorters->getAppliedSorters();
        $appliedFiltersAndSorters = $appliedFilters;
        $appliedFiltersAndSorters += $appliedSorters;

        $view->with('order', $this->sorters->order())
             ->with('orderBy', $this->sorters->orderBy())
             ->with('orderByKeys', $this->sorters->listOrderByKeys())
             ->with('appliedFilters', $appliedFilters)
             ->with('appliedSorters', $appliedSorters)
             ->with('appliedFiltersAndSorters', $appliedFiltersAndSorters);
    }

    public function composeCreate(View $view)
    {
        $view->with('title', $this->title)
             ->with('module', $this->module)
             ->with('prefix', $this->prefix)
             ->with('layout', $this->layout)
             ->with('index_route', $this->index_route)
             ->with('store_route', $this->store_route)
             ->with('resource_name', $this->resource_name);
    }

    public function composeShow(View $view)
    {
        $view->with('title', $this->title)
             ->with('module', $this->module)
             ->with('prefix', $this->prefix)
             ->with('layout', $this->layout)
             ->with('index_route', $this->index_route)
             ->with('resource_name', $this->resource_name);
    }

    public function composeEdit(View $view)
    {
        $view->with('title', $this->title)
             ->with('module', $this->module)
             ->with('prefix', $this->prefix)
             ->with('layout', $this->layout)
             ->with('index_route', $this->index_route)
             ->with('update_route', $this->update_route)
             ->with('resource_name', $this->resource_name);
    }
}
