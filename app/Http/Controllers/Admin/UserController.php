<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC');
        if (Auth::user()->companies_id == 1) {
            $data = $data->paginate(5);
        } else {
            $data = $data->where('companies_id', Auth::user()->companies_id)->paginate(5);
        }
        //return view('users.index', compact('data'))
           // ->with('i', ($request->input('page', 1) - 1) * 5);


        $users = User::latest();
        if ($request->get('status') == 'archived') {
            $users = $users->onlyTrashed();
        }
       // $users = $users->paginate(10);
        //return view('users.index', compact('users'));


        return view('users.index', compact('data','users'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
       // $users = User::all();
        //return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $roles = Role::whereNotIn('name', ['adminchain'])->where('level','=>',Auth()->user()->roles->pluck('level')[0])->get();
        $permissions = Auth()->user()->roles[0]->permissions;

        return view('admin.users.role', compact('user', 'roles', 'permissions'));
    }

    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }

        $user->assignRole($request->role);
        return back()->with('message', 'Role assigned.');
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }

    public function givePermission(Request $request, User $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission exists.');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission does not exists.');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
      //  if ($user->hasRole('admin')) {
       //     return back()->with('message', 'you are admin.');
       // }
       // $user->delete();

      //  return back()->with('message', 'User deleted.');
    }




/******************************** All funs of softDelete + if condition in index func*************************************************** */

public function restore($id)
{
    User::where('id', $id)->withTrashed()->restore();

    return redirect()->route('users.index', ['status' => 'archived'])
        ->withSuccess(__('User restored successfully.'));
}

public function forceDelete($id)
{
    User::where('id', $id)->withTrashed()->forceDelete();

    return redirect()->route('users.index', ['status' => 'archived'])
        ->withSuccess(__('User force deleted successfully.'));
}

public function restoreAll()
{
    User::onlyTrashed()->restore();

    return redirect()->route('users.index')->withSuccess(__('All users restored successfully.'));
}



}
