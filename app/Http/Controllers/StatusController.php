<?php

namespace App\Http\Controllers;

use App\Models\status;
use App\Models\companyreq;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     function __construct()
    {
         $this->middleware('permission:status', ['only' => ['index','store']]);

    }

    public function index()
    {
        $s=DB::table('status')->get();
        return view('Registration_Req.Status',compact('s'));
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
        status::create([
            'name'=>$request->name ,

            'companyreqs_id'=>$request->companyreqs_id ,
           // 'Created_by'=>(Auth::user()->name),
            'created_at'=>date('Y-m-d H:i:s'),

        ]);
        session()->flash('Add','The status has been Created');
        return redirect('/Status');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, status $status)
    {
        //
    }



    public function deleteStatus($s)
    {
    DB::table('status')->where('id',$s)->delete();
     return redirect('/Status')->with ('delete','Request Has Been Deleted Successfully!');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(status $status)
    {
        //
    }
}
