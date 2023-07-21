<?php

namespace App\Http\Controllers;

use App\Models\companytype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CompanytypeController extends Controller
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
    public function index()
    {
        $ct= DB::table('companytype')->get();

        return view('companies.ComType',compact('ct'));
    }

    public function deletect($cat)
    {
    DB::table('companytype')->where('id',$cat)->delete();
     return redirect('/ComType')->with ('CompanyType','Request Has Been Deleted Successfully!');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* check the name of category if is exist or not******************/

$validatedData = $request->validate([
    'name' => 'required|unique:companytype|max:255',
],[

    'name.required' =>'Please Enter the Category name',
    'name.unique' =>'this name is exist ',


]);


companytype::create([
    'name'=>$request->name ,
    'Description'=>$request->Description ,
    //'Create_at'=>(Auth::user()->date_create),
   // 'Created_by'=>(Auth::user()->name),
    'created_at'=>date('Y-m-d H:i:s'),


]);

session()->flash('Add','The Type has been Created');
return redirect('/ComType');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\companytype  $companytype
     * @return \Illuminate\Http\Response
     */
    public function show(companytype $companytype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\companytype  $companytype
     * @return \Illuminate\Http\Response
     */
    public function edit(companytype $companytype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\companytype  $companytype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, companytype $companytype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\companytype  $companytype
     * @return \Illuminate\Http\Response
     */
    public function destroy(companytype $companytype)
    {
        //
    }
}
