<?php

namespace App\Repositories\Dashboard;

use App\Models\Admin;
use App\Models\Role;

class AdminRepository
{
    public function getAdminsPagination($limit = 5)
    {
        return Admin::select('id', 'name', 'email', 'created_at' , 'role_id' , 'status')->with('role:id,role')->paginate($limit);
    }

    public function createAdmin($validated_data)
    {
        return Admin::create($validated_data);
    }

    public function getAdmin($id)
    {
        return Admin::find($id)->load('role:id,role');
    }

    public function updateAdmin($validated_data, $admin)
    {
        return $admin->update($validated_data);
    }

    public function destroyAdmin($admin)
    {
        return $admin->delete();
    }

    public function changeStatus($admin, $status)
    {
        return $admin->update(['status' => $status]);
    }
}
