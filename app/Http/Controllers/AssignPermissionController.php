<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class AssignPermissionController extends Controller
{
    public function index(User $user)
    {
        $permissions = Permission::all()->map(function ($permission) use ($user) {
            return [
                'id' => $permission->id,
                'name' => $permission->name,
                'assigned' => $user->permissions->contains($permission)
            ];
        });
        
        return response()->json($permissions);
    }
    
    public function create()
    {
        $users = User::query()
            ->with('permissions')
            ->where('id', '!=', auth()->id())
            ->get();
        $permissions = Permission::query()->get();
        
        return view('assign_permissions.create', compact(['users', 'permissions']));
    }
    
    public function update(Request $request)
    {
        $user = User::query()->findOrFail($request->user);
        $user->permissions()->sync($request->input('permissions', []));
        
        return back()->with('success', 'Permisiones actualizadas com éxito!');
    }
}
