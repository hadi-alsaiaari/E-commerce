<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\RoleRequest;
use App\Models\Role;
use App\Services\Dashboard\RoleService;

class RoleController extends Controller
{
    public $role_service;
    /**
     * Create a new class instance.
     */
    public function __construct(RoleService $role_service)
    {
        $this->role_service = $role_service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = $this->role_service->getRolesPagination(5);
        return view('dashboard.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.roles.create', ['role' => new Role()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $role = $this->role_service->createRole($request->validated());
        return (!$role) ? redirect()->back()->with('error', __('words.error_msg')) : redirect()->route('dashboard.roles.index')->with('success', __('words.success_msg'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = $this->role_service->getRole($id);
        return (!$role) ? redirect()->back()->with('error', __('words.error_msg')) : view('dashboard.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        $role = $this->role_service->updateRole($request->validated(), $id);
        return (!$role) ? redirect()->back()->with('error', __('words.error_msg')) : redirect()->route('dashboard.roles.index')->with('success', __('words.success_msg'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = $this->role_service->destroy($id);
        return (!$role) ? redirect()->back()->with('error', __('words.error_msg')) : redirect()->back()->with('success', __('words.success_msg'));
    }
}
