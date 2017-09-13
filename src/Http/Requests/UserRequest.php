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
            'fax' => 'nullable|max:25',
            'city' => 'nullable|max:50',
            'cuit' => 'nullable|numeric|digits:11',
            'town' => 'nullable|max:50',
            'email' => [
                'required',
                'max:255',
                Rule::unique(config('user-role-and-permission.table_name') ?: 'users'),
            ],
            'slug' => [
                'sometimes',
                Rule::unique(config('user-role-and-permission.table_name') ?: 'users'),
            ],
            'phone' => 'nullable|max:25',
            'state' => 'nullable|max:50',
            'mobile' => 'nullable|max:25',
            'city_id' => 'nullable|numeric',
            'comment' => 'nullable|max:255',
            'country' => 'nullable|max:50',
            'twitter' => 'nullable|url',
            'website' => 'nullable|url',
            'document' => 'nullable|numeric|digits_between:6,8',
            'facebook' => 'nullable|url',
            'password' => 'sometimes|confirmed|min:6',
            'position' => 'nullable|max:50',
            'state_id' => 'nullable|numeric',
            'zip_code' => 'nullable|alpha_num|max:25',
            'last_name' => 'nullable|max:50',
            'country_id' => 'nullable|numeric',
            'first_name' => 'required|max:25',
            'home_address' => 'nullable|max:50',
            'legal_address' => 'nullable|max:50',
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

        $updateRules = array_set($updateRules, 'email',
            [
                'required',
                'max:255',
                Rule::unique(config('user-role-and-permission.table_name') ?: 'users')->ignore($id)
            ]
        );

        return $updateRules;
    }
}
