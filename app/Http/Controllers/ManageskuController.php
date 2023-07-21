<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\managesku;
use App\Models\products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ManageskuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct()
    {
         $this->middleware('permission:sku-list', ['only' => ['index','store']]);

    }



    public function Showall1()
    {
        //$products = products::with(['Categ', 'Subcat', 'Uni', 'Com', 'Type', 'curr', 'Skus'])->get();

       // $sk= DB::table('managesku')->get();
       $sk=  managesku::with('products')->get();
       // $sk = managesku::with(['Inven', 'mskuss', 'cate'])->get();
        return view('SKUs.AllSKU1', compact('sk'));
    }

    public function Showall()
    {
        // $sk = managesku::with(['Inven','cate','curr'])->get();
        //هنا هنشتغل على ح].ل ال invaetory علشان نح[يب المنت[ات اللى ملهاش sku,اللى ليا ]]

        // $products = products::all();
        //$sk= DB::table('managesku')->get();


        $products = products::with(['Categ', 'Subcat', 'Uni', 'Com', 'Type', 'curr', 'Skus'])->get();

        return view('SKUs.AllSKU', compact('products'));
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function updateAjax(Request $request )
    {
        if ($request->ajax()) {
            managesku::find($request->pk)->update([
                $request->name => $request->value
            ]);
            return response()->json(['success' => true]);
        }
    }


    public function index()
    {

        $sk = managesku::with(['Inven','cate','curr'])->get();
       // $sk = DB::table('managesku')->get();

        return view('SKUs.ManageSKU', compact('sk'));
    }







    public function SKUNull()
    {
        //هنا نفس اللى ف,ق بس هن[يب اللى مال,ش sku


        $products = products::whereNull('managesku_id')->get();

        // dd($sk);


        return view('SKUs.NullSKU', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deletecat($cat)
    {
        DB::table('categories')->where('id', $cat)->delete();
        return redirect('/Categories')->with('Delete', 'Request Has Been Deleted Successfully!');
    }



    public function editsku()
    {
        //$sub = Subcategories::find($id);


        // return view('Subcategories..Subedit', compact('sub'));

        return view('SKUs.Editsku');
    }




    public function create(Request $request)
    {
        DB::table('managesku')->create([

           // 'products_id' => $request->products_id,
           // 'currancy_id' => $request->currancy_id,
            'SKU' => $request->SKU,
            'Chainnest_Price' => $request->Chainnest_Price,
            'Availablity' => $request->Availablity,
           // 'Categories_id' => $request->Categories_id,
        ]);
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
        /* check the name of SKU if is exist or not******************/

        $validatedData = $request->validate([
            'SKU' => 'required|unique:managesku|max:255',
        ], [

            'SKU.required' => 'Please Enter the SKU ',
            'SKU.unique' => 'this name is exist ',


        ]);
        $cr = DB::table('currancy')->get();
        $sk = managesku::with(['Inven','cate','curr'])->get();
        managesku::create([
            //'companies_id' => Auth::user()->companies_id,
           // 'products_id' => $request->products_id,
            'currancy_id' => $request->currancy_id,
            'SKU' => $request->SKU,
            'Chainnest_Price' => $request->Chainnest_Price,
            'Availablity' => $request->Availablity,
            'currancy_id' => $request->currancy_id,
           // 'Categories_id' => $request->Categories_id,
            'Created_by' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),

        ]);

        session()->flash('Add', 'The SKU has been Created');
        return redirect('/ManageSKU');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\managesku  $managesku
     * @return \Illuminate\Http\Response
     */
    public function show(managesku $managesku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\managesku  $managesku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$sk = managesku::with(['Inven','cate'])->get();
        $cat = DB::table('categories')->get();
        $cr = DB::table('currancy')->get();
        $products = DB::table('products')->get();

        $sk = DB::table('managesku')->get();
        return view('SKUs.Editsku', compact('sk', 'cat', 'products', 'cr'));
    }


    public function update(Request $request, $id)
    {

        DB::table('managesku')->where('id', $request->id)->update([

            'products_id' => $request->products_id,
            'currancy_id' => $request->currancy_id,
            'SKU' => $request->SKU,
            'Chainnest_Price' => $request->Chainnest_Price,
            'Availablity' => $request->Availablity,
            'Categories_id' => $request->Categories_id,
        ]);



        session()->flash('Edit', 'The SKU Has been Updated');
        return redirect('/AllSKU');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\managesku  $managesku
     * @return \Illuminate\Http\Response
     */
    public function destroy(managesku $managesku, $sk)
    {

        DB::table('managesku')->where('id', $sk)->delete();
        return redirect('/ManageSKU')->with('delete', 'Request Has Been Deleted Successfully!');
    }

}
