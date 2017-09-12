<?php

namespace RafflesArgentina\UserRoleAndPermission\Repositories;

use Caffeinated\Repository\Repositories\EloquentRepository;

use RafflesArgentina\UserRoleAndPermission\Models\User;

class UserRepository extends EloquentRepository
{
    public $model = User::class;

    protected $tag = ['User'];
}
