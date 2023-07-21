<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Companies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
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
           for($i =1 ; $i<=4 ; $i++)
          {
               Categories::create([
                  'companies_id'=> Companies::inRandomOrder()->first()->id,
                  'Category' => $Faker->sentence(1),
                   'Description' =>$Faker->paragraph(5),

              ]);

         }


       }
    }
}
