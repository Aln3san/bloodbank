<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create users')->only(['create', 'store']);
        $this->middleware('permission:read users')->only(['index', 'show']);
        $this->middleware('permission:update users')->only(['edit', 'update']);
        $this->middleware('permission:delete users')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filters = request()->only(['name','email']);

        $users = User::select('id','name','email')
            ->when($filters['name'] ?? null, fn($q, $v) => $q->where('name', 'like', "%{$v}%"))
            ->when($filters['email'] ?? null, fn($q, $v) => $q->where('email', 'like', "%{$v}%"))
            ->orderBy('id','desc')
            ->simplePaginate(15)
            ->appends($filters);

        $roles = Role::all();

        return view('admin.users.index', compact('users','filters', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $user = User::create($data);
        // assign role by name (role field now contains role name)
        if (!empty($data['role'])) {
            $user->assignRole($data['role']);
        }
        return redirect()->route('users.index')->with('success', __("messages.create_user"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validated();
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
            unset($data['password_confirmation']);
        }
        $user->update($data);
        // update role if provided (role contains role name)
        if (!empty($data['role'])) {
            $user->syncRoles([$data['role']]);
        }
        return redirect()->route('users.index')->with('success', __("messages.success"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json([
            'message' => __("messages.item_deleted")
        ]);
    }
}
