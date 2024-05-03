<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FollowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "userId" => $this->faker->randomElement(Company::pluck('companyId')),
            "companyId" => $this->faker->randomElement(Company::pluck('companyId')),
        ];
    }
}
