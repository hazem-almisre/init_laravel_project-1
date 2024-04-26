<?php

namespace Database\Factories;

use App\Http\Models\Company;
use App\Http\Models\Station;
use Illuminate\Database\Eloquent\Factories\Factory;

class StationFactory extends Factory
{

    protected $model = Station::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      
        $cities = ["دمشق","حلب", "حمص" ,"طرطوس" ,"اللاذقية","حماة"];
        $name   = ["كراج البولمان","كراج العباسيين", "السومرية" ,"شارع بغداد" ,"شارع الثورة","ساحة باب توما","ساحة السبع بحرات"];

        return [
            'city' =>$cities[$this->faker->numberBetween(0,5)],
            "name" => $name[$this->faker->numberBetween(0,6)],
            "companyId"=>Company::inRandomOrder()->first()->companyId,
        ];
    }
}
