<?php

namespace Database\Factories;

use App\Http\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Admin::class;
    
    public function definition()
    {
        return [
            'name'=>$this->faker->firstName(), 
            //'email',
            'phoneNumber' => $this->faker->unique()->phoneNumber(),
            'password'=> Hash::make('123456789'),
        ];
    }
}
