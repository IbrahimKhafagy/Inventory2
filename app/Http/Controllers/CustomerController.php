<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Products;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
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
        $cust = DB::table('companies')->get();
        $ct= DB::table('companytype')->get();

        return view('Customers.Customer', compact('cust','ct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cust = DB::table('companies')->get();
        return view('Customers.AddCust', compact('cust'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Customer::create([
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

        session()->flash('Add', 'The Customer has been Created');
        //return view('Customers.AddCust');
        return redirect('/AddCust');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
