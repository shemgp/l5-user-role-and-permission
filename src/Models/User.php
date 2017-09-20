<?php

namespace RafflesArgentina\UserRoleAndPermission\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Laracasts\Presenter\PresentableTrait;
use Caffeinated\Shinobi\Traits\ShinobiTrait;

use RafflesArgentina\Sluggable\SluggableTrait;
use RafflesArgentina\FilterableSortable\FilterableSortableTrait;

use RafflesArgentina\UserRoleAndPermission\Filters\UserFilters;
use RafflesArgentina\UserRoleAndPermission\Sorters\UserSorters;
use RafflesArgentina\UserRoleAndPermission\Models\Traits\UserTrait;
use RafflesArgentina\UserRoleAndPermission\Presenters\UserPresenter;

class User extends Authenticatable
{
    use UserTrait,
        SoftDeletes,
        ShinobiTrait,
        SluggableTrait,
        PresentableTrait,
        FilterableSortableTrait;

    protected static $slug = [
        'field' => 'slug',
        'name' => 'email',
    ];

    protected $dates = [
        'deleted_at',
    ];

    protected $table;

    protected $perPage;

    protected $fillable = [
        'fax',
        'city',
        'cuit',
        'town',
        'slug',
        'email',
        'phone',
        'state',
        'mobile',
        'city_id',
        'comment',
        'country',
        'twitter',
        'website',
        'facebook',
        'password',
        'position',
        'state_id',
        'zip_code',
        'confirmed',
        'last_name',
        'status_id',
        'country_id',
        'first_name',
        'home_address',
        'legal_address',
        'remember_token', 
        'activation_code',
        'document_number',
        'document_type_id',
    ];

    protected $filters;

    protected $sorters;

    protected $presenter;

    protected $city_class;

    protected $state_class;

    protected $status_class;

    protected $country_class;

    protected $document_type_class;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('user-role-and-permission.table_name') ?: 'users';

        $this->filters = config('user-role-and-permission.filters') ?: UserFilters::class;

        $this->perPage = config('user-role-and-permission.per_page') ?: '25';

        $this->sorters = config('user-role-and-permission.sorters') ?: UserSorters::class;

        $this->presenter = config('user-role-and-permission.presenter') ?: UserPresenter::class;

        $this->city_class = config('user-role-and-permission.city_class');

        $this->state_class = config('user-role-and-permission.state_class');

        $this->status_class = config('user-role-and-permission.status_class');

        $this->country_class = config('user-role-and-permission.country_class');

        $this->document_type_class = config('user-role-and-permission.document_type_class');
    }

    public function getRouteKeyName()
    {
        return config('user-role-and-permission.route_key_name') ?: 'id';
    }

    public function city()
    {
        return $this->belongsTo($this->city_class, 'city_id');
    }

    public function state()
    {
        return $this->belongsTo($this->state_class, 'state_id');
    }

    public function status()
    {
        return $this->belongsTo($this->status_class, 'status_id');
    }

    public function country()
    {
        return $this->belongsTo($this->country_class, 'country_id');
    }

    public function documentType()
    {
        return $this->belongsTo($this->document_type_class, 'document_type_id');
    }
}
