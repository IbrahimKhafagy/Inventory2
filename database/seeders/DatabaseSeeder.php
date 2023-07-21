<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(PermissionTableSeeder::class);
        $this->call(RoleSeeder::class);

        $this->call(CompanyTypeSeeder::class);
        $this->call(CompaniesSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(InventorySeeder::class);

        $this->call(ProdctTypeSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(CurrancySeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(SubcategoriesSeeder::class);

        $this->call(UnittSeeder::class);
        $this->call(transactiontypesSeeder::class);


       //\App\Models\inventory::factory(100)->create();
       // $this->call(InventorySeeder::class);





    }
}
