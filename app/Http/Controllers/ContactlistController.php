<?php

namespace App\Http\Controllers;

use App\Models\contactlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     function __construct()
    {
         $this->middleware('permission:contactlist-list|contactlist-create|contactlist-delete', ['only' => ['index','store']]);
         $this->middleware('permission:contactlist-create', ['only' => ['create','store']]);
         $this->middleware('permission:contactlist-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $cl = DB::table('contactlist');


        if (Auth::user()->companies_id == 1) {
            $cl = $cl->get();
        } else {
            $cl = $cl->where('companies_id', Auth::user()->companies_id)->get();
        }
       // $cl = DB::all();
        return view('Contacts.ContactList',compact('cl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cl = DB::table('contactlist')->get();
        return view('Contacts.AddnewContact',compact('cl'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        contactlist::create([
            'companies_id'=>Auth::user()->companies_id,

            'Person_Name' => $request->Person_Name,
            'Postion' => $request->Postion,
            'Company_Name' => $request->Company_Name,

            'Phone' => $request->Phone,
            'Email' => $request->Email,
            'Address'=>$request->Address,
            'product' => $request->product,
            'product_type' => $request->product_type,
            'contact_type' => $request->contact_type,
            'Created_by'=>(Auth::user()->name),
            'created_at'=>date('Y-m-d H:i:s'),

        ]);
        return back()->with ('contact_created','Contact Has Been Created Successfully!');
    }


    /****************** function to delete contact by id ************** */
public function deleteContact($id)
{
DB::table('contactlist')->where('id',$id)->delete();
return back()->with ('contact_delete','Contact Has Been Deleted Successfully!');

}

/****************Two functions to update or edit product by id **** */
public function editcontact($cl_id){

    $contacts= DB::table('contactlist')->where ('cl_id',$cl_id)->first();
     return view('EditContact',compact('contacts'));

   }
   public function UpdateContact(Request $request)
   {
   DB::table('contactlist')->where('cl_id',$request->cl_id)->update([
    'companies_id'=>Auth::user()->companies_id,
    'Person_Name' => $request->Person_Name,
    'Postion' => $request->Postion,
    'Company_Name' => $request->Company_Name,
    'Phone' => $request->Phone,
    'Email' => $request->Email,
    'Address'=>$request->Address,
    'product' => $request->product,
    'product_type' => $request->product_type,
    'contact_type' => $request->contact_type,
    'Created_by'=>(Auth::user()->name),
    'created_at'=>date('Y-m-d H:i:s'),


   ]);
    return back()->with ('contact_update','Contact Has Been Updated Successfully!');
   }


   /*********************** Fetch Data using btn Contact_type = Supplier *********************** */
public function showSupplier(contactlist $contactlist)
{
    $query = DB::table('contactlist')->where('contact_type','=','Supplier')->get();
    $cl = $query;
    return view('Contacts.ContactList' ,compact('cl'));
}


/*********************** Fetch Data using btn Contact_type = Buyer *********************** */
public function showBuyer(contactlist $contactlist)
{
$query = DB::table('contactlist')->where('contact_type','=','Buyer')->get();
$cl = $query;
return view('Contacts.ContactList' ,compact('cl'));
}

/*********************** Fetch Data using btn Contact_type = Outsource*********************** */
public function showOutsource(contactlist $contactlist)
{
 $query = DB::table('contactlist')->where('contact_type','=','Outsource')->get();
 $cl = $query;
 return view('Contacts.ContactList' ,compact('cl'));
}


/*********************** Fetch Data using btn Contact_type = Other*********************** */
public function showOther(contactlist $contactlist)
{
$query = DB::table('contactlist')->where('contact_type','=','Others')->get();
$cl = $query;
return view('Contacts.ContactList' ,compact('cl'));
}



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contactlist  $contactlist
     * @return \Illuminate\Http\Response
     */
    public function show(contactlist $contactlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contactlist  $contactlist
     * @return \Illuminate\Http\Response
     */
    public function edit(contactlist $contactlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contactlist  $contactlist
     * @return \Illuminate\Http\Response
     */



    public function update(Request $request, contactlist $contactlist)
    {
        if ($request->ajax()) {
            contactlist::find($request->pk)
                ->update([
                    $request->name => $request->value
                ]);

            return response()->json(['success' => true]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contactlist  $contactlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(contactlist $contactlist)
    {
        //
    }
}
