<?php

namespace RafflesArgentina\UserRoleAndPermission\Observers;

use Log;
use RafflesArgentina\UserRoleAndPermission\Models\User;

class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(User $user)
    {
        Log::info("User id {$user->id} created.");
    }

    /**
     * Listen to the User creating event.
     *
     * @param  User  $user
     * @return void
     */
    public function creating(User $user)
    {
        //
    }

    /**
     * Listen to the User updated event.
     *
     * @param  User  $user
     * @return void
     */
    public function updated(User $user)
    {
        Log::info("User id {$user->id} updated.");
    }

    /**
     * Listen to the User updating event.
     *
     * @param  User  $user
     * @return void
     */
    public function updating(User $user)
    {
        //
    }

    /**
     * Listen to the User deleted event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        Log::info("User id {$user->id} deleted.");
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleting(User $user)
    {
        //
    }
}
