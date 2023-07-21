<?php

namespace App\Http\Controllers;

use App\Models\team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\role;
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     function __construct()
    {
         $this->middleware('permission:team-list|team-create|team-delete', ['only' => ['index','store']]);
         $this->middleware('permission:team-create', ['only' => ['create','store']]);
         $this->middleware('permission:team-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
       // $tem = team::count();
        $tem = DB::table('team')->where('companies_id',Auth::user()->companies_id)->get();
        $roles= DB::table('roles')->get();
        return view('Team.All_Team', compact('tem','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('Team.CreateNew');
    }
    public function submit(Request $request)
    {
        DB::table('team')->insert([
            'Name' => $request->Name,
            'Position' => $request->Position,
            'Email' => $request->Email,
            'Phone' => $request->Phone,
            'roles_id'=>$request->name,

            'Created_by'=>(Auth::user()->name),
            'created_at'=>date('Y-m-d H:i:s'),


        ]);
        return back()->with('add', 'Member has been add Successfully!');
    }

    /******************************************* function to give the member/spoc permisition************************************************************************* */
    public function permission()
    {

        return view('Team.Permission');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(team $team)
    {
        //
    }
}
