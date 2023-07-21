<?php

namespace App\Http\Controllers;
use App\Models\Companies;
use App\Models\companyreq;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\demoMail;

use App\Models\Reqs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ReqsController extends Controller
{



     function __construct()
    {
         $this->middleware('permission:Companiesreq-list|Companiesreq-edit|Companiesreq-delete', ['only' => ['index','store']]);
         $this->middleware('permission:Companiesreq-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:Companiesreq-delete', ['only' => ['destroy']]);
    }



    public function getAllReq(){


        $Co_Req= companyreq::where('status_id','=',1)->with(['Status'])->get();

        return view('Registration_Req.AllReq' ,compact('Co_Req'));
           }



// Two functions to create Company Request and put it in DB and send it to Email

public function addReq(Reqs $reqs)
{
    return view('Registration_Req.First');
   }




   public function addReqSubmit(Request $request){
    //   dd($request);
       // DB::table('companyreqs')->insert([
        $id = $request->id;

        $this->validate($request, [

            'Email' => 'required|max:255|unique:companies,Email,'.$id,
            'Company_Name' => 'required|max:255|unique:companies,Company_Name,'.$id,
        ],[

            'Email.required' =>'Please, Enter The Email ',
            'Email.unique' =>'This Email is exist',
            'Company_Name.unique' =>'This Company name is exist',
        ]);

      $newCompanyReq=companyreq::create([
        'Name' =>$request->Name,
        'Position' =>$request->Position,
        'Phone' =>$request->Phone,
        'Email' =>$request->Email,
        'Company_Name' =>$request->Company_Name,
        'Co_Address' =>$request->Co_Address,
        'Co_Website' =>$request->Co_Website,
        'Business_Activity' =>$request->Business_Activity,
        'status_id'=>1
        ]);
        $mailData = [
            'title' => 'New company need to join. Please, check the inventory system to update this request',
            'body' => " please check the link http://185.207.251.223:8181/ Campany name :$newCompanyReq->Company_Name & Phone : $newCompanyReq->Phone"
        ];

        Mail::to("admin.inventory@chainnest.net")->send(new demoMail($mailData));

        return back()->with ('Reqs_created','Request has been sent successfully!, please wait for response');
    }


// ----------------------------------------go to the waiting page ---------------------------------------------
public function waiting()
{
    return view('Registration_Req.Req');

}



/****************** function to delete product by id ************** */
public function deleteReq($Co_Req)
{
DB::table('companyreqs')->where('id',$Co_Req)->update(['status_id'=>3]);
 return back()->with ('Req_delete','Request Has Been Deleted Successfully!');

}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Co_Req = DB::table('companyreqs')->get();

       // $Co_Req = Reqs::paginate(10);

        return view('Registration_Req.AllReq' ,compact('Co_Req'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reqs  $reqs
     * @return \Illuminate\Http\Response
     */
    public function show(Reqs $reqs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reqs  $reqs
     * @return \Illuminate\Http\Response
     */
    public function edit(Reqs $reqs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reqs  $reqs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reqs $reqs)
    {
        if ($request->ajax()) {
            DB::table('companyreqs')->where('id',$request->pk)->update([

                    $request->name => $request->value
                ]);

            return response()->json(['success' => true]);
        }
    }



////////////////////////////////////////////////////////// approve request/////////////////////////////////////////////
    public function approve(companyreq $reqs)
    {
        // dd($reqs);
        $password = bin2hex(random_bytes(8));

        $Company = Companies::create([
            'Company_name' => $reqs->Company_Name,
            'Company_code' => decbin(rand(1, 10000)),
            'Person_Name' => $reqs->Name,
            'Email' => $reqs->Email,
            'Position' => $reqs->Position,

            'Phone' => $reqs->Phone,
            'companytype_id' => 1,
            'Company_Logo' =>"",
            'Company_website' => $reqs->Co_Website,
            'Company_Address' => $reqs->Co_Address,
            'Business_Activity' => $reqs->Business_Activity,
            // 'Created_by'=>(Auth::user()->name),
            'created_at'=>date('Y-m-d H:i:s'),


        ]);
        $user=User::create([
            'email'=>$reqs->Email,
            'name' => $reqs->Name,
            'password' => Hash::make($password),
            'Phone' => $reqs->Phone,
            // 'roles_name' => $reqs->roles_name,
            'companies_id'=> $Company->id,
            'Status' => "Active",
        ]);
        $user->assignRole(3);
        $reqs->update(['status_id'=>2]);

       // call function send email
       $mailData = [
        'title' => 'Dear Valued Guest ',
        'body' => "<p>Thank you for your registration to Chain Nest Inventory Management System</p>
        <p>  Your request has been approved.</p>
        <p> Kindly get your access as follow:</p>
        <p><b> User:</b> $reqs->Email</p>
        <p><b>Temp password :</b>  $password</p>
        <p>you can access your inventory via this link:</p>
        <p>Check the link http://185.207.251.223:8181/</p>
        <p> Note:Please login with your temporary password and it's a must change it in first step after login </p>
        <p>you can replay to this Email if you face isusse: admin.inventory@chainnest.net</p>"


     ];

        $Co_Req= companyreq::where('status_id','=',1)->with(['Status'])->get();

    // $todata=['address'=>$reqs->email,'name'=>$reqs->name];
    // dd($reqs->Email);
     Mail::to("$reqs->Email")->send(new demoMail($mailData));
       // return response()->json(['success' => true]);
       return view('Registration_Req.AllReq' ,compact('Co_Req'));

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reqs  $reqs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reqs $reqs)
    {
        //
    }
}
