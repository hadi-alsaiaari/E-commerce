<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\RoleRepository;

class RoleService
{
    public $role_repository;
    /**
     * Create a new class instance.
     */
    public function __construct(RoleRepository $role_repository)
    {
        $this->role_repository = $role_repository;
    }

    public function getRolesPagination(int $limit = 5)
    {
        return $this->role_repository->getRolesPagination($limit);
    }

    public function getAllRoles()
    {
        return $this->role_repository->getAllRoles();
    }

    public function createRole($validated_data)
    {
        $validated_data['permissions'] = $this->calcPermissions($validated_data['permissions'], $validated_data['checked_all'] ?? '');
        
        return $this->role_repository->createRole($validated_data);
    }

    public function getRole($id)
    {
        return $this->role_repository->getRole($id);
    }

    public function updateRole($validated_data, $id)
    {
        $role = $this->role_repository->getRole($id);
        if (!$role)
            return false;

        $validated_data['permissions'] = $this->calcPermissions($validated_data['permissions'], $validated_data['checked_all'] ?? '');

        return $this->role_repository->updateRole($validated_data, $role);
    }

    public function destroy($id)
    {
        $role = $this->role_repository->getRole($id);
        if (!$role || 0 < $role->admins()->count())
            return false;

        return $this->role_repository->destroy($role);
    }

    private function calcPermissions($permissions, $checked_all)
    {
        if ($checked_all == 'on' || $checked_all == 1)
            return -1;
        
        $total_permissions = 0;
        foreach ($permissions as $permission) {
            $total_permissions |= (int)$permission;
        }
        return $total_permissions;
    }
}
