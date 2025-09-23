<?php

namespace App\Repositories\Dashboard;

use App\Models\Role;

class RoleRepository
{
    public function getRolesPagination(int $limit = 5)
    {
        return Role::paginate($limit);
    }

    public function getAllRoles()
    {
        return Role::get();
    }

    public function createRole($validated_data)
    {
        $role = Role::create($validated_data);
        return $role;
    }

    public function getRole($id)
    {
        return Role::find($id);
    }

    public function updateRole($validated_data, $role)
    {
        return $role->update($validated_data);
    }

    public function destroy($role)
    {
        return $role->delete();
    }
}
