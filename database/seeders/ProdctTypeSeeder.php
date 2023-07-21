<?php

namespace Database\Seeders;


use App\Models\productype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdctTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       productype::create(['name' => 'Selling Items']);
       productype::create(['name' => 'Purchase Items']);

    }
}
