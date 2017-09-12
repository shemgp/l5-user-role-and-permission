<?php

namespace RafflesArgentina\UserRoleAndPermission\Http\Requests;

use Illuminate\Validation\Rule;

use RafflesArgentina\ActionBasedFormRequest\ActionBasedFormRequest;

use RafflesArgentina\UserRoleAndPermission\Sorters\PermissionSorters;
use RafflesArgentina\UserRoleAndPermission\Repositories\PermissionRepository;

class PermissionRequest extends ActionBasedFormRequest
{
    public static function index()
    {
        return [
            'show' => 'numeric|min:1|max:400',
            'order' => 'in:asc,desc',
            'orderBy' => Rule::in(array_keys(PermissionSorters::listOrderByKeys())),
            'name' => 'max:100',
        ];
    }

    public static function store()
    {
        return [
            'name' => 'required|max:100',
            'slug' => [
                'sometimes',
                Rule::unique(config('user-role-and-permission.permission_table_name') ?: 'permissions'),
            ],
        ];
    }

    public static function update()
    {
        $repository = new PermissionRepository();
        $permission = $repository->findBy(
            $repository->model->getRouteKeyName(),
            request()->route(
                str_singular(config('user-role-and-permission.permission_resource_name') ?: 'permissions'),
            )
        );
        $id = !is_null($permission) ? $permission->id : null;

        $storeRules = static::store();
        $updateRules = array_set($storeRules, 'slug',
            [
                'sometimes',
                Rule::unique(config('user-role-and-permission.permission_table_name') ?: 'permissions')->ignore($id)
            ]
        );

        return $updateRules;
    }
}
