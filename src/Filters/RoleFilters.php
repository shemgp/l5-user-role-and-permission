<?php

namespace RafflesArgentina\UserRoleAndPermission\Filters;

use RafflesArgentina\FilterableSortable\QueryFilters;

class RoleFilters extends QueryFilters
{
    public function name($query)
    {
        return $this->builder->where('name', 'LIKE', '%'.$query.'%');
    }
}
