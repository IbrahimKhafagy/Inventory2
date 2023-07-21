<?php

namespace App\Http\Controllers;

use App\Models\attached;
use Illuminate\Http\Request;

class AttachedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //'Created_by'=>(Auth::user()->name),
       // 'created_at'=>date('Y-m-d H:i:s'),
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
     * @param  \App\Models\attached  $attached
     * @return \Illuminate\Http\Response
     */
    public function show(attached $attached)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\attached  $attached
     * @return \Illuminate\Http\Response
     */
    public function edit(attached $attached)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\attached  $attached
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, attached $attached)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\attached  $attached
     * @return \Illuminate\Http\Response
     */
    public function destroy(attached $attached)
    {
        //
    }
}
