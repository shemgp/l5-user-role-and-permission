<?php

namespace RafflesArgentina\UserRoleAndPermission\Http\Requests;

use Illuminate\Validation\Rule;

use RafflesArgentina\ActionBasedFormRequest\ActionBasedFormRequest;

use RafflesArgentina\UserRoleAndPermission\Sorters\UserSorters;
use RafflesArgentina\UserRoleAndPermission\Repositories\UserRepository;

class UserRequest extends ActionBasedFormRequest
{
    public static function index()
    {
        return [
            'show' => 'numeric|min:1|max:400',
            'order' => 'in:asc,desc',
            'orderBy' => Rule::in(array_keys(UserSorters::listOrderByKeys())),
        ];
    }

    public static function store()
    {
        return [
            'email' => 'required|max:255',
            'slug' => [
                'sometimes',
                Rule::unique(config('user-role-and-permission.table_name')),
            ],
            'password' => 'required|confirmed|min:6',
            
        ];
    }

    public static function update()
    {
        $repository = new UserRepository();
        $user = $repository->findBy(
            $repository->model->getRouteKeyName(),
            request()->route(
                str_singular(config('user-role-permission.resource_name') ?: 'users')
            )
        );
        $id = !is_null($user) ? $user->id : null;

        $storeRules = static::store();
        $updateRules = array_set($storeRules, 'slug',
            [
                'sometimes',
                Rule::unique(config('user-role-and-permission.table_name') ?: 'users')->ignore($id)
            ]
        );

        return $updateRules;
    }
}
