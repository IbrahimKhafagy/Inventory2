<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\attached;
use App\Models\inventory;
use App\Models\Subcategories;
use App\Models\unitt;
use App\Models\productype;
use App\Models\User;
use App\Models\currancy;
use Illuminate\Support\Facades\File;
//use App\Http\Requests\StoreInventoryRequest;
use Illuminate\Support\Facades\Auth;

use App\Models\Categories;
use App\Models\Companies;
use App\Models\managesku;
use App\Models\stores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;// this important to use send word in notification
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit as XmlUnit;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct()
     {
          //
     }





    public function index()
    {

        return view('Stores.storeindex');

    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Stores.Add_store');
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
     * @param  \App\Models\inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(inventory $inventory)
    {
        //
    }


    public function destroy($products)
    {
       //
    }







}
