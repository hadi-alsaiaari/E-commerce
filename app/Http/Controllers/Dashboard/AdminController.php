<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminRequest;
use App\Models\Admin;
use App\Services\Dashboard\AdminService;
use App\Services\Dashboard\RoleService;

class AdminController extends Controller
{
    public $admin_service, $role_service;
    /**
     * Create a new class instance.
     */
    public function __construct(AdminService $admin_service, RoleService $role_service)
    {
        $this->admin_service = $admin_service;
        $this->role_service = $role_service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = $this->admin_service->getAdminsPagination(5);
        return view('dashboard.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->role_service->getAllRoles();
        return view('dashboard.admins.create', ['admin' => new Admin(), 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {dd(90);
        $admin = $this->admin_service->createAdmin($request->validated());
        return (!$admin) ? redirect()->back()->with('error', __('words.error_msg')) : redirect()->route('dashboard.admins.index')->with('success', __('words.success_msg'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = $this->admin_service->getAdmin($id);
        return (!$admin) ? redirect()->back()->with('error', __('words.error_msg')) : view('dashboard.admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = $this->admin_service->getAdmin($id);
        $roles = $this->role_service->getRolesPagination(5);
        return (!$admin) ? redirect()->back()->with('error', __('words.error_msg')) : view('dashboard.admins.edit', ['admin' => $admin, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {
        $admin = $this->admin_service->updateAdmin($request->validated(), $id);
        return (!$admin) ? redirect()->back()->with('error', __('words.error_msg')) : redirect()->route('dashboard.admins.index')->with('success', __('words.success_msg'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = $this->admin_service->destroyAdmin($id);
        return (!$admin) ? redirect()->back()->with('error', __('words.error_msg')) : redirect()->back()->with('success', __('words.success_msg'));
    }

    public function changeStatus(string $id)
    {
        $admin = $this->admin_service->changeStatus($id);
        return (!$admin) ? redirect()->back()->with('error', __('words.error_msg')) : redirect()->back()->with('success', __('words.success_msg'));
    }
}
