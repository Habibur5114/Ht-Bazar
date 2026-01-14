<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $data['roles'] = Role::latest()->get();

        return view('Admin.role.index', $data);
    }

    public function create()
    {

        $permissions = Permission::all()->groupBy('group_name');
        $title = 'Create Role';

        return view('admin.role.create', compact('permissions', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'nullable|array',
        ]);

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'admin',
        ]);

        if ($request->has('permissions')) {
            $permissions = Permission::whereIn('name', $request->permissions)
                ->where('guard_name', 'admin')
                ->get();

            $role->syncPermissions($permissions);
        }

        return redirect()->route('admin.roles.index')->with('success', 'Role Created Successfully.');

    }

    public function edit(Role $role)
    {

        $permissions = Permission::where('guard_name', $role->guard_name)
            ->get()
            ->groupBy('group_name');

        $rolePermissions = $role->permissions->pluck('name')->toArray();

        return view('Admin.role.edit', [
            'title' => 'Edit Role',
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions,
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,'.$role->id,
            'permissions' => 'nullable|array',
        ]);

        $role->update(['name' => $request->name]);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions ?? []);
        }

        return redirect()->route('admin.roles.index')->with('success', 'Role Updated Successfully.');
    }

    public function delete(Role $role)
    {
        if ($role->name === 'Super Admin') {
            abort(403, 'This role cannot be deleted.');
        }

        $role->delete();

        return redirect()->back()->with('success', 'Role Deleted Successfully.');
    }
}
