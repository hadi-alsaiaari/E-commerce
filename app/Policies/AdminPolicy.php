<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AdminPolicy
{
    /**
     * Determine whether the user can manage models.
     */
    public function manageAdmins(Admin $admin): bool
    {
        return $admin->hasPermission(1);
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->hasPermission(1);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, Admin $admin): bool
    {
        return $user->hasPermission(1);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->hasPermission(1);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, Admin $admin): bool
    {
        return $user->hasPermission(1);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, Admin $admin): bool
    {
        return $user->hasPermission(1);
    }

    public function changeStatus(Admin $user, Admin $admin): bool
    {
        return $user->hasPermission(1);
    }
}
