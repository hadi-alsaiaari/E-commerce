<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Role;

class RolePolicy
{
    /**
     * Determine whether the user can manage models.
     */
    public function manageRoles(Admin $admin): bool
    {
        return $admin->hasPermission(128);
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $admin, Role $role): bool
    {
        return $admin->hasPermission(128);
    }

    /**
     * Determine whether the admin can view the model.
     */
    public function view(Admin $admin): bool
    {
        return $admin->hasPermission(128);
    }

    /**
     * Determine whether the admin can create models.
     */
    public function create(Admin $admin): bool
    {
        return $admin->hasPermission(128);
    }

    /**
     * Determine whether the admin can update the model.
     */
    public function update(Admin $admin, Role $role): bool
    {
        return $admin->hasPermission(128);
    }

    /**
     * Determine whether the admin can delete the model.
     */
    public function delete(Admin $admin, Role $role): bool
    {
        return $admin->hasPermission(128);
    }

    /**
     * Determine whether the admin can delete the model.
     */
    public function changeStatus(Admin $admin, Role $role): bool
    {
        return $admin->hasPermission(128);
    }
    
    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $admin, Role $role): bool
    {
        return $admin->hasPermission(128);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $admin, Role $role): bool
    {
        return $admin->hasPermission(128);
    }
}
