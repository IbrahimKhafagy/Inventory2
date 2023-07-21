<?php

namespace App\Http\Controllers;
use App\Models\products;
use App\Models\inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Users;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $currancy_id = $request->currency_id ? $request->currency_id : 1;
       // $inventory_id =$request->inventory_id ? $request->inventory_id : 1;
        $totalPrice = 0;
       $countProduct = 0;
       $toptotalPrice = [];
       $products=[];
       $Com = DB:: table('companies')->get();
        $curr=DB :: table('currancy')->get();
       // $inv = DB:: table('inventory')->get();
        if (Auth::user()->companies_id == 1) {
            $totalPrice =products::sum('Price');

                                                                                                              //,"inventory_id"                                   ,"inv"
            $toptotalPrice = products::select("Product_name","TotalPrice","Vendor","currancy_id","companies_id")->where("currancy_id",$currancy_id)->with(["curr","Com"])->orderByRaw("TotalPrice DESC")->limit(4)->get();

            $countProduct = products::count();
            $products = DB::table('products') // for total with differance currancy
            ->join('currancy', 'currancy.id', '=', 'products.currancy_id')//->where("inventory_id",$inventory_id)// for total with differance currancy
            ->selectRaw('sum(products.TotalPrice) as total,currancy.name')->groupBy('currancy.name')->get();// for total with differance currancy


        } else {
            $toptotalPrice = products::select("Product_name","TotalPrice","Vendor","currancy_id")->where('companies_id', Auth::user()->companies_id)->where("currancy_id",$currancy_id)->with(["curr"])->orderByRaw("TotalPrice DESC")->limit(4)->get();
            $totalPrice = products::where('companies_id', Auth::user()->companies_id)->sum('Price');
            $countProduct = products::where('companies_id', Auth::user()->companies_id)->count();
            $products = DB::table('products') // for total with differance currancy
            ->join('currancy', 'currancy.id', '=', 'products.currancy_id')->where('products.companies_id', Auth::user()->companies_id)// for total with differance currancy
            ->selectRaw('sum(products.TotalPrice) as total,currancy.name')->groupBy('currancy.name')->get();// for total with differance currancy


        }

        // Hint: Auth::user() is the currently signed in user object.
        $first_time_login = false;
            if (Auth::user()->first_time_login) {
                                           $first_time_login = true;
                                     Auth::user()->first_time_login = 1; // Flip the flag to true
                                      //Auth::user()->save(); // By that you tell it to save the new flag value into the users table
                                                   }
                                                  /* return('your view', ['login'=>first_time _login]);
                                                   */
                                                                                                                    //,'inv'
        return view('home',compact('totalPrice','countProduct','products','toptotalPrice','curr','first_time_login','Com'));



        // Now send the variable $first_time_login to your view
       // return view('home', ['first_time_login' => $first_time_login]);

    }



   /*function fetch( $id = 1)
    {
        // $currancy_id = $request->currency_id ? $request->currency_id : 1;
        $toptotalPrice = [];

        $toptotalPrice = products::select("Product_name","TotalPrice","Vendor","currancy_id","companies_id")->where("currancy_id",$id)->with(["curr","Com"])->orderByRaw("TotalPrice DESC")->limit(4)->get();
        return json_encode($toptotalPrice);
    }*/

function fetch( $id)
    {


        $toptotalPrice = [];
        if (Auth::user()->companies_id == 1) {
        $toptotalPrice = products::select("Product_name","TotalPrice","Vendor","currancy_id","companies_id")->where("currancy_id",$id)->with(["curr","Com"])->orderByRaw("TotalPrice DESC")->limit(4)->get();
        }
        else {
            $toptotalPrice = products::select("Product_name","TotalPrice","Vendor","currancy_id")->where('companies_id', Auth::user()->companies_id)->where("currancy_id",$id)->with(["curr"])->orderByRaw("TotalPrice DESC")->limit(4)->get();

        }
        return json_encode($toptotalPrice);

    }


}
