<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $limit = 10;
        $users = User::paginate($limit);
        $no = $limit * ($users->currentPage() - 1);
        return view('dashboard.users.index', compact('users', 'no'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('dashboard.users.edit', compact('user','roles'));
    }

    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'jabatan' => 'nullable|string|max:255',
        'nomor' => 'nullable|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'role' => 'required',
    ]);

    // Update user details
    $user->update($request->except('role'));

    // Sync roles
    $user->syncRoles($request->role);

    flash()->success('User Berhasil Di Perbaharui.');
    return redirect()->route('dashboard.users.index');
}


    public function destroy(User $user)
    {
        $user->delete();
        flash()->success('User Berhasil Di Hapus.');
        return redirect()->route('dashboard.users.index');
    }
}
