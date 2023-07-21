<?php

namespace Database\Seeders;
use App\Models\unit;
use App\Models\unitt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class UnittSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        unitt::create(['unit_name' => 'Meter']);
        unitt::create(['unit_name' => 'Kilogram']);
        unitt::create(['unit_name' => 'Litre']);
        unitt::create(['unit_name' => 'piece']);
        Unitt::create(['unit_name' => 'others']);

    }
}
