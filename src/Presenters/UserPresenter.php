<?php

namespace RafflesArgentina\UserRoleAndPermission\Presenters;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter 
{
    public function city()
    {
        return ucwords(strtolower($this->entity->city));
    }

    public function name()
    {
        return $this->entity->full_name;
    }

    public function town()
    {
        return ucwords(strtolower($this->entity->town));
    }

    public function state()
    {
        return ucwords(strtolower($this->entity->state));
    }

    public function country()
    {
        return ucwords(strtolower($this->entity->country));
    }

    public function full_name()
    {
        return $this->entity->first_name.' '.$this->entity->last_name;
    }

    public function main_phone()
    {
        return $this->entity->phone ? $this->entity->phone : $this->entity->mobile;
    }

    public function documentType()
    {
        if (!is_null($this->entity->documentType)) {
            return $this->entity->documentType->present()->name;
        }
    }

    public function home_address()
    {
        return ucwords(strtolower($this->entity->home_address));
    }

    public function legal_address()
    {
        return ucwords(strtolower($this->entity->legal_address));
    }

    public function full_name_or_email()
    {
        return $this->full_name() ?: $this->email;
    }
}
