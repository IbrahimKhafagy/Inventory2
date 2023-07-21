<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'System_Admin', 'level'=>0]);
        Role::create(['name' => 'Administration Chainnest', 'level'=>1])->syncPermissions([

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'role-show',



            'permission_list',
            'permission_create',
            'permission_edit',
            'permission_delete',



            'inventory-list',
           // 'product-create',
           // 'product-edit',
            //'product-delete',
            'product-show',
            'Notifi-company-contact',



            'unit-list',
            'unit-create',
            'unit-show',
            'unit-edit',
            'unit-delete',

            'companytype-list',
            'companytype-create',
            'companytype-Edit',
            'companytype-Show',
            'companytype-delete',

            'productype-list',
            'productype-create',
            'productype-edit',
            'productype-show',
            'productype-delete',

            'users-list',
            'users-create',
            'users-edit',
            'users-delete',
            'users-show',


            'Categories-list',
           'Categoeies-create',
            'categories-edit',
           'categoeies-delete',


            'Subcategories-list',
            'Subcategories-create',
            'Subcategories-edit',
'Subcategories-delete',


            'Companies-list',
            'Companies-create',
            'Companies-delete',


            'Companiesreq-list',
            'Companiesreq-edit',
            'Companiesreq-delete',

            'management',
            'sku-list',


            'team',
            'team-list',
            'team-create',
            'team-delete',



            'contactlist-list',
           // 'contactlist-create',
           // 'contactlist-delete',


            'COMPONENTS',
            'pendingitem-list',
            'orders-list',
            'status',
           'Sections',
           'show-companyname',

            'lists',
            'customer-list',
            'supplier-list',
            'product-list',
            'material-list',
            'price',
            'Chainnest_Price',

            'currancy-list',
            'currancy-edit',
            'currancy-delete',
            'currancy-create',
            'Ask-Notification',


        ]);
        Role::create(['name' => 'admin','level'=>2])->syncPermissions([
            'role-show',
           // 'permission_list',

            'inventory-list',
            'product-create',
            'product-edit',
            'product-delete',
            'product-show',


            'unit-list',
            'unit-create',
            'unit-show',


           // 'companytype-list',
           // 'productype-list',

            'management',
            'users-list',
            'users-create',
            'users-edit',
            'users-delete',
            'users-show',
             'outedit-user',
            'Categories-list',
            'Categoeies-create',
            'categories-edit',
            'categoeies-delete',


            'Subcategories-list',
            'Subcategories-create',
            'Subcategories-edit',
            'Subcategories-delete',


            'contactlist-list',
            'contactlist-create',
            'contactlist-delete',

            'COMPONENTS',
            'Sections',
            'price',
           // 'Chainnest_Price',
            'currancy-create',
            'currancy-list',
            'Ask-Notification',
            'Edit-companylogo',
        ]);

       /* Role::create(['name' => 'admincompany1','level'=>3])->syncPermissions(['role-show',
           // 'permission_list',

            'inventory-list',
            'product-create',
            'product-edit',
            'product-delete',
            'product-show',

            'unit-list',
            'unit-create',
            'unit-show',
           // 'unit-edit',

           // 'companytype-list',
            'productype-list',

            'management',
            'users-list',
            'users-create',
            'users-edit',
            'users-delete',
            'users-show',

            'Categories-list',
            'Categoeies-create',
            'categories-edit',
            'categoeies-delete',


            'Subcategories-list',
            'Subcategories-create',
            'Subcategories-edit',
            'Subcategories-delete',


            'contactlist-list',
            'contactlist-create',
            'contactlist-delete',

            'COMPONENTS',
            'Sections',
            'price',


            'currancy-list',

  ]);*/

       Role::create(['name' => 'user','level'=>4])->syncPermissions([
        'inventory-list',
            'product-create',
            'product-edit',
            'product-delete',
            'product-show',


            'unit-list',
            'unit-create',
            'unit-show',
           // 'unit-edit',

           // 'companytype-list',
           // 'productype-list',
           'management',

           'outedit-user',

            'Categories-list',
            'Categoeies-create',
            'categories-edit',
            'categoeies-delete',


            'Subcategories-list',
            'Subcategories-create',
            'Subcategories-edit',
            'Subcategories-delete',


            'contactlist-list',
            'contactlist-create',
            'contactlist-delete',

            'COMPONENTS',
            'Sections',
            'price',


            'currancy-list',
            'Ask-Notification',




        ]);

    }
}
