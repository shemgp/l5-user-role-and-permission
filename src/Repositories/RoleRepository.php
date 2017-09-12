<?php

namespace RafflesArgentina\UserRoleAndPermission\Repositories;

use Caffeinated\Repository\Repositories\EloquentRepository;
use Caffeinated\Shinobi\Models\Role;

class RoleRepository extends EloquentRepository
{
    public $model = Role::class;

    protected $tag = ['Role'];
}
