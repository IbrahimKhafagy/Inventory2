<?php

namespace Database\Seeders;

use App\Models\Companies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use Faker\Generator as Faker;
class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // \App\Models\Companies::factory(1)->create();
        //Companies::factory(2)->create([
        Companies::create([
            'Company_name' => 'Chain Nest Adminstration',
            'Company_code'=>'0001',
            'Person_Name'=>'Mohammed Mamdooh',
            'Email'=>'mohmamdouh2004@yahoo.com',
            'Position'=>'Engineer',
            'Phone'=>'0100000000',
            'Company_Address'=>'Egypt',
            //'Company_Logo'=>$faker->image('public\Company_Logo\Chainnest.png'),

            'companytype_id'=>1,
    ]);
    Companies::create([
        'Company_name' => 'Chain Nest',
        'Company_code'=>'0002',
        'Person_Name'=>'Mohammed Mamdouh',
        'Email'=>'mohmamdouh@yahoo.com',
        'Position'=>'Sales Manager',
        'Phone'=>'0122365444',
        'Company_Address'=>'Egypt',
        //'Company_Logo'=>$faker->image('public\Company_Logo\Chainnest.png'),

        'companytype_id'=>2,
]);
    }
}
