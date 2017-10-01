<?php

namespace RafflesArgentina\UserRoleAndPermission\Filters;

use RafflesArgentina\FilterableSortable\QueryFilters;

use RafflesArgentina\ArgentineCity\Repositories\CityRepository;
use RafflesArgentina\ArgentineCity\Repositories\StateRepository;
use RafflesArgentina\ArgentineCity\Repositories\CountryRepository;

class UserFilters extends QueryFilters
{
    public function cuit($query)
    {
        return $this->builder->where('cuit', $query);
    }

    public function city($query)
    {
        $repository = new CityRepository;
        $city = $repository->find($query);
        $name = $city ? $city->name : null;
        return $this->builder->where('city', 'LIKE', '%'.$name.'%');
    }

    public function town($query)
    {
        return $this->builder->where('town', 'LIKE', '%'.$query.'%');
    }

    public function email($query)
    {
        return $this->builder->where('email', 'LIKE', '%'.$query.'%');
    }

    public function state($query)
    {
        $repository = new StateRepository;
        $state = $repository->find($query);
        $name = $state ? $state->name : null;
        return $this->builder->where('state', 'LIKE', '%'.$name.'%');
    }

    public function country($query)
    {
        $repository = new CountryRepository;
        $country = $repository->find($query);
        $name = $country ? $country->name : null;
        return $this->builder->where('country', 'LIKE', '%'.$name.'%');
    }

    public function city_id($query)
    {
        return $this->builder->where('city_id', $query);
    }

    public function state_id($query)
    {
        return $this->builder->where('state_id', $query);
    }

    public function full_name($query)
    {
        return $this->builder->where(\DB::raw('CONCAT(first_name," ",last_name)'), 'LIKE', '%'.$query.'%')
                             ->orWhere(\DB::raw('CONCAT(last_name," ",first_name)'), 'LIKE', '%'.$query.'%')
                             ->orWhere(\DB::raw('CONCAT(last_name,", ",first_name)'), 'LIKE', '%'.$query.'%');
    }

    public function country_id($query)
    {
        return $this->builder->where('country_id', $query);
    }
}
