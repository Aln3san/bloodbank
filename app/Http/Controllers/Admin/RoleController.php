<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read roles')->only(['index']);
        $this->middleware('permission:create roles')->only(['create','store']);
        $this->middleware('permission:update roles')->only(['edit','update']);
        $this->middleware('permission:delete roles')->only(['destroy']);
    }

    public function index()
    {
        $roles = Role::withCount('permissions')->paginate(15);
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(RoleRequest $request)
    {
        $data = $request->validated();
        $role = Role::create(['name' => $data['name']]);
        if (!empty($data['permissions'])) {
            $role->syncPermissions($data['permissions']);
        }
        return redirect()->route('roles.index')->with('success', __('messages.create_role'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role','permissions'));
    }

    public function update(RoleRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $data = $request->validated();
        $role->update(['name' => $data['name']]);
        $role->syncPermissions($data['permissions'] ?? []);
        return redirect()->route('roles.index')->with('success', __('messages.update_role'));
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return response()->json(['message' => __('messages.item_deleted')]);
    }
}
