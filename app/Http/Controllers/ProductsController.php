<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\attached;
use Illuminate\Support\Facades\Mail;
use App\Models\companyreq;
use App\Mail\demoMail;
use App\Models\inventory;


//use App\Models\products;
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
//use Notification;
use Illuminate\Support\Facades\Notification;// this important to use send word in notification


use Illuminate\Support\Facades\DB;

use App\Models\products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct()
     {
          $this->middleware('permission:inventory-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
          $this->middleware('permission:product-create', ['only' => ['create','store']]);
          $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:product-delete', ['only' => ['destroy']]);
          $this->middleware('permission:product-show', ['only' => ['singleshow']]);
     }





    public function index(Request $request)
    {
        auth()->user()->unreadNotifications->markAsRead();
        $products = products::with(['Categ', 'Subcat', 'Uni', 'Com', 'Type', 'curr', 'Skus','inven'])->where('Inventory_id', 1);


        if (Auth::user()->companies_id == 1) {
            $products = $products->get();
        } else {
            $products = $products->where('companies_id', Auth::user()->companies_id)->get();
        }

        //


        if ($request->get('status') == 'archived') {
            $products = $products->onlyTrashed();
        }


        // $products = $products->paginate(10);
        return view('Products.inventory', compact('products'));
    }

//////////////////////////////////////////////print/////////////////////////////////

public function printt($id)//$id
{

 // $id = optional(Auth::user())->id;
   // $products = DB::table('products')->where('id', $id)->first();
//    $products = products::with(['Categ', 'Subcat', 'Uni', 'Com', 'Type', 'curr','attach','inven'])->where('id', $id)->first();

   $products = products::with(['Categ', 'Subcat', 'Uni', 'Com', 'Type', 'curr','attach','inven'])
        ->where('id', $id)
        ->where('companies_id', Auth::user()->companies_id)
        ->firstOrFail();


   if (Auth::user()->companies_id == 1) {
    $products = $products->where('id', $id)->first();
} else {
    $products = $products->where('companies_id', Auth::user()->companies_id)->get();
}

         return view('print', compact('products','id'));
   // return view('print', compact('products'));

}





    ////////////////////////////////////////// Ask For Qution////////////////////////////
 public function AskFor(Request $request)
 {
    $id = $request->id;
    $user=\App\Models\User::get();
    $inventory = products::find($id);// removed first() to get ()
   // $notification = notification::get();

      //$inventory=inventory::lastest()->first();

      $products = products::with(['Categ', 'Subcat', 'Uni', 'Com', 'Type', 'curr', 'Skus','inven']);


    Notification::send($user,new \App\Notifications\AskForOffersNotification($inventory->id));


    $mailData = [
        'title' => 'There is a company ask for quotation or selling. Please, check the inventory system to update this request',
        'body' => " please check the link http://185.207.251.223:8181/ "
    ];

    Mail::to("admin.inventory@chainnest.net")->send(new demoMail($mailData));


   return back()->with ('success','Request has been Sent successfully!,Please wait for response');


 }
// public function AskFor(Request $request)
// {
//     $id = $request->id;
//     $user = \App\Models\User::get();
//     $inventory = products::find($id);

//     if (!$inventory) {
//         return back()->with('error', 'Product not found.');
//     }

//     Notification::send($user, new \App\Notifications\AskForOffersNotification($inventory->id));

//     $mailData = [
//         'title' => 'There is a company ask for quotation or selling. Please, check the inventory system to update this request',
//         'body' => " please check the link http://185.207.251.223:8181/ "
//     ];

//     Mail::to("admin.inventory@chainnest.net")->send(new demoMail($mailData));

//     return back()->with('success', 'Request has been sent successfully! Please wait for a response.');
// }

 //////////////////////////////////////////send new  notification to menue bar////////////////////////
 public function sendnew($id)
 {

    $user=\App\Models\User::get();
    $product = DB::table('products')->where('id', $id)->get();// removed first() to get ()

      $products = products::with(['Categ', 'Subcat', 'Uni', 'Com', 'Type', 'curr', 'Skus','inven']);
      if (Auth::user()->companies_id == 1) {
        $products = $products->get();
    } else {
        $products = $products->where('companies_id', Auth::user()->companies_id)->get();
    }

    Notification::send($user,new \App\Notifications\Addproduct($product));


   // dd('Task completed!');
   return back()->with ('notification','New');


 }
/////////////////////////////////////Undo/ Delete Notifications ///////////////////////////////

// public function DeleteNoti($id)//Request $request
// {
    // dd('dd');
    // $inventory = products::find($id);
    //Categories::find($id)->delete();
   // $notif=Notification::find($id);
   // DB::table('notifications')->where('id',$notif)->delete();
  // $id = $request->input('id');

  // auth()->user()->notifications()->where('id', $id)->delete();

   //return redirect('/notifications')->with('message', 'Notification deleted.');
  // $notif = Notification::findOrFail($id);

  // auth()->user()->undoPoint(new PostCreated($post));

   //$notif->delete();
   public function DeleteNoti($id)
{
    $notification = auth()->user()->notifications()->find($id);

    if ($notification) {
        $notification->delete();
        return redirect()->back()->with('message', 'Notification deleted successfully.');
    } else {
        return redirect()->back()->with('error', 'Notification not found.');
    }
}
// if (Auth::user()->companies_id == 1) {

//    if($id) {
//     $notification = Notification::where('id', $id)->delete();
//     //$notification->delete();
//    }
//    $user = auth()->user();
//    //$user->undoPoint(new PostCreated($id));


//     return back()->with('message', 'Notification deleted.');
// }
// }

/////////////////////////////// show all notifications //////////////
public function All_notifi()
{
   //$inv = inventory::with([ 'Compa' ])->where('Inventory_Type',1);

$companies_id = Auth::user()->companies_id;
$notifications = DB::table('notifications')
                //   ->join('contactlist', 'notifications.contactlist_id', '=', 'contactlist.id')
                  ->where('id', $companies_id)
                  ->get();
if ($notifications->isNotEmpty()){
    return view('all_Notifications', compact('notifications'));
} else {
    return "No notifications found for this company";
}

//    $notifications= DB :: table('notifications')->get();
// return view('all_Notifications', compact('notifications'));


}




  //////////////////////////////////// match Subcategory with category///////////////
  public function getsubcategories($id)
  {
      $sub = DB::table("subcategories")->where("categories_id", $id)->pluck("Subcategory", "id");
      return json_encode($sub);
  }

  /*********************Function to search***************** */

  public function search()
  {

      $search_text = $_GET['query'];
      $products = products::where('Product_name', 'LIKE', '%' . $search_text . '%')->get();



      return view('Products.inventory', compact('products'));
  }



///////////////////// the rest of the bar code functions//////////////////
public function productCodeExists($number)
{
    return products::whereProductCode($number)->exists();
}

     /**********************************to add new product******************************************************** */

     public function addpro()
     {

         $products = DB::table('products')->get();
         $inv = DB::table('inventory')->get();
         $cat = DB::table('categories')->where('companies_id', Auth::user()->companies_id)->get();
         $sub = DB::table('subcategories')->get();
         $un = DB::table('unit')->get();
         $pt = DB::table('productype')->get();
         $cr = DB::table('currancy')->get();
         $sk = DB::table('managesku')->get();
         if(count($cat) == 0){
             // $warnnig =;
             // return view('inventory.inventory', compact('warnnig'));

         //   return back()->with('warnnig ','Please create Category and sub-Category for create new product');
           return back()->withFail('Please create Category and sub-Category for create new product');
         }
         return view('Products.AddProduct', compact('products', 'cat', 'sub', 'un', 'pt', 'cr', 'sk','inv'));
     }





      /**************************************************************************** */
      public function addProductSubmit(Request $request)
      {
          if ($request->list_mask_0 == "Auto") {
              $request->merge([
                  'list_text_0' => decbin(rand(1, 10000)),// BIN
                 // 'product_code'=> decbin(rand(1, 10000)),
                  //$request['product_code']=$number;
              ]);
          }

          if ($request->list_mask_1 == "Auto") {
            $request->merge([
                'list_text_1' => decbin(rand(1, 10000)),// BIN
               // 'product_code'=> decbin(rand(1, 10000)),
                //$request['product_code']=$number;
            ]);
        }


          if ($request->Part_No != "" || $request->Part_No) {
              if ($request->managesku_id == "") {
                  $managesku = managesku::where("Part_No", $request->Part_No)->first();
                  if ($managesku) {
                      $request->merge([
                          'managesku_id' => $managesku->id,
                      ]);
                  } else {
                      $managesku = managesku::create([
                          "Part_No" => $request->Part_No,
                          "SKU" => uniqid('SKU_')
                      ]);

                      $request->merge([
                          'managesku_id' => $managesku->id,
                      ]);

                  }
              }
          }
          $data = ["per"=> $request->per,
                   "Consumption_Rate"=> $request->Consumption_Rate ,
                   "QTY"=> $request->QTY,
                   "Reorder_QTY"=>$request->Reorder_QTY ,
                   "delivery_time"=>$request->delivery_time,
                   "per1"=>$request->per1,
                   "date"=>date('Y-m-d')
                 ];
  ////////////////////////////////////////////////uplode multipule images///////////
          $imageName = "";
          if($request->hasFile("cover")){
              $file=$request->file("cover");
              $imageName=time().'_'.$file->getClientOriginalName();
              $file->move(\public_path("cover/"),$imageName);
          }

          //////////////////////////////////// barcode //////////////////


      $number=mt_rand(1000000000,9999999999);

         if($this->productCodeExists($number))
         {
      $number =mt_rand(1000000000,999999999);

         }
         $request['product_code']=$number;
         // inventory::create($request->all());



          $newInvetory = products::create([
              'inventory_id' => $request->inventory_id,
              'Product_name' => $request->Product_name,

              'Part_No' => $request->Part_No,
              'Vendor' => $request->Vendor,
              'Supplier' => $request->Supplier,
              'unit_id' => $request->unit_name,
              'BIN' => $request->list_text_0,
              'currancy_id' => $request->name,
              'QTY' => $request->QTY,
              'Reorder_QTY' => $request->Reorder_QTY,
              'Cost' => $request->Cost,
              'Consumption_Rate' => $request->Consumption_Rate,
              'per' => $request->per,
              'productype_id' => $request->productype_id,
              'unit_id' => $request->unit_id,
              'productype_id' => $request->productype_id,
              'delivery_time'=> $request->delivery_time,
              'per1'=> $request->per1,
              'product_code'=>$request->list_text_1,
              "cover" =>$imageName,
              'Location' => $request->Location,
              'categories_id' => $request->categories_id,
              'subcategories_id' => $request->Subcategory,
              'currancy_id' => $request->currancy_id,
              'Other_Features' => $request->Other_Features,
              // 'Reorder_Date' => $request->Reorder_Date,
              'Availbility' => $request->Availbility,
              'Description' => $request->Description,
              'Price' => $request->Price,
              'TotalPrice' => $request->TotalPrice,
              "Cost" => $request->Cost,
              'TotalCost' => $request->TotalCost,
              'Chain_Price' => $request->Chain_Price,
              'Product_Manager' => $request->Product_Manager,
              'managesku_id' => $request->managesku_id,
              'users_id' => (Auth::user()->id),
              'companies_id' => (Auth::user()->companies_id),
             // 'created_at'=>date('Y-m-d H:i:s'),

              'Created_by' => (Auth::user()->name),
              "changeQTY_at"=>date("Y-m-d"),
              'created_at' => date('Y-m-d H:i:s'),
              "Reorder_Date"=>$this->ReoderDate($data),
              "Expected_Date"=>$this->ExpectedDate($data,$this->ReoderDate($data))
          ]);
          $newInvetory->save();
         // echo "hello 1";
              // if($request->hasFile("images")){
              //     $files=$request->file("images");
              //     foreach($files as $file){
              //         $imageName=time().'_'.$file->getClientOriginalName();
              //         $request['inventory_id']=$newInvetory->id;
              //         $request['image']=$imageName;
              //         $file->move(\public_path("/images"),$imageName);
              //         attached::create($request->all());

              //     }
                 // echo "hello 2";

          Notification::send(\App\Models\User::where('companies_id',Auth::user()->companies_id)->where('id','!=',Auth::user()->id)->get(),new \App\Notifications\Addproduct($newInvetory));
         // echo "hello 3";

          // $request->validate([
          //     'attached' => 'required',
          //     'attached.*' => 'required|mimes:pdf,xlx,csv,jpeg,png,jpg,gif,svg|max:2048',
          // ]);

          // if ($request->hasFile('attached')) {
          //     $attachments = $request->file('attached');
          //     foreach ($attachments as $attachment) {
          //         $extension = $attachment->getClientOriginalExtension();
          //         $attachmentsname = time() . '.' . $extension;
          //         $attachment->move("uploads/$newInvetory->companies_id/$newInvetory->name", $attachmentsname);
          //         // $notification->attachment = $attachmentsname;
          //         $attach = new attached();
          //         $attach->inventory_id = $newInvetory->id;
          //         $attach->name = $attachmentsname;
          //         $attach->save();
          //     }


          // }
  echo "helloo";
          return back()->with('message','Item created successfully!');

      }


///////////////////Two functions to update or edit product by id ////////////////
public function editProduct($id)
{
    $inv = DB::table('inventory')->get();
    $pt = DB::table('productype')->get();
    $cat = DB::table('categories')->where('companies_id', Auth::user()->companies_id)->get();
    $sub = DB::table('subcategories')->get();
    $un = DB::table('unit')->get();
    $cr = DB::table('currancy')->get();
    $products = DB::table('products')->where('id', $id)->first();
    return view('Products.EditProduct', compact('products', 'cat', 'sub', 'un', 'pt', 'cr','inv'));
}
public function UpdateProduct(Request $request, $id )
{
    $updateInvantory =products::find($id);


    if ($request->Part_No != "" || $request->Part_No) {
        if ($request->managesku_id == "") {
            $managesku = managesku::where("Part_No", $request->Part_No)->first();
            if ($managesku) {
                $request->merge([
                    'managesku_id' => $managesku->id,
                ]);
            } else {
                $managesku = managesku::create([
                    "Part_No" => $request->Part_No,
                    "SKU" => uniqid('SKU_')
                ]);
                $request->merge([
                    'managesku_id' => $managesku->id,
                ]);
            }
        }
    }

   // $number=mt_rand(1000000000,9999999999);
   // if ($request->product_code != "" || $this->productCodeExists($number)) {


  // if($this->productCodeExists($number))
  // {
// $number =mt_rand(1000000000,999999999);

  // }
   // $request['product_code']=$number;

  //}
//   $number=mt_rand(1000000000,9999999999);

//   if($this->productCodeExists($number))
//  {
// $number =mt_rand(1000000000,999999999);

//   }
//   $request['product_code']=$number;





    $products=products::findOrFail($id);
    if($request->hasFile("cover")){
        if (File::exists("cover/".$products->cover)) {
            File::delete("cover/".$products->cover);
        }
        $file=$request->file("cover");
        $products->cover=time()."_".$file->getClientOriginalName();
        $file->move(\public_path("/cover"),$products->cover);
        $request['cover']=$products->cover;
    }

    $updateInvantory->update([
        'inventory_id' => $request->inventory_id,
        'Product_name' => $request->Product_name,
        'Part_No' => $request->Part_No,
        'Vendor' => $request->Vendor,
        'Supplier' => $request->Supplier,
        'BIN' => $request->BIN,
        'currancy_id' => $request->currancy_id,
        'QTY' => $request->QTY,
        'Reorder_QTY' => $request->Reorder_QTY,

        'Product_Manager' => $request->Product_Manager,
        'Consumption_Rate' => $request->Consumption_Rate,
        'per' => $request->per,
        'productype_id' => $request->productype_id,
        'unit_id' => $request->unit_id,
        'productype_id' => $request->productype_id,
         'product_code'=>$request->product_code,
        'cover'=>$products->cover,
        'managesku_id' => $request->managesku_id,

        'Chain_Price' => $request->Chain_Price,
        'Location' => $request->Location,
        'categories_id' => $request->categories_id,
        'subcategories_id' => $request->Subcategory,
        'Other_Features' => $request->Other_Features,
        'Reorder_Date' => $request->Reorder_Date,
        'delivery_time'=> $request->delivery_time,
        'per1'=> $request->per1,
        // 'Attached_id' => $request->Attached_id,
        'Availbility' => $request->Availbility,
        'Product_Manager' => $request->Product_Manager,
        'Description' => $request->Description,
        'Price' => $request->Price,
        'TotalPrice' => $request->TotalPrice,
        "Cost" => $request->Cost,
        'TotalCost' => $request->TotalCost,
        'users_id' => (Auth::user()->id),
        'companies_id' => (Auth::user()->companies_id),
        'updated_at' => date('Y-m-d H:i:s'),
    ]);
    $invantoryChange = $updateInvantory->getChanges();

    if(isset($invantoryChange["QTY"])||isset($invantoryChange["Reorder_QTY"])||isset($invantoryChange["Consumption_Rate"])||isset($invantoryChange["delivery_time"])||isset($invantoryChange["per"])||isset($invantoryChange["per1"]) ) {
      // exists
        $updateInvantory->update(["changeQTY_at"=>date("Y-m-d")]);
        $data = ["per"=> $updateInvantory->per,
        "Consumption_Rate"=> $updateInvantory->Consumption_Rate ,
        "QTY"=> $updateInvantory->QTY,
        "Reorder_QTY"=>$updateInvantory->Reorder_QTY ,
        'delivery_time'=> $updateInvantory->delivery_time,
        'per1'=> $updateInvantory->per1,
        "date"=>date('Y-m-d')];
        $updateInvantory->update(["Reorder_Date"=>$this->ReoderDate($data)]);
    }
    if(isset($invantoryChange["delivery_time"])||isset($invantoryChange["Reorder_Date"])){
        $data = ["per"=> $updateInvantory->per,
        "Consumption_Rate"=> $updateInvantory->Consumption_Rate ,
        "QTY"=> $updateInvantory->QTY,
        "Reorder_QTY"=>$updateInvantory->Reorder_QTY ,
        'delivery_time'=> $updateInvantory->delivery_time,
        'per1'=> $updateInvantory->per1,
        "date"=>date('Y-m-d')];
        $updateInvantory->update(["Expected_Date"=>$this->ExpectedDate($data,$this->ReoderDate($data))]);
    }
    // dd($invantoryChange);
    // exit();
    $request->validate([
        'images' => 'required',
        'attached.*' => 'required|mimes:pdf,xlx,csv,jpeg,png,jpg,gif,svg|max:2048',
    ]);

   // if ($request->hasFile('attached')) {
      //  $attachments = $request->file('attached');
      //  foreach ($attachments as $attachment) {
         //   $extension = $attachment->getClientOriginalExtension();
         //   $attachmentsname = time() . '.' . $extension;
            //$attachment->move("uploads/$newInvetory->companies_id/$newInvetory->name",$attachmentsname);
            // $notification->attachment = $attachmentsname;
         ////   $attach = new attached();
            // $attach->inventory_id = $newInvetory->id;
           // $attach->name = $attachmentsname;
            //$attach->save();
       // }
   // }

   if($request->hasFile("images")){
       $files=$request->file("images");
       foreach($files as $file){
         $imageName=time().'_'.$file->getClientOriginalName();
           $request["products_id"]=$id;
          $request["image"]=$imageName;
          $file->move(\public_path("images"),$imageName);
         attached::create($request->all());

     }
 }

  //  return back()->with('message', 'Product has been Updated Successfully!');
  return back()->with('message','Item updated successfully!');
  //return redirect()->route('updateproduct/{id}')->with('message','Data added Successfully');
}


    /*******************************************************Function to Advanced search************************************* */
    public function Ad(Request $request)
    {
        // dd($request);

        $products = products::with(['Categ', 'Subcat', 'Uni', 'Com', 'Type', 'curr', 'Skus','inven']);
        $inv = DB::table('inventory')->get();
        $cat = DB::table('categories');
        $sub = DB::table('subcategories')->get();
        $un = DB::table('unit')->get();
        $Com = DB::table('companies')->get();
        if (Auth::user()->companies_id == 1) {
           // $products = $products->get();
            $cat = $cat->get();
        } else {
            $cat = $cat->where('companies_id', Auth::user()->companies_id)->get();
            $products = $products->where('companies_id', Auth::user()->companies_id);
            $inv = $inv->where('companies_id', Auth::user()->companies_id);
            }


          if($request ->keyword !=null)
          {
            $products = $products->Where('Product_name','like','%'.$request->keyword.'%');


            //$cat = $cat->orWhere('categories.Category','like','%'.$request->keyword.'%');
           // $sub = $sub->orWhere('subcategories.Subcategory','like','%'.$request->keyword.'%');
           // $un = $un->orWhere('unit.unit_name','like','%'.$request->keyword.'%');
          }
          if($request->inv_name !=null){
            $products = $products->Where('inv_name','like','%'.$request->inv_name.'%');
      }
          if($request->Location !=null){
                $products = $products->Where('Location','like','%'.$request->Location.'%');
          }

          if($request->Part_No !=null){
            $products = $products->Where('Part_No','like','%'.$request->Part_No.'%');
      }
      if($request->Vendor !=null){
        $products = $products->Where('Vendor','like','%'.$request->Vendor.'%');
  }
  if($request->Supplier !=null){
    $products = $products->Where('Supplier','like','%'.$request->Supplier.'%');
}
if($request->Reorder_QTY !=null){
    $products = $products->Where('Reorder_QTY','like','%'.$request->Reorder_QTY.'%');
}


          if($request->Category !=null)
          {
            $products = $products->Where('categories_id',$request->Category);
          }

          if($request->Subcategory !=null)
          {
            $products = $products->Where('subcategories_id',$request->Subcategory);
          }
          if($request->Unit !=null)
          {
            $products = $products->Where('unit_id','=',$request->Unit);
          }


          $products = $products
          ->get();
         return view('AdvancedSearch.AdSearch',['products'=>$products ,'cat'=>$cat ,'Com'=>$Com , 'sub'=>$sub ,'un'=>$un ,'inv'=>$inv]);
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
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $updateInvantory=products::find($request->pk);
            if ($request->name ==="Consumption") {
                // dd($request);
                $request->merge([
                    'name' => 'QTY',
                    'value'=>$updateInvantory->QTY -$request->value ,
                ]);


            }
            $updateInvantory->update([$request->name => $request->value]);



                ////////////////////////////////////////////////////////////////////
                $invantoryChange = $updateInvantory->getChanges();


                if(isset($invantoryChange["QTY"])||isset($invantoryChange["Reorder_QTY"])||isset($invantoryChange["Consumption_Rate"]) ) {
                  // exists
                    $updateInvantory->update(["changeQTY_at"=>date("Y-m-d")]);
                    $data = ["per"=> $updateInvantory->per,
                    "Consumption_Rate"=> $updateInvantory->Consumption_Rate ,
                    "QTY"=> $updateInvantory->QTY,
                    "Reorder_QTY"=>$updateInvantory->Reorder_QTY ,
                    'delivery_time'=> $updateInvantory->delivery_time,
                    'per1'=> $updateInvantory->per1,
                    "date"=>date('Y-m-d')];
                    $updateInvantory->update(["Reorder_Date"=>$this->ReoderDate($data)]);
                }

            return response()->json(['success' => true,'Reorder_Date'=>$updateInvantory->Reorder_Date]);
        }
    }



    /**************Fetch data in type = Materials and show it********************************** */

    public function ShowMaterial()
    {
        $products = products::with(['Categ', 'Subcat', 'Uni', 'Com', 'Type', 'curr'])->where('productype_id', 2);

        if (Auth::user()->companies_id == 1) {
            $products = $products->get();
        } else {
            $products = $products->where('companies_id', Auth::user()->companies_id)->get();
        }

                          return view('Products.inventory', compact('products'));

        //return view('Products.inventory', compact('products'));
    }


    /**************Fetch data in type = Finished_Product and show it********************************** */

    public function ShowProduct()
    {
        $products = products::with(['Categ', 'Subcat', 'Uni', 'Com', 'Type', 'curr'])->where('productype_id', 1);
        if (Auth::user()->companies_id == 1) {
            $products = $products->get();
        } else {
            $products = $products->where('companies_id', Auth::user()->companies_id)->get();
        }

        return view('Products.inventory', compact('products'));
    }


        /**************Fetch data in type = Finished_Product and show it   in list********************************** */

public function ListProducts()
{
    $products = products::with(['Categ', 'Subcat', 'Uni', 'Com', 'Type', 'curr','inven'])->where('productype_id', 1)->get();

    return view('Lists.Product', compact('products'));
}


 /**************Fetch data in type = Materials and show it   in list   ********************************** */

 public function listMaterial()
 {
     $products = products::with(['Categ', 'Subcat', 'Uni', 'Com', 'Type', 'curr','inven'])->where('productype_id', 2)->get();

     return view('Lists.Material', compact('products'));
 }



    /************************************************* Delete on prodcuts by using id****************************************** */
    public function deletepro($products)
    {
        DB::table('products')->where('id', $products)->delete();
        return redirect('/inventory')->with('delete', 'Request Has Been Deleted Successfully!');
    }



 /************************************************* Single show the products Detalis (profile)********************************************************* */
     public function singleshow($id)
     {
         $user= User::find($id);
         $products = products::with(['Categ', 'Subcat', 'Uni', 'Com', 'Type', 'curr','attach','inven'])->where('id', $id)->first();

         return view('Products.product-details', compact('products', 'user'));
     }






    /***********************************************single show the contact of person whos sent the notification************** */
    public function singleshowwituser($id,$user_id)
    {
        $user= User::find($user_id);
        $products = products::with(['Categ', 'Subcat', 'Uni', 'Com', 'Type', 'curr','attach','inven'])->where('id', $id)->first();

        return view('Products.product-details-user', compact('products', 'user','user_id'));
    }

/************************************************* Multiple delete by using checkbox****************************************** */
public function deleteAll(Request $request)
{
    $ids = $request->ids;
    DB::table("products")->whereIn('id', explode(",", $ids))->delete();
    return response()->json(['success' => "Products Deleted successfully."]);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */

         /******************************************************************Delete From the show*********************************************************** */

    public function destroy(products $products)
    {
        $products=products::find($products);

        // $posts=Post::findOrFail($id);

          if (File::exists("cover/".$products->cover)) {
              File::delete("cover/".$products->cover);
          }
          $images=attached::where("products_id",$products->id)->get();
          foreach($images as $image){
          if (File::exists("images/".$image->image)) {
             File::delete("images/".$image->image);
         }
          }
          $products->delete();
         // return back();
         //DB::table('products')->where('id', $products)->delete();
         return redirect('/inventory')->with('warning', 'Request Has Been Deleted Successfully!');
    }

 /********************************for delete image**************** */
 public function deleteimage($id){
    $images=attached::findOrFail($id);
    if (File::exists("images/".$images->image)) {
       File::delete("images/".$images->image);
   }

   attached::find($id)->delete();
   return back();
}

public function deletecover($id){
$cover=products::findOrFail($id)->cover;
if (File::exists("cover/".$cover)) {
   File::delete("cover/".$cover);
}
return back();
}



 /******************************************************************** Soft Delete**************************************************** */
 public function trash()
 {
     $products = products::onlyTrashed()->paginate(10);

     return view('Products.inventory', compact('products'));
 }




 public function restore($id)
 {
     $products = products::onlyTrashed()->findOrFail($id);
     $products->restore();

     return to_route('Products.inventory')->with('success', 'product restored successfully');
 }

 public function delete($id)
 {
     $products = products::onlyTrashed()->findOrFail($id);

     if ($products->cover) {
         DB::delete('public/' . $products->cover);
     }

     $products->forceDelete();

     return to_route('products.trash')->with('success', 'Post deleted permanently');
 }
 ////////////////////////////////////////////// Delete From Notification page//////////////////////////


//  public function deletenotification($id) {
//     dd($id);
//     $notification = Notification::find($id);
//     if ($notification) {
//         $notification->delete();
//         return response()->json(['success' => 'تم حذف الإشعار بنجاح.']);
//     }
//     return response()->json(['error' => 'لم يتم العثور على الإشعار المحدد.']);
// }


public function removeNotification(Request $request)
{
    if ($request->id) {
        $notification = Notification::find($request->id);
        if ($notification) {
            $notification->delete();
            session()->flash('success', 'Notification removed successfully');
        }
    }
    return redirect()->back();
}




////////////////////////////////////////////////////////Reorder Date Equation//////////////////

 public function ReoderDate($data){

  // $Consumption_Rate_by_day = $this->calcualteDay($data['Consumption_Rate'],$data['per']);
   $Consumption_Rate_by_day = $this->calcualteforDay($data['Consumption_Rate'],$data['per']);

   $delivery_by_day = $this->calcualteDay($data['delivery_time'],$data['per1']);

   $reorder_per_day = ($data['QTY']- $data['Reorder_QTY'])/$Consumption_Rate_by_day;
   return Carbon::createFromFormat('Y-m-d', $data['date'])->addDays($reorder_per_day)->subDays($delivery_by_day);


 }
 public function calcualteDay($number, $par){
   $numberOfDay = 0;
   if($par === "Day"){
     $numberOfDay = $number;
   }
   elseif ($par === "Week") {
     $numberOfDay = $number*7;
   }

   elseif ($par === "Month") {
     $numberOfDay = $number*30;
   }
   elseif ($par === "Year") {
     $numberOfDay = $number*360;
   }
   return $numberOfDay;
 }

 public function calcualteforDay($number, $par){
     $numberOfDay = 0;
     if($par === "Day"){
       $numberOfDay = $number;
     }
     elseif ($par === "Week") {
       $numberOfDay = $number/7;
     }

     elseif ($par === "Month") {
       $numberOfDay = $number/30;
     }
     elseif ($par === "Year") {
       $numberOfDay = $number/360;
     }
     return $numberOfDay;
   }


public function ExpectedDate($data, $Reorder_Date)
{
    $delivery_by_day = $this->calcualteDay($data['delivery_time'],$data['per1']);
    return $Reorder_Date->addDays($delivery_by_day);


}



////////////////////////////////////////////////////////////Noification All read/////////////////////////////


public function MarkAsRead_all (Request $request)
{

    $userUnreadNotification= auth()->user()->unreadNotifications;

    if($userUnreadNotification) {
        $userUnreadNotification->markAsRead();
        return back();
    }


}




/////////////////////////////// Consumption of the stock QTy///////////////////////////////////////////

public function Consumption(Request $request)
{

    $products = products::with(['Categ', 'Subcat', 'Uni', 'Com', 'Type', 'curr', 'Skus','inven']);
    $inv = DB::table('inventory')->get();
    $cat = DB::table('categories');
    $sub = DB::table('subcategories')->get();
    $un = DB::table('unit')->get();
    if (Auth::user()->companies_id == 1) {
       // $products = $products->get();
        $cat = $cat->get();
    } else {
        $cat = $cat->where('companies_id', Auth::user()->companies_id)->get();
        $products = $products->where('companies_id', Auth::user()->companies_id);

        }




      if($request ->keyword !=null)
      {
        $products = $products->Where('Product_name','like','%'.$request->keyword.'%');

        //$cat = $cat->orWhere('categories.Category','like','%'.$request->keyword.'%');
       // $sub = $sub->orWhere('subcategories.Subcategory','like','%'.$request->keyword.'%');
       // $un = $un->orWhere('unit.unit_name','like','%'.$request->keyword.'%');
      }
      if($request->Location !=null){
            $products = $products->Where('Location','like','%'.$request->Location.'%');
      }
      if($request->inv_name !=null){
        $products = $products->Where('inv_name','like','%'.$request->inv_name.'%');
  }

      if($request->Part_No !=null){
        $products = $products->Where('Part_No','like','%'.$request->Part_No.'%');
  }
  if($request->Vendor !=null){
    $products = $products->Where('Vendor','like','%'.$request->Vendor.'%');
}
if($request->Supplier !=null){
$products = $products->Where('Supplier','like','%'.$request->Supplier.'%');
}
if($request->Reorder_QTY !=null){
$products = $products->Where('Reorder_QTY','like','%'.$request->Reorder_QTY.'%');
}


      if($request->Category !=null)
      {
        $products = $products->Where('categories_id',$request->Category);
      }

      if($request->Subcategory !=null)
      {
        $products = $products->Where('subcategories_id',$request->Subcategory);
      }
      if($request->Unit !=null)
      {
        $products = $products->Where('unit_id','=',$request->Unit);
      }


      $products = $products
      ->get();
     return view('Products.Consumption',['products'=>$products ,'cat'=>$cat , 'sub'=>$sub ,'un'=>$un ,'inv'=>$inv]);
}







}
