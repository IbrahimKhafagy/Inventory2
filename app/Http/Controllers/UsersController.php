<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Support\Facades\Mail;
use App\Mail\demoMail;
use Illuminate\Support\Facades\File;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit as XmlUnit;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Companies;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
     function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
*/
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC');
        if (Auth::user()->companies_id == 1) {
            $data = $data->paginate(5);
        } else {
            $data = $data->where('companies_id', Auth::user()->companies_id)->paginate(5);
        }
        return view('users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);


$users=User::with(['Compan']);
       // $users = User::latest();
        if ($request->get('status') == 'archived') {
            $users = $users->onlyTrashed();
        }
        //$users = $users->paginate(10);
        return view('users.index', compact('users'));

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////





    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comp = Companies::with(['Useree'])->get();
        // $roles = Role::whereNotIn('name', ['adminchain'])->where('level','=>',Auth()->user()->roles->pluck('level')[0])->get();
        $roles = Role::where('level','>=',Auth()->user()->roles->pluck('level')[0])->get();

        // dd($roles);
        return view('users.create', compact('roles','comp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count_user = User::where("companies_id", Auth::user()->companies_id)->count();
        if ($count_user < 6 || Auth::user()->companies_id == 1) {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|same:confirm-password',
                'roles_name' => 'required',
                'Phone'=>'required|'
            ]);
            if(Auth::user()->companies_id != 1){
                $request->merge(["companies_id" => Auth::user()->companies_id]);
            }

            $input = $request->all();

            $input['password'] = Hash::make($input['password']);

            $user = User::create($input);
            $user->assignRole($request->input('roles_name'));
            $mailData = [
                'title' => 'Dear Valued Guest ',
                'body' => "<p>Thank you for your registration to Chain Nest Inventory Management System</p>
                <p>  Your request has been approved.</p>
                <p> Kindly get your access as follow:</p>
                <p> User: ".$request['email']."</p>
                <p>Temp password :  ".$request['password']."</p>
                <p>you can access your inentory via this link:</p>
                <p>Check the link http://185.207.251.223:8181/</p>
                <p> Note:Please login with your temporary password and it's a must change it in first step after login </p>
                <p>you can replay to this Email if you face isusse: admin.inventory@chainnest.net</p>"


             ];

         Mail::to($request['email'])->send(new demoMail($mailData));

            return redirect()->route('users.index')
                ->with('success', 'User created successfully');
        } else {
            return redirect()->route('users.index')
                ->with('error', 'User limited');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles = Role::whereNotIn('name', ['adminchain'])->where('level', '=>', Auth()->user()->roles->pluck('level')[0])->get();
        $permissions = Auth()->user()->roles[0]->permissions;

        $user = User::find($id);
        return view('users.show', compact('user', 'roles', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comp = Companies::with(['Useree'])->get();
        $roles = Role::where('level','>=',Auth()->user()->roles->pluck('level')[0])->pluck('name', 'name')->all();
        $user = User::find($id);
       // $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole', 'comp'));
    }

    public function edit1()
    {

        $user = User::find(Auth()->user()->id);
        return view('users.edit1', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            // 'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }



        $user = User::find($id);
        $user->update($input);
        if($request->input('roles')){
            DB::table('model_has_roles')->where('model_id', $id)->delete();

            $user->assignRole($request->input('roles'));
        }


        return redirect()->route('home')
            ->with('success', 'User updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }



/******************************** All funs of softDelete + if condition in index func*************************************************** */
/**
     *  Restore user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
{
    User::where('id', $id)->withTrashed()->restore();

    return redirect()->route('users.index', ['status' => 'archived'])
        ->withSuccess(__('User restored successfully.'));
}
  /**
     * Force delete user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
public function forceDelete($id)
{
    User::where('id', $id)->withTrashed()->forceDelete();

    return redirect()->route('users.index', ['status' => 'archived'])
        ->withSuccess(__('User force deleted successfully.'));
}
/**
     * Restore all archived users
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
public function restoreAll()
{
    User::onlyTrashed()->restore();

    return redirect()->route('users.index')->withSuccess(__('All users restored successfully.'));
}


}
