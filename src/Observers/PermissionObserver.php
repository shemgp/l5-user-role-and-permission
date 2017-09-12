<?php

namespace RafflesArgentina\UserRoleAndPermission\Observers;

use Log;
use Caffeinated\Shinobi\Models\Permission;

class PermissionObserver
{
    /**
     * Listen to the Permission created event.
     *
     * @param  Permission  $permission
     * @return void
     */
    public function created(Permission $permission)
    {
        Log::info("Permission id {$permission->id} created.");
    }

    /**
     * Listen to the Permission creating event.
     *
     * @param  Permission  $permission
     * @return void
     */
    public function creating(Permission $permission)
    {
        $permission->slug = $permission->name;
    }

    /**
     * Listen to the Permission updated event.
     *
     * @param  Permission  $permission
     * @return void
     */
    public function updated(Permission $permission)
    {
        Log::info("Permission id {$permission->id} updated.");
    }

    /**
     * Listen to the Permission updating event.
     *
     * @param  Permission  $permission
     * @return void
     */
    public function updating(Permission $permission)
    {
        //
    }

    /**
     * Listen to the Permission deleted event.
     *
     * @param  Permission  $permission
     * @return void
     */
    public function deleted(Permission $permission)
    {
        Log::info("Permission id {$permission->id} deleted.");
    }

    /**
     * Listen to the Permission deleting event.
     *
     * @param  Permission  $permission
     * @return void
     */
    public function deleting(Permission $permission)
    {
        //
    }
}
