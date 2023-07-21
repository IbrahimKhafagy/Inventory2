<?php

namespace Database\Seeders;

use App\Models\companytype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        companytype::create(['name' => 'Supplier']);
        companytype::create(['name' => 'Customer']);

    }
}
