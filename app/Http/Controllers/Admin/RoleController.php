<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class RoleController extends Controller
{

 /*
     function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
*/
    // public function test(){
    //   dd(Auth()->user()->roles->pluck('level')[0]);
    //   // dd(Auth()->user()->roles[0]->permissions);
    //   echo "hello";
    // }

    public function index()
    {
        // $roles = Role::whereNotIn('name', ['admin'])->get();
        $roles = Role::where('level','>=',Auth()->user()->roles->pluck('level')[0])->get();

        return view('roles.index', compact('roles'));
    }

    public function create()
    {
       $permission = Auth()->user()->roles[0]->permissions;
       // $permission = Permission::get();
      return view('roles.create', compact('permission'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'level'=> "required|numeric|gt:Auth()->user()->roles->pluck('level')[0]",
            'permission' => 'required',
            ]);
            $role = Role::create(['name' => $request->input('name'), 'level'=>$request->input('level')]);
            $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
        ->where("role_has_permissions.role_id", '$id')
        ->get();
            $role->syncPermissions($request->input('permission'));
            return redirect()->route('roles.index')
            ->with('success','Role created successfully');



       /* $validated = $request->validate(['name' => ['required', 'min:3']]);
        $role=Role::create($validated);
        $role->syncPermissions($request->get('permission'));

        return to_route('roles.index')->with('message', 'Role Created successfully.');*/
    }

    public function edit(Role $role)
    {
        // $permissions = Permission::all();
        $permissions = Auth()->user()->roles[0]->permissions;

        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $role->update($validated);

        return to_route('roles.index')->with('message', 'Role Updated successfully.');
    }

    public function destroy(Role $role)
    {
      $role->delete();

       return back()->with('message', 'Role deleted.');
    }

    public function givePermission(Request $request, Role $role)
    {
        if($role->hasPermissionTo($request->permission)){
            return back()->with('message', 'Permission exists.');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission not exists.');
    }

}
