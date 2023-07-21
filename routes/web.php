<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\printcontroller;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubcategoriesController;
use App\Http\Controllers\UnittController;
use App\Http\Controllers\CompanytypeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\CurrancyController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\SecondaryInventoryController;

use App\Http\Controllers\ReqsController;
use App\Http\Controllers\StatusController;

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\ManageskuController;
use App\Http\Controllers\InvStoreTransferController;
use App\Http\Controllers\InvStoreTransferDetailsController;

use App\Http\Controllers\ContactlistController;

use App\Http\Controllers\ProductypeController;
use App\Http\Controllers\InventoryController;

use App\Http\Controllers\Admin\RoleController;

use App\Models\Subcategories;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('api/subcatories/{cat_id}', [App\Http\Controllers\SubcategoriesController::class, 'Callajax']);

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/send', function () {
    //Mail::to('fatimazayed01587@gmail.com')->send(new TestMail());
    return response('sending');
});



Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('home/fetch/{id}', [App\Http\Controllers\HomeController::class, 'fetch'])->name('home.fetch');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    // Route::get('test',[RoleController::class,'test']);
    Route::resource('users', UsersController::class);
});

Route::post('/{user}/restore', [App\Http\Controllers\UsersController::class, 'restore'])->name('users.restore');
Route::delete('/{user}/force-delete', [App\Http\Controllers\UsersController::class, 'forceDelete'])->name('users.force-delete');
Route::post('/restore-all', [App\Http\Controllers\UsersController::class, 'restoreAll'])->name('restore-all');

Route::get('users.create', [App\Http\Controllers\UsersController::class, 'create'])->name('add.users');
Route::get('users.edit/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('edit.users');
Route::post('users.update', [App\Http\Controllers\UsersController::class, 'update'])->name('update.users');
Route::get('users.show/{id}', [App\Http\Controllers\UsersController::class, 'show'])->name('show.users');
Route::get('users.edit1', [App\Http\Controllers\UsersController::class, 'edit1'])->name('edit1.users');


Route::resource('/permissions', App\Http\Controllers\Admin\PermissionController::class);
Route::post('/permissions/{permission}/roles', [App\Http\Controllers\Admin\PermissionController::class, 'assignRole'])->name('permissions.roles');
Route::delete('/permissions/{permission}/roles/{role}', [App\Http\Controllers\Admin\PermissionController::class, 'removeRole'])->name('permissions.roles.remove');


Route::get('roles.create', [App\Http\Controllers\RoleController::class, 'create'])->name('create.roles');
Route::get('roles.edit/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('edit.roles');
Route::post('roles.update', [App\Http\Controllers\RoleController::class, 'update'])->name('update.roles');
Route::get('roles.show/{id}', [App\Http\Controllers\RoleController::class, 'show'])->name('show.role');










Route::resource('inventory', ProductsController::class);

Route::get('prnpriview/{id}',[App\Http\Controllers\ProductsController::class, 'printt'])->name('prnpriviewf');
Route::get('prnpriviewfsec/{id}',[App\Http\Controllers\SecondaryInventoryController::class, 'printt'])->name('prnpriviewfsec');
Route::get('add-product', [App\Http\Controllers\ProductsController::class, 'addpro'])->name('add.product');
Route::post('SubmitProduct', [App\Http\Controllers\ProductsController::class, 'addProductSubmit'])->name('submit.product');
Route::get('subcatories/{id}', [App\Http\Controllers\ProductsController::class, 'getsubcategories']);
Route::get('productedit/{id}', [App\Http\Controllers\ProductsController::class, 'editProduct'])->name('edit.product');
Route::post('updateproduct/{id}', [App\Http\Controllers\ProductsController::class, 'UpdateProduct'])->name('update.product');
Route::get('DeleteProduct/{id}', [App\Http\Controllers\ProductsController::class, 'destroy'])->name('delete.pro');
Route::delete('/inventoryDeleteAll', [App\Http\Controllers\ProductsController::class, 'deleteAll']);
Route::get('product-show/{id}', [App\Http\Controllers\ProductsController::class, 'singleshow'])->name('show.product');
Route::get('product-user/{id}/user/{user_id}', [App\Http\Controllers\ProductsController::class, 'singleshowwituser'])->name('show.productwithuser');

Route::post('Product-Ajax1', [App\Http\Controllers\ProductsController::class, 'update'])->name('Product.updateAjex1');
//Route::post('product-barcode', [App\Http\Controllers\ProductsController::class, 'store'])->name('barcode.product');


Route::get('send-notification/{id}', [App\Http\Controllers\ProductsController::class, 'AskFor']);
Route::get('MarkAsRead_all', [App\Http\Controllers\ProductsController::class, 'MarkAsRead_all'])->name('MarkAsRead_all');
Route::get('send-new/{id}', [App\Http\Controllers\ProductsController::class, 'sendnew']);
Route::get('notifications', [App\Http\Controllers\ProductsController::class, 'All_notifi']);

// Route::get('Delete-noti/{id}', [App\Http\Controllers\ProductsController::class, 'DeleteNoti'])->name('DeleteNoti');
Route::get('delete-notification/{id}', [App\Http\Controllers\ProductsController::class, 'DeleteNoti'])->name('DeleteNoti');
// Route::post('deletenoti/{id}', [App\Http\Controllers\ProductsController::class, 'deletenotification'])->name('noti_delete');

Route::delete('deletenoti/{id}', [App\Http\Controllers\ProductsController::class, 'deletenotification'])->name('noti_delete');
Route::delete('/notifications/{id}', [App\Http\Controllers\ProductsController::class, 'removeNotification'])->name('notifications_remove');

//Route::post('/notifications/delete/{id}', [ProductsController::class, 'DeleteNoti'])->middleware('auth');

Route::delete('products/trash', [App\Http\Controllers\ProductsController::class, 'trash'])->name('products.destroy');
Route::post('products/{id}/restore', [App\Http\Controllers\ProductsController::class, 'restore'])->name('products.restore');
Route::delete('products/{id}/delete', [App\Http\Controllers\ProductsController::class, 'forceDelete'])->name('products.delete');
Route::post('/restore-allinv', [App\Http\Controllers\ProductsController::class, 'restoreAll'])->name('inventory.allres');

Route::delete('/deletecover/{id}',[App\Http\Controllers\ProductsController::class,'deletecover']);
Route::delete('/deleteimage/{id}',[App\Http\Controllers\ProductsController::class,'deleteimage']);

Route::get('Consumption', [App\Http\Controllers\ProductsController::class, 'Consumption'])->name('products.Consumption');

//Route::get('products/trash','trash')->name('products.trash');
    //Route::post('posts/{id}/restore','restore')->name('products.restore');
   // Route::delete('posts/{id}/delete','delete')->name('products.delete');



Route::get('ShowMaterials', [App\Http\Controllers\ProductsController::class, 'ShowMaterial'])->name('filter.Materials');
Route::get('ShowFinished', [App\Http\Controllers\ProductsController::class, 'ShowProduct'])->name('filter.products');

Route::get('AdSearch.Ad', [\App\Http\Controllers\ProductsController::class, 'Ad'])->name('AdSearch.AD');

Route::get('/search' ,[App\Http\Controllers\ProductsController::class,'search']) ->name('search.product');

Route::get('ListsProduct', [App\Http\Controllers\ProductsController::class, 'ListProducts'])->name('Lists.products');
Route::get('ListsMaterial', [App\Http\Controllers\ProductsController::class, 'listMaterial'])->name('Lists.Material');









Route::resource('ManageSKU', ManageskuController::class);
Route::get('SKUDelete/{id}', [App\Http\Controllers\ManageskuController::class, 'destroy'])->name('delete.Sku');

Route::get('AllSKU', [App\Http\Controllers\ManageskuController::class, 'Showall'])->name('Manage.SKU');
Route::get('NullSKU', [App\Http\Controllers\ManageskuController::class, 'SKUNull'])->name('Null.SKU');
Route::get('skuedit/{id}', [App\Http\Controllers\ManageskuController::class, 'edit'])->name('edit.sku');
Route::get('skupdate/{id}', [App\Http\Controllers\ManageskuController::class, 'update'])->name('update.sku');
Route::get('AllSKU1', [App\Http\Controllers\ManageskuController::class, 'Showall1'])->name('Manage1.SKU');
Route::post('sku-Ajax', [App\Http\Controllers\ManageskuController::class, 'updateAjax'])->name('sku.updateAjex');






Route::resource('Categories', CategoriesController::class);
Route::get('deletecat/{id}', [App\Http\Controllers\CategoriesController::class, 'deletecat'])->name('delete.cat');
Route::post('cat-Ajax', [App\Http\Controllers\CategoriesController::class, 'updateAjax'])->name('Cat.updateAjex');


Route::resource('Subcategories', SubcategoriesController::class);
Route::get('deletesub/{id}', [App\Http\Controllers\SubcategoriesController::class, 'deleteSub'])->name('delete.sub');
Route::get('Subedit/{id}', [App\Http\Controllers\SubcategoriesController::class, 'edit'])->name('edit.sub');
Route::post('updatesub', [App\Http\Controllers\SubcategoriesController::class, 'Update'])->name('update.sub');
Route::post('Sub-Ajax', [App\Http\Controllers\SubcategoriesController::class, 'updateAjax'])->name('Sub.updateAjex');


Route::resource('currancy', CurrancyController::class);
Route::get('deletecurr/{id}', [App\Http\Controllers\CurrancyController::class, 'deletecrr'])->name('delete.curr');
Route::get('convertcurr', [App\Http\Controllers\CurrancyController::class, 'convertcurr'])->name('convert.curr');
Route::get('price_with_curr', [App\Http\Controllers\CurrancyController::class, 'Twojoin'])->name('price.curr');
Route::get('under_construction', [App\Http\Controllers\CurrancyController::class, 'under'])->name('under.construction');






Route::resource('ProType', ProductypeController::class);
Route::get('deletept/{id?}', [App\Http\Controllers\ProductypeController::class, 'deletept'])->name('delete.pt');


Route::resource('Unit', UnittController::class);
Route::get('deleteu/{id}', [App\Http\Controllers\UnittController::class, 'deleteunit'])->name('delete.u');

Route::resource('ComType', CompanytypeController::class);
Route::get('deleteCT/{id}', [App\Http\Controllers\CompanytypeController::class, 'deletect'])->name('delete.CT');


Route::resource('Status', StatusController::class);
Route::get('deleteS/{id}', [App\Http\Controllers\StatusController::class, 'deleteStatus'])->name('delete.Stutas');


Route::resource('Orders', OrdersController::class);







Route::resource('ContactList', ContactlistController::class);
Route::get('AddnewContact', [App\Http\Controllers\ContactlistController::class, 'create'])->name('add.Contact');
Route::post('Submitcontact', [App\Http\Controllers\ContactlistController::class, 'store'])->name('submit.contact');

Route::get('deletecontact/{id}', [App\Http\Controllers\ContactlistController::class, 'deleteContact'])->name('delete.contact');
Route::get('editcontact/{id}', [App\Http\Controllers\ContactlistController::class, 'editcontact'])->name('edit.contact');
Route::post('updatecontact', [App\Http\Controllers\ContactlistController::class, 'UpdateContact'])->name('update.contact');

Route::post('Contactinline', [App\Http\Controllers\ContactlistController::class, 'update'])->name('Contacts.update');
Route::get('showSupplier', [App\Http\Controllers\ContactlistController::class, 'showSupplier'])->name('Supplier.Show');
Route::get('showBuyer', [App\Http\Controllers\ContactlistController::class, 'showBuyer'])->name('Buyer.Show');
Route::get('showOutsource', [App\Http\Controllers\ContactlistController::class, 'showOutsource'])->name('Outsource.Show');
Route::get('showOther', [App\Http\Controllers\ContactlistController::class, 'showOther'])->name('Other.Show');






Route::resource('All_Team', TeamController::class);
Route::get('CreateNew', [App\Http\Controllers\TeamController::class, 'create'])->name('add.member');
Route::post('Submitnew', [App\Http\Controllers\TeamController::class, 'submit'])->name('submit.member');
Route::post('Permission', [App\Http\Controllers\TeamController::class, 'permission'])->name('Permission.member');




Route::get('AllReq', [App\Http\Controllers\ReqsController::class, 'getAllReq']);
Route::resource('First', ReqsController::class);
Route::get('add-Req', [App\Http\Controllers\ReqsController::class, 'addReq'])->name('add.Req');
Route::post('add-Req-sub', [App\Http\Controllers\ReqsController::class, 'addReqSubmit'])->name('add.Reqsubmit');
Route::get('deleteReq/{id}', [App\Http\Controllers\ReqsController::class, 'deleteReq'])->name('delete.Req');
Route::get('approve/{reqs}', [App\Http\Controllers\ReqsController::class, 'approve']);
Route::post('Reqinline', [App\Http\Controllers\ReqsController::class, 'update'])->name('ComReq.update');
Route::get('Waite', [App\Http\Controllers\ReqsController::class, 'waiting'])->name('Response');



Route::resource('companies', CompaniesController::class);
Route::post('SubmitnewCompany', [App\Http\Controllers\CompaniesController::class, 'store'])->name('submit.company');
Route::get('DeleteCompany/{id}', [App\Http\Controllers\CompaniesController::class, 'deletecom'])->name('delete.comp');
Route::get('Customrslist', [App\Http\Controllers\CompaniesController::class, 'ListCustomers'])->name('list.customer');
Route::get('SuppliersList', [App\Http\Controllers\CompaniesController::class, 'ListSuppliers'])->name('list.supplier');
Route::post('Comp-Ajax', [App\Http\Controllers\CompaniesController::class, 'updateAjax'])->name('Comp.updateAjex');
Route::get('company-show/{id}', [App\Http\Controllers\CompaniesController::class, 'show'])->name('show.company');
Route::get('Company-edit/{id}', [App\Http\Controllers\CompaniesController::class, 'edit'])->name('edit.company');

Route::post('company-update/{id}', [App\Http\Controllers\CompaniesController::class, 'update'])->name('update.company');
Route::get('companyEditlogo', [App\Http\Controllers\CompaniesController::class, 'editlogo'])->name('editlogo.company');

Route::resource('SalesMo', SalesController::class);
Route::resource('PurchaseMp', PurchaseController::class);

Route::resource('help', HelpController::class);
Route::resource('Stores', StoresController::class);
Route::get('Add_store', [App\Http\Controllers\StoresController::class, 'create'])->name('add.store');



Route::resource('Sec_Invntories', SecondaryInventoryController::class);
// Route::get('form_trans', [App\Http\Controllers\SecondaryInventoryController::class, 'transform'])->name('submit.form_trans');
Route::post('form_trans', [App\Http\Controllers\SecondaryInventoryController::class, 'transform'])->name('form_trans');
Route::get('show_trans', [App\Http\Controllers\SecondaryInventoryController::class, 'transshow'])->name('show_trans');
Route::get('Add_inv', [App\Http\Controllers\SecondaryInventoryController::class, 'create'])->name('add.inv');
Route::post('Add-Sub', [App\Http\Controllers\SecondaryInventoryController::class, 'store'])->name('submit.inv');

Route::get('invedit/{id}', [App\Http\Controllers\SecondaryInventoryController::class, 'editinvu'])->name('edit.inv');
Route::post('updateInv/{id}', [App\Http\Controllers\SecondaryInventoryController::class, 'Updateinv'])->name('update.inv');
Route::get('DeleteInv/{id}', [App\Http\Controllers\SecondaryInventoryController::class, 'destroy'])->name('delete.inv');
Route::delete('/inventoryDeleteAll', [App\Http\Controllers\SecondaryInventoryController::class, 'deleteAll']);
//Route::get('inv-show/{id}', [App\Http\Controllers\SecondaryInventoryController::class, 'singleshow'])->name('show.inv');
Route::post('inv-Ajax1', [App\Http\Controllers\SecondaryInventoryController::class, 'update'])->name('Product.inv');

Route::get('show_inv/{id}', [App\Http\Controllers\SecondaryInventoryController::class, 'allcontents'])->name('all.con');// all products with details in each inv
Route::get('inv-Summary/{id}', [App\Http\Controllers\SecondaryInventoryController::class, 'Summary'])->name('Summary.inv');//summary of the inv
Route::get('inv-transactions', [App\Http\Controllers\SecondaryInventoryController::class, 'transa'])->name('transactions.inv');
Route::get('Transfer', [App\Http\Controllers\SecondaryInventoryController::class, 'transfer'])->name('trans.inv');
Route::get('confirm-trans/{id}', [App\Http\Controllers\SecondaryInventoryController::class, 'confirm'])->name('confirm-trans');


Route::get('Transfer_details', [App\Http\Controllers\SecondaryInventoryController::class, 'transferdetalies'])->name('trans.detailes');
Route::get('show_allinvs', [App\Http\Controllers\SecondaryInventoryController::class, 'allinve'])->name('all.invss');// all products with details in all inventories

//Route::get('show_inv', [App\Http\Controllers\SecondaryInventoryController::class, 'allcontents'])->name('all.con');

Route::get('dependent-dropdown', [SecondaryInventoryController::class, 'index']);
Route::post('api/fetch-Products', [SecondaryInventoryController::class, 'fetchproducts']);
Route::post('api/fetch-Categories', [SecondaryInventoryController::class, 'fetchcategories']);

