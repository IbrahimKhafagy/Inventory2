<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supp = DB::table('companies')->get();

       return view('suppliers.Supplier' ,compact('supp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supp = DB::table('companies')->get();

       return view('suppliers.Addsupp' ,compact('supp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        suppliers::create([
            'Cust_Name' => $request->Cust_Name,
            'Cust_Code' => $request->Cust_Code,
            'Account_Manager' => $request->Account_Manager,
            'companies_id' => $request->companies_id,
            'Contact_Person' => $request->Contact_Person,

            'finishedpro_id' => $request->finishedpro_id,
            'materials_id' => $request->materials_id,
            'categories_id' => $request->categories_id,
            'subcategories_id' => $request->subcategories_id,
            'orders_id' => $request->orders_id,
            'Location' => $request->Location,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function show(Suppliers $suppliers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function edit(Suppliers $suppliers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suppliers $suppliers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suppliers $suppliers)
    {
        //
    }
}
