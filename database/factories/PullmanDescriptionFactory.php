<?php

namespace Database\Factories;

use App\Http\Models\PullmanDescription;
use Illuminate\Database\Eloquent\Factories\Factory;

class PullmanDescriptionFactory extends Factory
{

    protected $model = PullmanDescription::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "type"=>$this->faker->name,
            "numOfSeats"=>$this->faker->numberBetween(24 , 34),
        ];
    }
}
