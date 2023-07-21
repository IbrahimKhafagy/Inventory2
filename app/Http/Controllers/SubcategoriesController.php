<?php

namespace App\Http\Controllers;

use App\Models\Subcategories;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class SubcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:Subcategories-list|Subcategories-create|Subcategories-edit|Subcategories-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:Subcategories-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Subcategories-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Subcategories-delete', ['only' => ['destroy']]);
    }

    public function index()

    {

        $cat = Categories::where('companies_id', Auth::user()->companies_id)->get();
        // $sub=Subcategories::with(['Categ'])->get();
        $sub = Subcategories::whereHas('Categ', function ($q) {
            $q->where('companies_id', Auth::user()->companies_id);
        })->get();

        return view('Subcategories.Subcategories', compact('cat', 'sub'));
    }

    public function Callajax($cat_id)
    {

        // $cat_id =Subcategories:: get('cat_id');
        $subcategories = Subcategories::where('categories_id', '=', $cat_id)->get();

        return response()->json($subcategories);
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $exist = Subcategories::where("Subcategory", $request->Category)->first();
        if ($exist) {
            session()->flash('error', 'you have Subcategory with the same name');
            return redirect('/Subcategories');
        }

        //$Categories_id =Categories::where('Category', $request->Category)->first()->Categories_id;
        Subcategories::create([
            'Subcategory' => $request->Subcategory,
            'categories_id' => $request->categories_id,
            'Description' => $request->Description,
            // 'Created_by'=>(Auth::user()->name),
            'created_at' => date('Y-m-d H:i:s'),



        ]);

        session()->flash('Add', 'The Subcategory has been Created');
        return redirect('/Subcategories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategories  $subcategories
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategories $subcategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategories  $subcategories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = DB::table('categories')->where('companies_id', Auth::user()->companies_id)->get();
        $sub = Subcategories::find($id);


        return view('Subcategories..Subedit', compact('sub', 'cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategories  $subcategories
     * @return \Illuminate\Http\Response
     */





    public function update(Request $request)
    {

        $id = Categories::where('Category', $request->Category)->first()->id;
        $sub = Subcategories::findOrFail($request->categories_id);
        // $sub = Subcategories::find($id);
        $sub->update([
            'Subcategory' => $request->Subcategory,
            'Description' => $request->Description,
            // 'Category' => $request->category,

            'categories_id' => $id,
            'categories_id' => $request->Category,
        ]);


        $this->validate($request, [

            'Subcategory' => 'required|max:255|unique:Subcategories,Subategory,' . $id,
            'Description' => 'required',
        ], [

            'Subcategory.required' => 'Please, Enter The Subcategory Name',
            'Subcategory.unique' => 'This Subcategory is exist',
            'Description.required' => 'Please Enter The Descripition if you Have',

        ]);

        session()->flash('Edit', 'The Subcategory Has been Updated');
        return redirect('/Subcategories');
    }


    public function updateAjax(Request $request)
    {
        if ($request->ajax()) {
            Subcategories::find($request->pk)->update([
                $request->name => $request->value
            ]);
            return response()->json(['success' => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategories  $subcategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }


    /****************** function to delete product by id ************** */
    public function deleteSub($id) //$sub
    {

        Subcategories::find($id)->delete();

        return redirect('/Subcategories')->with('Subcategories', 'Request Has Been Deleted Successfully!');

        //DB::table('subcategories')->where('id',$sub)->delete();
        //return redirect('/Subcategories')->with ('Subcategories','Request Has Been Deleted Successfully!');

    }


    //$sub = Subcategories::findOrFail($request->id);
    //$sub->delete();
    //session()->flash('delete', 'Request Has Been Deleted Successfully!');
    //return back();
    //return redirect('/Subcategories');







}
