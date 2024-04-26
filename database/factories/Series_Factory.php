<?php

namespace Database\Factories;

use App\Http\Models\Series;
use App\Http\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class Series_Factory extends Factory
{

    protected $model = Series::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
         $name= ['محطات خط دمشق - حلب 1','محطات خط دمشق - حلب 2'];
        return [
            "companyId"=>Company::inRandomOrder()->first()->companyId,
            'seriesName'=> $name[$this->faker->numberBetween(0,1)],
            
        ];
    }
}
