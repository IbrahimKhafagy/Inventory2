<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Categories;
use App\Models\Subcategories;
use App\Models\Companytype;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



     function __construct()
    {
         $this->middleware('permission:Companies-list|Companies-create|Companies-delete', ['only' => ['index','store']]);
         $this->middleware('permission:Companies-create', ['only' => ['create','store']]);
         $this->middleware('permission:Companies-delete', ['only' => ['destroy']]);
    }

    public function index()
    {


        //  $cat = Categories::all();Comtype
        // $sub=Subcategories::with(['Categ'])->get();


        // $ct=Companytype::with(['Compan'])->get();

        $comp = Companies::with(['Comtype'])->get();
        $ct = DB::table('companytype')->get();
        return view('companies.companies', compact('comp', 'ct'));
    }
    /******************fanction to connect com with the type in add*********************************************** */
    public function Callajax()
    {

        $ct_id = Companies::get('ct_id');
        $companies = Companies::where('companytype_id', '=', $ct_id)->get();

        return response()->json($companies);
    }


    public function updateAjax(Request $request )
    {
        if ($request->ajax()) {
            Companies::find($request->pk)->update([
                $request->name => $request->value
            ]);
            return response()->json(['success' => true]);
        }
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
       // $id = $request->id;

        $this->validate($request, [

            'Email' => 'required|max:255|unique:Companies,Email,',
            'Company_name' => 'required|max:255|unique:Companies,Company_name,',
        ],[

            'Email.required' =>'Please, Enter The Email ',
            'Email.unique' =>'This Email is exist',
            'Company_name.unique' =>'This Company name is exist',

        ]);
        if ($request->Company_code == "") {
            $request->merge([
                'Company_code' => decbin(rand(1, 10000)),
            ]);
        }
        if($request->hasFile("Company_Logo")){
            $file=$request->file("Company_Logo");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("Company_Logo/"),$imageName);




            $comp =new Companies([
            'Company_name' => $request->Company_name,
            'Company_code' => $request->Company_code,
            'Person_Name' => $request->Person_Name,
            'Email' => $request->Email,
            'Position' => $request->Position,

            'Phone' => $request->Phone,
            'companytype_id' => $request->companytype_id,
             "Company_Logo" =>$imageName,
            'Company_website' => $request->Company_website,
            'Company_Address' => $request->Company_Address,
            'Business_Activity' => $request->Business_Activity,
            'Created_by' => (Auth::user()->name),
           // 'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')


            // 'Approver_Name' => $request->Approver_Name,
            // 'Approver_date' => $request->Approver_date,
        ]);
        $comp->save();
    }
        return redirect('/companies')->with('create', 'Request Has Been created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $comp = Companies::find($id);

        return view('companies.companyshow', compact('comp'));
    }
/**************Fetch data in type = Customers and show it   in list********************************** */

public function ListCustomers()

{
    $comp = Companies::with(['Comtype'])->where('companytype_id', 2)->get();

    return view('Lists.Customers', compact('comp'));
}

 /**************Fetch data in type = Suppliers and show it   in list   ********************************** */

 public function ListSuppliers()
 {
     $comp =Companies::with(['Comtype'])->where('companytype_id', 1)->get();

     return view('Lists.Suppliers', compact('comp'));
 }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comp = Companies::with(['Comtype'])->where('id', $id)->first();
        $ct = DB::table('companytype')->get();
        return view('companies.companyEdit', compact('comp', 'ct'));
    }



    public function editlogo()//$id,$user_id
    {
       // $user= User::find($user_id);
        // $user = User::find(Auth()->user()->companies_id);
       // $comp = Companies::find(Auth()->user()->id);
      $comp = Companies::with(['Comtype'])->find(Auth()->user()->companies_id);

       $ct = DB::table('companytype')->get();
       return view('companies.companyEditlogo', compact('comp','ct'));
    }

    /******************************* Delete by id************************************************************* */
    public function deletecom($comp)
    {
        DB::table('companies')->where('id', $comp)->delete();
        return redirect('/companies')->with('delete', 'Request Has Been Deleted Successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $id = $request->id;

        $this->validate($request, [

            'Email' => 'required|max:255|unique:Companies,Email,'.$id,
            'Company_name' => 'required|max:255|unique:Companies,Company_name,'.$id,
        ],[

            'Email.required' =>'Please, Enter The Email ',
            'Email.unique' =>'This Email is exist',
            'Company_name.unique' =>'This Company name is exist',

        ]);
        if ($request->Company_code == "") {
            $request->merge([
                'Company_code' => decbin(rand(1, 10000)),
            ]);
        }

        $comp=Companies::findOrFail($id);
        if($request->hasFile("Company_Logo")){
            if (File::exists("Company_Logo/".$comp->Company_Logo)) {
                File::delete("Company_Logo/".$comp->Company_Logo);
            }
            $file=$request->file("Company_Logo");
            $imageName=time().'_'.$file->getClientOriginalName();
    $file->move(\public_path("Company_Logo/"),$imageName);

        }
       DB::table('companies')->where('id',$request->id)->update([
       // Companies::update([
            'Company_name' => $request->Company_name,
            'Company_code' => $request->Company_code,
            'Person_Name' => $request->Person_Name,
            'Email' => $request->Email,
            'Position' => $request->Position,

            'Phone' => $request->Phone,
            'companytype_id' => $request->companytype_id,
            'Company_Logo' => $imageName,
            'Company_website' => $request->Company_website,
            'Company_Address' => $request->Company_Address,
            'Business_Activity' => $request->Business_Activity,
           // 'Created_by' => (Auth::user()->name),
           // 'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')


            // 'Approver_Name' => $request->Approver_Name,
            // 'Approver_date' => $request->Approver_date,
        ]);
        return redirect('/home')->with('success', 'Request has been updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companies $companies)
    {
        //
    }
}
