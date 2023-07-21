<?php

namespace App\Http\Controllers;

use App\Models\productype;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class ProductypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index( Request $request)
    {
        $pt= productype::orderBy('id','asc')->get();
       // $pt=DB::table('productype')->get();
        $Soft_deletes= productype::onlyTrashed()->orderBy('id','asc')->get();
       Return view('Product_type.ProType',['pt'=>$pt ,'trashed'=>$Soft_deletes]);
    }


/****************** function to delete product by id ************** */
public function deletept($id =null)
{
if($id != null)
{
    $del=productype::find($id);
   // $del->delete();
}
else if(request()->query('restore') )
{
    productype::restored($id);
}

else if(request()->query('forcedelete') )
{
    productype::forceDeleted($id);

}
if(request()->query('delete') )
{
    productype::destroy($id);
    // echo "done";
    // exit();

}

//DB::table('productype')->where('id',$id)->delete();
// echo "heloo";
    return back()->with ('productype_delete','Product type Has Been Deleted Successfully!');


}





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

$validatedData = $request->validate([
    'name' => 'required|unique:productype|max:255',
                                    ],

[

    'name.required' =>'Please Enter the Product Type name',
    'name.unique' =>'this name is exist ',


]);

productype::create([

    'name'=>$request->name ,
    'Description'=>$request->Description ,

    //'Created_by'=>(Auth::user()->name),
   'created_at'=>date('Y-m-d H:i:s'),

]);

session()->flash('Add','The product type has been Created');
return redirect('/ProType');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productype  $productype
     * @return \Illuminate\Http\Response
     */
    public function show(productype $productype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productype  $productype
     * @return \Illuminate\Http\Response
     */
    public function edit(productype $productype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productype  $productype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productype $productype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productype  $productype
     * @return \Illuminate\Http\Response
     */
    public function destroy(productype $productype)
    {
        //
    }
}
