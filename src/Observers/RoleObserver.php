<?php

namespace RafflesArgentina\UserRoleAndPermission\Observers;

use Log;
use Caffeinated\Shinobi\Models\Role;

class RoleObserver
{
    /**
     * Listen to the Role created event.
     *
     * @param  Role  $role
     * @return void
     */
    public function created(Role $role)
    {
        Log::info("Role id {$role->id} created.");
    }

    /**
     * Listen to the Role creating event.
     *
     * @param  Role  $role
     * @return void
     */
    public function creating(Role $role)
    {
        $role->slug = str_slug($role->name);
        $latestSlug = $role->whereRaw("slug RLIKE '^{$role->slug}(-[0-9]*)?$'")
            ->latest('id')
            ->value('slug');
        if ($latestSlug) {
            $pieces = explode('-', $latestSlug);
            $number = intval(end($pieces));
            $role->slug .= '-'.($number + 1);
        }
    }

    /**
     * Listen to the Role updated event.
     *
     * @param  Role  $role
     * @return void
     */
    public function updated(Role $role)
    {
        Log::info("Role id {$role->id} updated.");
    }

    /**
     * Listen to the Role updating event.
     *
     * @param  Role  $role
     * @return void
     */
    public function updating(Role $role)
    {
        //
    }

    /**
     * Listen to the Role deleted event.
     *
     * @param  Role  $role
     * @return void
     */
    public function deleted(Role $role)
    {
        Log::info("Role id {$role->id} deleted.");
    }

    /**
     * Listen to the Role deleting event.
     *
     * @param  Role  $role
     * @return void
     */
    public function deleting(Role $role)
    {
        //
    }
}
