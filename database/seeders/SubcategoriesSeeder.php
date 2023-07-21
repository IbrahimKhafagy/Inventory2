<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Subcategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $Faker =\Faker\Factory::create();
       {
          for($i =1 ; $i<=8 ; $i++)
        {
              Subcategories::create([
                  'categories_id'=> Categories::inRandomOrder()->first()->id,
                 'Subcategory' => $Faker->sentence(1),
                  'Description' =>$Faker->paragraph(5),

               ]);

          }


      }
    }
}
