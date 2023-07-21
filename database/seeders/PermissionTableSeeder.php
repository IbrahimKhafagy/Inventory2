<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
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
            'product-create',
            'product-edit',
            'product-delete',
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
            'outedit-user',

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
            'contactlist-create',
            'contactlist-delete',


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
            'Edit-companylogo',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
