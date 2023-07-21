<?php

namespace Database\Seeders;
use App\Models\transactiontype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class transactiontypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        transactiontype::create(['name' => 'exist']);
        transactiontype::create(['name' => 'conversion']);
    }
}
