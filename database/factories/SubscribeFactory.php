<?php

namespace Database\Factories;

use App\Http\Models\Subscribe;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscribeFactory extends Factory
{


    protected $model = Subscribe::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
