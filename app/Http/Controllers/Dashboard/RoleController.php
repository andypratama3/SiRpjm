<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:panitia');
    }

    public function index()
    {
        $limit = 10;
        $roles = Role::paginate($limit);
        $count = $roles->count();
        $no = $limit * ($roles->currentPage() - 1);
        return view('dashboard.role.index', compact('roles', 'no', 'count'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('dashboard.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
            'permissions' => 'required|array',
        ]);

        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);

        flash()->success('Role created successfully');

        return redirect()->route('dashboard.role.index');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('dashboard.role.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'required|array',
        ]);

        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions);

        flash()->success('Role updated successfully');
        return redirect()->route('dashboard.role.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        flash()->success('Role deleted successfully');
        return redirect()->route('dashboard.role.index');
    }

}
