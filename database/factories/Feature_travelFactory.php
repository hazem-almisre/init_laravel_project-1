<?php

namespace Database\Factories;

use App\Http\Models\Travel;
use App\Http\Models\Feature;
use App\Http\Models\TravelFeatures;
use Illuminate\Database\Eloquent\Factories\Factory;

class Feature_travelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = TravelFeatures::class;
    public function definition()
    {
        return [
            "featureId"=>Feature::inRandomOrder()->first()->featureId,
            "travelId"=>Travel::inRandomOrder()->first()->travelId,
        ];
    }
}
