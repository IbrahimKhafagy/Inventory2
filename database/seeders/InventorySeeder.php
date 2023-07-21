<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Companies;
use App\Models\currancy;
use App\Models\inventory;
use App\Models\managesku;
use App\Models\productype;
use App\Models\Subcategories;
use App\Models\unitt;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


       inventory::create([
        'inv_name' => 'Main Inventory',
        'address'=>'October',
        'manager'=>'Mohamed',
        'Phone'=>'0122365444',
        'Email'=>'mohmamdouh@yahoo.com',
        'Inventory_Type'=>'Main',
        'companies_id'=>'0001',
        'users_id'=>'3',



    ]);
  /*  inventory::create([
        'inv_name' => 'Sub Chain_inventory',
        'address'=>'5th',
        'manager'=>'Noha',
        'Phone'=>'0122568724',
        'Email'=>'Noha@yahoo.com',
        'Inventory_Type'=>'Sub',
        'companies_id'=>'0001',
        'users_id'=>'3',



    ]);
*/





        /*$Faker =\Faker\Factory::create();
        {
            for($i =1 ; $i<=20 ; $i++)
            {
                inventory::create([
                    'companies_id'=> Companies::inRandomOrder()->first()->id,
                    'categories_id'=> Categories::inRandomOrder()->get(),
                    'subcategories_id'=> Subcategories::inRandomOrder()->get(),

                    'productype_id'=> productype::inRandomOrder()->get(),
                    'managesku_id'=> managesku::inRandomOrder()->get(),
                    'users_id'=> User::inRandomOrder()->get(),
                    'unit_id'=> unitt::inRandomOrder()->get(),

                    'currancy_id'=> currancy::inRandomOrder()->get(),

                    'Product_name' => $Faker->sentence(1),
                    'Part_No' =>$Faker->sentence(2),
                    'Vendor' => $Faker->sentence(1),
                    'Supplier' => $Faker->sentence(1),
                    'BIN' => $Faker->sentence(1),
                    'QTY' => $Faker->numberBetween(2,160),
                    'Reorder_QTY' => $Faker->numberBetween(1,150),
                    'Consumption_Rate' => $Faker->numberBetween(1,140),
                    'per' => $Faker->sentence(1),
                    'Price' => $Faker->numberBetween(20000,970000),
                    'Location' => $Faker->sentence(2),
                    'Cost' => $Faker->numberBetween(60000,150000),
                    'Reorder_Date' => $Faker->date(),
                    'Other_Features' => $Faker->sentence(2),
                    'Product_Manager' => $Faker->sentence(1),
                    'cost_each' => $Faker->numberBetween(2001,568000),
                    'Description' => $Faker->paragraph(),
                    'Availbility' => $Faker->sentence(1),



                ]);

            }


        }*/
    }
}
