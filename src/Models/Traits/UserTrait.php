<?php

namespace RafflesArgentina\UserRoleAndPermission\Models\Traits;

trait UserTrait
{
    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    }
}
