<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user1 = User::create([
            'name' => 'Fatima Zayed',
            'email' => 'admin@gmail.com',
            'Phone' =>'0122365444',
            'password' => bcrypt('123456789'),
            // 'roles_name' => ["SystemAdmin"],
            'Status' => 'Active',
            'companies_id'=>'1',
        ]);
        $user2 = User::create([
            'name' => 'Mohammed Mamdooh',
            'email' => 'mohmamdouh2004@yahoo.com',
            'Phone' =>'0122365444',
            'password' => bcrypt('123456789'),
            // 'roles_name' => ["adminchain"],
            'Status' => 'Active',
            'companies_id'=>'1',
        ]);
        $user3 = User::create([
            'name' => 'Mohammed Mamdouh',
            'email' => 'mohmamdouh@yahoo.com',
            'Phone' =>'0122365444',
            'password' => bcrypt('123456789'),
            // 'roles_name' => ["adminchain"],
            'Status' => 'Active',
            'companies_id'=>'2',
        ]);

        $role = Role::where('name' , 'System_Admin')->first();

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user1->assignRole($role->id);
        $user2->assignRole(2);
        $user3->assignRole(3);

    }
}
