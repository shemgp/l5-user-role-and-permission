<?php

namespace RafflesArgentina\UserRoleAndPermission\Sorters;

use RafflesArgentina\FilterableSortable\QuerySorters;

class RoleSorters extends QuerySorters
{
    protected static $defaultOrder = "asc";

    protected static $defaultOrderByKey = "name";

    public function name()
    {
        return $this->builder->orderBy('name', $this->order());
    }
}
