<?php

namespace Database\Factories;

use App\Http\Models\Company;
use App\Http\Models\Follow;
use App\Http\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FollowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Follow::class;

    public function definition()
    {
        return [
            "userId" => $this->faker->randomElement(User::pluck('userId')),
            "companyId" => $this->faker->randomElement(Company::pluck('companyId')),
        ];
    }
}
