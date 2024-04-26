<?php

namespace Database\Factories;

use App\Http\Models\Series;
use App\Http\Models\Station;
use App\Http\Models\SeriesStation;
use Illuminate\Database\Eloquent\Factories\Factory;


class Series_StationFactory extends Factory
{

    protected $model = SeriesStation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        $station = Station::inRandomOrder()->first();
        return [
            "stationId"=>$station->stationId,
            "seriesId"=>Series::inRandomOrder()->first()->seriesId,
            "ExpectedArrivalTime"=>$this->faker->time(),
            'city' =>$station->city,
            "name" =>$station->name,
        ];
    }
}
