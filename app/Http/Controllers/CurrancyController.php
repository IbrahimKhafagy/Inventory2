<?php

namespace App\Http\Controllers;

use App\Models\currancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class CurrancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




     function __construct()
    {
         $this->middleware('permission:currancy-list|currancy-create|currancy-edit|currancy-delete', ['only' => ['index','store']]);
         $this->middleware('permission:currancy-create', ['only' => ['create','store']]);
         $this->middleware('permission:currancy-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:currancy-delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        $cr = currancy::all();

        return view('currancy.currancy', compact('cr'));
    }





///////////////////////////////////////////////// function to convert currency uptodate//////////////////////////
public function convertcurr(Request $request)
{
    $converted = '';

    if($request->filled("currency_from")){
        $convertedObj = currancy::convert()
                ->from($request->get('currency_from'))
                ->to($request->get('currency_to'))
                ->amount($request->get('amount'));

        if($request->filled('date')){
            $convertedObj = $convertedObj->date($request->get('date'));
        }

        $converted = $convertedObj->get();
    }

    return view('currancy.convert',compact('converted'));
}


//////////////////////////////////////////////////// join table currency with products table//////////////////

public function Twojoin()
{
$products = DB::table('products')
->join('currancy', 'currancy.id', '=', 'products.currancy_id')// joining the contacts table
->selectRaw('sum(products.TotalPrice) as total,currancy.name')->groupBy('currancy.name')->get()

;



return view('currancy.PriceCurr', compact('products'));


}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
/////////////////////////////////////////// the page of under construction //////////////////
     public function under()
     {

return view('currancy.under_construction');

     }

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

        $validatedData = $request->validate([
            'name' => 'required|unique:currancy|max:255',
        ], [

            'name.required' => 'Please Enter the Currancy name',
            'name.unique' => 'this name is exist ',


        ]);


        currancy::create([
            'name' => $request->name,
            //'Created_by'=>(Auth::user()->name),
           // 'created_at' => date('Y-m-d H:i:s'),

        ]);

        session()->flash('Add', 'The Currancy has been Created');
        return redirect('/currancy');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\currancy  $currancy
     * @return \Illuminate\Http\Response
     */
    public function show(currancy $currancy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\currancy  $currancy
     * @return \Illuminate\Http\Response
     */
    public function edit(currancy $currancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\currancy  $currancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, currancy $currancy)
    {
        $id = $request->id;

        $this->validate($request, [

            'Category' => 'required|max:255|unique:Categories,Category,' . $id,
            'Description' => 'required',
        ], [

            'Category.required' => 'Please, Enter The Category Name',
            'Category.unique' => 'This category is exist',
            'Description.required' => 'Please Enter The Descripition if you Have',

        ]);

        $cat = currancy::find($id);
        $cat->update([
            'name' => $request->name,
        ]);

        session()->flash('edit', 'The Category Has been Updated');
        return redirect('/currancy');
    }



    public function deletecrr($cr)
    {
        DB::table('currancy')->where('id', $cr)->delete();
        return redirect('/currancy')->with('delete', 'Request Has Been Deleted Successfully!');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\currancy  $currancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(currancy $currancy)
    {
        //
    }
}
