<?php

namespace Database\Seeders;

use App\Http\Models\User;
use App\Http\Models\Admin;
use App\Http\Models\Series;
use Illuminate\Database\Seeder;
use App\Http\Models\SeriesStation;
use Database\Factories\CityFactory;
use Database\Factories\UserFactory;
use Database\Factories\AdminFactory;
use Database\Factories\TravelFactory;
use Database\Factories\CompanyFactory;
use Database\Factories\CountryFactory;
use Database\Factories\FeatureFactory;
use Database\Factories\ProgramFactory;
use Database\Factories\Series_Factory;
use Database\Factories\StationFactory;
use Database\Factories\SubscribeFactory;
use Database\Factories\Feature_travelFactory;
use Database\Factories\Series_StationFactory;
use Database\Factories\PullmanDescriptionFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        (new CountryFactory())->count(1)->create();
        (new CityFactory())->count(5)->create();
        (new SubscribeFactory())->count(3)->create();
        (new CompanyFactory())->count(6)->create();
        (new PullmanDescriptionFactory())->count(2)->create();
        (new ProgramFactory())->count(10)->create();
        (new StationFactory())->count(20)->create();
        (new Series_Factory())->count(2)->create();
        (new Series_StationFactory())->count(10)->create();
        (new TravelFactory())->count(300)->create();
        (new FeatureFactory())->count(5)->create();
        (new Feature_travelFactory())->count(900)->create();

    //  (new AdminFactory())->count(5)->create();
    //  (new UserFactory())->count(25)->create();



        // Admin::factory()->count(5)->create();
        // User::factory()->create();
        // \App\Models\User::factory(10)->create();
    }
}
