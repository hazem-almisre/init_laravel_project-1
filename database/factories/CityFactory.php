<?php

namespace Database\Factories;

use App\Http\Models\City;
use App\Http\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{


    protected $model = City::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {        

        $cities = ["دمشق","حلب", "حمص" ,"طرطوس" ,"اللاذقية","حماة"];

        return [
            'name' =>$cities[$this->faker->unique()->numberBetween(0,5)],
            'countryId' => Country::inRandomOrder()->first()->countryId,
        ];
    }
}
