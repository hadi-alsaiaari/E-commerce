<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\AdminRepository;

class AdminService
{
    public $admin_repository;
    /**
     * Create a new class instance.
     */
    public function __construct(AdminRepository $admin_repository)
    {
        $this->admin_repository = $admin_repository;
    }

    public function getAdminsPagination(int $limit = 5)
    {
        return $this->admin_repository->getAdminsPagination($limit);
    }

    public function createAdmin($validated_data)
    {
        return $this->admin_repository->createAdmin($validated_data);
    }

    public function getAdmin($id)
    {
        return $this->admin_repository->getAdmin($id);
    }

    public function updateAdmin($validated_data, $id)
    {
        $admin = $this->admin_repository->getAdmin($id);
        if (!$admin)
            return false;

        if ($validated_data['password'] == null)
            unset($validated_data['password']);

        return $this->admin_repository->updateAdmin($validated_data, $admin);
    }

    public function destroyAdmin($id)
    {
        $admin = $this->admin_repository->getAdmin($id);
        if ($admin && !$admin->is(auth('admin')->user()))
            return $this->admin_repository->destroyAdmin($admin);
        
        return false;
    }

    public function changeStatus($id)
    {
        $admin = $this->admin_repository->getAdmin($id);
        if (!$admin)
            return false;

        return $this->admin_repository->changeStatus($admin, !$admin->status);
    }
}

<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\AdminRepository;

class AdminService
{
    public $admin_repository;
    /**
     * Create a new class instance.
     */
    public function __construct(AdminRepository $admin_repository)
    {
        $this->admin_repository = $admin_repository;
    }

    public function getAdminsPagination(int $limit = 5)
    {
        return $this->admin_repository->getAdminsPagination($limit);
    }

    public function createAdmin($validated_data)
    {
        return $this->admin_repository->createAdmin($validated_data);
    }

    public function getAdmin($id)
    {
        return $this->admin_repository->getAdmin($id);
    }

    public function updateAdmin($validated_data, $id)
    {
        $admin = $this->admin_repository->getAdmin($id);
        if (!$admin)
            return false;

        return $this->admin_repository->updateAdmin($validated_data, $admin);
    }

    public function destroyAdmin($id)
    {
        $admin = $this->admin_repository->getAdmin($id);
        if ($admin && !$admin->is(auth('admin')->user()))
            return $this->admin_repository->destroyAdmin($admin);
        
        return false;
    }

    public function changeStatus($id)
    {
        $admin = $this->admin_repository->getAdmin($id);
        if (!$admin)
            return false;

        return $this->admin_repository->changeStatus($admin, !$admin->status);
    }
}
