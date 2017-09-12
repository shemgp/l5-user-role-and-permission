<?php

return [
    'module' => 'user-role-and-permission',
    'filters' => null,
    'sorters' => null,
    'presenter' => null,
    'city_class' => RafflesArgentina\ArgentineCity\Models\City::class,
    'date_format' => 'd/m/Y',
    'state_class' => RafflesArgentina\ArgentineCity\Models\State::class,
    'form_request' => null,
    'country_class' => RafflesArgentina\ArgentineCity\Models\Country::class,
    'resource_name' => 'users',
    'route_key_name' => 'slug',

    'status_route_key_name' => 'slug',
    'person_type_route_key_name' => 'slug',
    'document_type_route_key_name' => 'slug',
];
