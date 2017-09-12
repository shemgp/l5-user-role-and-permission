<?php

namespace RafflesArgentina\UserRoleAndPermission\Repositories;

use Caffeinated\Repository\Repositories\EloquentRepository;
use Caffeinated\Shinobi\Models\Permission;

class PermissionRepository extends EloquentRepository
{
    public $model = Permission::class;

    protected $tag = ['Permission'];
}
