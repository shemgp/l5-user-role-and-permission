<?php

namespace RafflesArgentina\UserRoleAndPermission\Http\Requests;

use Illuminate\Validation\Rule;

use RafflesArgentina\ActionBasedFormRequest\ActionBasedFormRequest;

use RafflesArgentina\UserRoleAndPermission\Sorters\RoleSorters;
use RafflesArgentina\UserRoleAndPermission\Repositories\RoleRepository;

class RoleRequest extends ActionBasedFormRequest
{
    public static function index()
    {
        return [
            'show' => 'numeric|min:1|max:400',
            'order' => 'in:asc,desc',
            'orderBy' => Rule::in(array_keys(RoleSorters::listOrderByKeys())),
            'name' => 'max:50',
        ];
    }

    public static function store()
    {
        return [
            'name' => [
                 'required',
                 'max:50',
                 Rule::unique(config('user-role-and-permission.role_table_name') ?: 'roles')
             ],
            'slug' => [
                'sometimes',
                Rule::unique(config('user-role-and-permission.role_table_name') ?: 'roles')
            ],
            'special' => 'in:no-access,all-access',
            'permissions' => 'nullable|array',
            'description' => 'nullable|max:100',
        ];
    }

    public static function update()
    {
        $repository = new RoleRepository();
        $role = $repository->findBy(
            $repository->model->getRouteKeyName(),
            request()->route(
                str_singular(config('user-role-and-permission.role_resource_name') ?: 'roles')
            )
        );
        $id = !is_null($role) ? $role->id : null;

        $storeRules = static::store();
        $updateRules = array_set($storeRules, 'name',
            [
                'required',
                'max:50',
                Rule::unique(config('user-role-and-permission.role_table_name') ?: 'roles')->ignore($id)
            ]
        );

        $updateRules = array_set($updateRules, 'slug',
            [
                'sometimes',
                Rule::unique(config('user-role-and-permission.role_table_name') ?: 'roles')->ignore($id)
            ]
        );

        return $updateRules;
    }
}
