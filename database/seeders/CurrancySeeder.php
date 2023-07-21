<?php

namespace Database\Seeders;

use App\Models\currancy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        currancy::create(['name' => 'USD']);
       currancy::create(['name' => 'EUR']);
       currancy::create(['name' => 'GBP']);
       currancy::create(['name' => 'EGP']);
       currancy::create(['name' => 'JPY']);
       currancy::create(['name' => 'NZD']);
       currancy::create(['name' => 'QAR']);
       currancy::create(['name' => 'SAR']);
       currancy::create(['name' => 'AED']);
       currancy::create(['name' => 'CAD']);


    }
}
