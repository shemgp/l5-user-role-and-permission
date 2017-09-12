<?php

namespace RafflesArgentina\UserRoleAndPermission\Sorters;

use RafflesArgentina\FilterableSortable\QuerySorters;

class UserSorters extends QuerySorters
{
    protected static $defaultOrder = "asc";

    protected static $defaultOrderByKey = "full_name";

    public function id()
    {
        return $this->builder->orderBy('id', $this->order());
    }

    public function email()
    {
        return $this->builder->orderBy('email', $this->order());
    }

    public function full_name()
    {
        return $this->builder->orderBy(\DB::raw('CONCAT(first_name," ",last_name)'), $this->order());
    }
}
