<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\CityFactory;
use Database\Factories\CountryFactory;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //(new CountryFactory())->count(1)->create();
       (new CityFactory())->count(5)->create();
    }
}
