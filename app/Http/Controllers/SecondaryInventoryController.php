<?php

namespace App\Http\Controllers;

use App\Models\inventory;
use App\Enums\InventoryType;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\secondary_inventory;
use App\Models\Companies;
use App\Mail\demoMail;
use App\Models\Categories;
use App\Models\products;
use App\Models\transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\User;

class SecondaryInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        auth()->user()->unreadNotifications->markAsRead();
        $inv = inventory::with(['Compa'], ['pros'])->where('Inventory_Type', 2);
        // $countProduct = products::where('companies_id', Auth::user()->companies_id)->count();
        //$countProduct = DB::table('products');

        // $inv=DB::table('inventory')->where('Inventory_Type', 2)->get();




        if (Auth::user()->companies_id == 1) {
            $inv = $inv->get();
            // $countProduct = $countProduct->get();
        } else {
            $inv = $inv->where('companies_id', Auth::user()->companies_id)->get();

            // $countProduct = products::where('companies_id', Auth::user()->companies_id)->count();

        }

        //

        return view('Sub_Inventory.Sub_Inv', compact('inv'));
    }
    public function printt($id) //$id
    {


        $products = products::with(['Categ', 'Subcat', 'Uni', 'Com', 'Type', 'curr', 'attach', 'inven'])
            ->where('id', $id)
            ->where('companies_id', Auth::user()->companies_id)
            ->firstOrFail();


        if (Auth::user()->companies_id == 1) {
            $products = $products->where('id', $id)->first();
        } else {
            $products = $products->where('companies_id', Auth::user()->companies_id)->get();
        }

        return view('print', compact('products', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inv = DB::table('inventory')->where('companies_id', Auth::user()->companies_id)->get();

        return view('Sub_Inventory.Add_Sec_inv', compact('inv'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //inventory $reqs
    {

        //  $password = bin2hex(random_bytes(8)); 'Inventory_Type'=>'Sub'

        // $count_sub = inventory::where(Auth::user()->companies_id)->count();
        // if ($count_sub < 6 )
        // {

        $newinv = inventory::create([
            'companies_id' => Auth::user()->companies_id,
            'inv_name' => $request->inv_name,
            'address' => $request->address,
            'Email' => $request->Email,
            'Phone' => $request->Phone,
            'manager' => $request->manager,
            'Inventory_Type' => InventoryType::Sub,

            'users_id' => (Auth::user()->id),
            'Created_by' => (Auth::user()->name),
            'created_at' => date('Y-m-d H:i:s'),

        ]);
        $newinv->save();

        /* $user=User::create([
            'email'=>$reqs->Email,
            'name' => $reqs->manager,
            'password' => Hash::make($password),
            'Phone' => $reqs->Phone,

            'companies_id'=>Auth::user()->companies_id,
            'Status' => "Active",
        ]);
        $user->assignRole(3);
        $reqs->update(['status_id'=>2]);

        $mailData = [
            'title' => 'Dear Valued Guest ',
            'body' => "<p>Thank you for your registration to Chain Nest Inventory Management System</p>
            <p>  Your request has been approved.</p>
            <p> Kindly get your access as follow:</p>
            <p> <b>User: $reqs->Email</b></p>
            <p><b>Temp password :  $password </b></p>
            <p>you can access your inentory via this link:</p>
            <p>Check the link http://185.207.251.223:8181/</p>
            <p> Note:Please login with your temporary password and it's a must change it in first step after login </p>
            <p>you can replay to this Email if you face isusse: admin.inventory@chainnest.net</p>"


         ];*/

        // $inv= inventory::where('status_id','=',1)->with(['Status'])->get();
        /* Mail::to("$reqs->Email")->send(new demoMail($mailData));*/
        // }
        return back()->with('message', 'Item created successfully!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\secondary_inventory  $secondary_inventory
     * @return \Illuminate\Http\Response
     */

    /////////////////// show all sub inv. contents from view button //////////////////////////
    public function allcontents(Request $request, $id)
    {
        auth()->user()->unreadNotifications->markAsRead();
        $products = products::with(['Categ', 'Subcat', 'Uni', 'Com', 'Type', 'curr', 'Skus', 'inven'])->where("inventory_id", $id); //->where('Inventory_id', 2)

        //$inv = inventory::with([ 'Compa' ])->where('Inventory_Type', 2)->get();

        if (Auth::user()->companies_id == 1) {
            $products = $products->get();
        } else {
            $products = $products->where('companies_id', Auth::user()->companies_id)->get();
        }

        //


        if ($request->get('status') == 'archived') {
            $products = $products->onlyTrashed();
        }

        return view('Sub_Inventory.inv_contents',  compact('products'));
    }




    ////////////////////////////////////////////////////////all inventories with all detailes//////////////////
    public function allinve(Request $request)
    {
        auth()->user()->unreadNotifications->markAsRead();
        $products = products::with(['Categ', 'Subcat', 'Uni', 'Com', 'Type', 'curr', 'Skus', 'inven']); //->where('Inventory_id', 2)

        //$inv = inventory::with([ 'Compa' ])->where('Inventory_Type', 2)->get();

        if (Auth::user()->companies_id == 1) {
            if (Auth::user()->Inventory_id !== 1) {


                $products = $products->get();
            }
        } else {
            $products = $products->where('companies_id', Auth::user()->companies_id)->get();
        }

        //


        if ($request->get('status') == 'archived') {
            $products = $products->onlyTrashed();
        }

        return view('Sub_Inventory.All_inventories',  compact('products'));
    }




    /////////////////////////////////////// to show the sub inv Detailes from Details button ///////////////////////////////
    public function Summary($id) //Request $request, $id
    {
        //$user= User::find($user_id);
        // auth()->user()->unreadNotifications->markAsRead();
        // $inv = DB::table('inventory')->where('id', $id)->first();
        $products = products::with(['Categ', 'Subcat', 'Uni', 'Com', 'Type', 'curr', 'Skus', 'inven'])->where("inventory_id", $id); //->where('id', $id)->first()  ,->where('Inventory_id', 2)

        $inv = inventory::with(['Compa'])->where('id', $id)->first();
        if (Auth::user()->companies_id == 1) {
            $products = $products->get();
        } else {
            // $products = $products->where('companies_id', Auth::user()->companies_id)->get();
            $products = products::with('transactions')->where('companies_id', Auth::user()->companies_id)->get();
        }
        //$in = inventory::with(['pros'])->get();
        $data['inventory'] = inventory::get(["inv_name", "id"]);
        //return view('Sub_Inventory.Summary_inv', $data);
        return view('Sub_Inventory.Summary_inv', compact('inv', 'products', 'data'));
    }

    // public function Summary($id)
    // {
    //     $products = products::with(['Categ', 'Subcat', 'Uni', 'Com', 'Type', 'curr', 'Skus', 'inven'])
    //         ->where("inventory_id", $id);

    //     if (Auth::user()->companies_id == 1) {
    //         $products = $products->get();
    //     } else {
    //         $products = $products->where('companies_id', Auth::user()->companies_id)->get();
    //     }

    //     $inv = inventory::with(['Compa'])->where('id', $id)->first();

    //     $data['inventory'] = inventory::get(["inv_name", "id"]);

    //     return view('Sub_Inventory.Summary_inv', compact('inv', 'products', 'data'));
    // }


    public function fetchproducts(Request $request)
    {
        $data['products'] = products::where("inventory_id", $request->inventory_id)->get(["Product_name", "QTY", "id"]);
        return response()->json($data);
    }
    public function fetchcategories(Request $request)
    {
        $data['categories'] = Categories::where("products_id", $request->products_id)->get(["Category", "id"]);
        return response()->json($data);
    }





    /////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function show(inventory $secondary_inventory)
    {
    }


    ///////////////////////////////////////////// edit ///////////////////////
    public function editinvu($id)
    {

        $inv = DB::table('inventory')->where('id', $id)->first();
        return view('Sub_Inventory.Edit',  compact('inv'));
    }

    ////////////////////////// update//////////////////////////
    public function Updateinv(Request $request, $id)
    {
        $id = $request->id;
        //$inv =inventory::find($id);
        DB::table('inventory')->where('id', $request->id)->update([

            'companies_id' => Auth::user()->companies_id,
            'inv_name' => $request->inv_name,
            'address' => $request->address,
            'Email' => $request->Email,
            'Phone' => $request->Phone,
            'manager' => $request->manager,
            'Inventory_Type' => $request->Sub,
            'users_id' => (Auth::user()->id),

            'Created_by' => (Auth::user()->name),
            'created_at' => date('Y-m-d H:i:s'),



        ]);
        // return redirect('/home')->with('success', 'Request has been updated Successfully!');
        return back()->with('message', 'Item updated successfully!');
    }


    /////////////////////////////////// Transaction //////////////////////
    /* public function transa()
    {
      return view('Secondary_Inventory.transaction');

    }

    public function transferdetalies($id)
    {
        $user= User::find($id);
        return view('Secondary_Inventory.Transaction_Detailes', compact('id'));

    }

*/
    public function transfer(Request $request)
    {
        $value = 3;
        $cat = DB::table('categories')->where('companies_id', Auth::user()->companies_id)->get();
        $sub = DB::table('subcategories')->get();
        $un = DB::table('unit')->get();
        $pt = DB::table('productype')->get();
        $cr = DB::table('currancy')->get();
        $sk = DB::table('managesku')->get();
        $user = User::where('companies_id', Auth::user()->companies_id)->get();





        $products = products::with(['Categ', 'Subcat', 'Uni', 'Com', 'Type', 'curr', 'Skus', 'inven']); //->where('id', $id)->first()  ,->where('Inventory_id', 2)

        $inv = inventory::with(['Compa'])->get();
        // $inv = DB::table('inventory')->get();

        // dd($request);
        if ($request->keyword != null) {
            $products = $products->Where('Product_name', 'like', '%' . $request->keyword . '%');
        }
        if ($request->inven != null) {
            $products = $products->Where('inven', 'like', '%' . $request->inven . '%');
        }
        if ($request->inven != null) {
            $products = $products->Where('inven2', 'like', '%' . $request->inven . '%');
        }
        if ($request->name  != null) {
            $user = $user->Where('name ', 'like', '%' . $request->name . '%');
        }

        if ($request->Part_No != null) {
            $products = $products->Where('Part_No', 'like', '%' . $request->Part_No . '%');
        }
        if($request->Vendor !=null){
            $products = $products->Where('Vendor','like','%'.$request->Vendor.'%');
        }
        if ($request->Supplier != null) {
            $products = $products->Where('Supplier', 'like', '%' . $request->Supplier . '%');
        }
        if ($request->product_code != null) {
            $products = $products->Where('product_code', 'like', '%' . $request->product_code . '%');
        }
        if ($request->BIN != null) {
            $products = $products->Where('BIN', 'like', '%' . $request->BIN . '%');
        }
        if ($request->Category != null) {
            $products = $products->Where('categories_id', $request->Category);
        }
        if ($request->Subcategory != null) {
            $products = $products->Where('subcategories_id', $request->Subcategory);
        }
        if ($request->QTY != null) {
            $products = $products->Where('QTY', $request->QTY);
        }
        $products = $products
            ->get();
        return view('Transferproduct.Transfer', ['products' => $products, 'cat' => $cat, 'pt' => $pt, 'cr' => $cr, 'sk' => $sk, 'value' => $value, 'sub' => $sub, 'un' => $un, 'inv' => $inv  ]);


        // return view('Transferproduct.Transfer', compact('products','inv', 'cat', 'sub', 'un', 'pt', 'cr', 'sk','value'));

    }


    public function confirm($id)
    {
        // dd($id);

        $product = products::find($id);
        // dd($product);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }


        // $Product = products::first();

        return view('Transferproduct.confirmation', compact('product'));
    }

    // public function transform(Request $request)
    // {
    //     //   dd($request);
    //     // إنشاء مدخل جديد في جدول transaction
    //     $transaction = transaction::create([
    //         'From_inv' => $request->From_inv,
    //         'To_inv' => $request->To_inv,
    //         'Product_name' => $request->Product_name,
    //         'Description' => $request->Description,
    //         'QTY' => $request->QTY,
    //         'delivery_QTY' => $request->delivery_QTY,
    //         'name'=>$request->name,
    //         'transactiontypes_id'=>$request->transactiontypes_id,
    //         'Created_by' => Auth::user()->name,
    //         'products_id' =>$request->products_id,
    //         // 'inventory_id' =>$request->inventory_id,
    //         'users_id' => Auth::user()->id,
    //         'created_at' => now(),
    //     ]);
    //     // احتياطي: إعادة توجيه المستخدم إلى الصفحة السابقة مع رسالة نجاح
    //     return redirect()->back()->with('success', 'تم حفظ البيانات بنجاح.');
    // }


    public function transform(Request $request)
    {
        // dd($request);
        $transaction = new Transaction([
            'name' => $request->get('name'),
            'QTY' => $request->get('QTY'),
            'delivery_QTY' => $request->get('delivery_QTY'),
            'From_inv' => $request->get('From_inv'),
            'To_inv' => $request->get('To_inv'),
            'Description' => $request->get('Description'),
            'users_id' => auth()->user()->id,
            'transactiontypes_id' => 1,
            'products_id' => $request->get('Product_name'),
            'inventory_id' => $request->get('From_inv')
        ]);
        $transaction->save();
        return redirect()->back()->with('success', 'Transaction added successfully.');
    }

    // public function transshow()
    // {
    //     $transactions = Transaction::all();
    //     return  redirect()->back()->compact(['transactions' => $transactions]);
    // }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\secondary_inventory  $secondary_inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(inventory $secondary_inventory)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\secondary_inventory  $secondary_inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inventory $inventory)
    {
        // $id = $request->id;

        /* $this->validate($request, [

              'name' => 'required|max:255|unique:name,',

          ],[

              'name.required' =>'Please, enter the sub-inventory name ',
              'name.unique' =>'This sub-inventory name is exist',

          ]);
  */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\secondary_inventory  $secondary_inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(inventory $inventory)
    {
        //
    }
}
