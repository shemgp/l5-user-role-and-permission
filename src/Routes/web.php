<?php

$alias = config('user-role-and-permission.alias');
$prefix = config('user-role-and-permission.prefix');

Route::prefix($prefix)->group(function () use ($alias) {
    Route::resource((config('user-role-and-permission.resource_name') ?: 'users'), 'UsersController', ['as' => $alias]);
    Route::resource((config('user-role-and-permission.roles_resource_name') ?: 'roles'), 'RolesController', ['as' => $alias]);
    Route::resource((config('user-role-and-permission.permission_resource_name') ?: 'permissions'), 'PermissionsController', ['as' => $alias]);
});
