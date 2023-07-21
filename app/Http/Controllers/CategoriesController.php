<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Companies;
use App\Models\inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subcategories;
use Illuminate\Support\Facades\DB;




class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     function __construct()
    {
         $this->middleware('permission:Categories-list|Categoeies-create|categories-edit|categoeies-delete', ['only' => ['index','store']]);
         $this->middleware('permission:Categoeies-create', ['only' => ['create','store']]);
         $this->middleware('permission:categories-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:categoeies-delete', ['only' => ['destroy']]);
    }



    public function index()
    {

        //$sub = Subcategories::with('Categ')->get();
       //// return $sub;
      // $sub = Categories::with('Subcateg')->get();
      // return $sub;

    //   $cat = DB::table('categories')->get();


   // $cat =DB::table("categories");
    $cat = categories::with(['Subcateg', 'productss', 'Compa']);
    if (Auth::user()->companies_id == 1) {
        $cat = $cat->get();
    } else {
        $cat = $cat->where('companies_id', Auth::user()->companies_id)->get();
    }


        return view('Categories.Categories', compact('cat'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

/*************************************Edit & update in ajax*********************************************************** */





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

// $validatedData = $request->validate([
//     'Category' => 'required|unique:categories|max:255',
// ],[

//     'Category.required' =>'Please Enter the Category name',
//     'Category.unique' =>'this name is exist ',


// ]);

$exist=Categories::where("Category",$request->Category)->where("companies_id",Auth::user()->companies_id)->first();
if($exist){
    session()->flash('error','you have category with the same name');
return redirect('/Categories');
}

Categories::create([
    'companies_id'=>Auth::user()->companies_id,
    'Category'=>$request->Category ,
    'Description'=>$request->Description ,
    'Created_by' => (Auth::user()->name),
    'created_at'=>date('Y-m-d H:i:s'),

]);

session()->flash('Add','The Category has been Created');
return redirect('/Categories');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $categories)
    {
        $id = $request->id;

        $this->validate($request, [

            'Category' => 'required|max:255|unique:Categories,Category,'.$id,
            'Description' => 'required',
        ],[

            'Category.required' =>'Please, Enter The Category Name',
            'Category.unique' =>'This category is exist',
            'Description.required' =>'Please Enter The Descripition if you Have',

        ]);

        $cat = Categories::find($id);
        $cat->update([
            'Category' => $request->Category,
            'Description' => $request->Description,
        ]);

        session()->flash('edit','The Category Has been Updated');
        return redirect('/Categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function deletecat($cat)//$id
    {

   //Categories::find($id)->delete();

   //return redirect('/Categories')->with ('Delete','Request Has Been Deleted Successfully!');
   DB::table('categories')->where('id',$cat)->delete();
   return redirect('/Categories')->with ('Delete','Request Has Been Deleted Successfully!');

    }

public function updateAjax(Request $request )
{
    if ($request->ajax()) {
        Categories::find($request->pk)->update([
            $request->name => $request->value
        ]);
        return response()->json(['success' => true]);
    }
}



    public function destroy(Request $request)
    {
      /*  $id = $request->id;
        Categories::find($id)->delete();
        session()->flash('delete','Category has been deleted');
        return redirect('/Categories');*/
    }
}
