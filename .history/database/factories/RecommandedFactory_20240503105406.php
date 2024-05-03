<?php

namespace Database\Factories;

use App\Http\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecommandedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "userId" => "",
            "companyId" => $this->faker->randomElement(Company::pluck('companyId')),
        ];
    }
}
