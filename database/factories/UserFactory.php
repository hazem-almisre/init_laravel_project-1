<?php

namespace Database\Factories;

use App\Http\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = User::class;
    public function definition()
    {
        random_int(0,1) == 1 ? $value = 'ذكر':$value ='انثى';
        return [
            'firstName'=> $this->faker->firstName(),
            'lastName'=>$this->faker->lastName(),
            'phoneNumber'=>$this->faker->unique()->phoneNumber(),
            'gendor'=>$value,
            'birthDay' =>$this->faker->date(),
            'password'=>Hash::make('123456789'),
            'personalId'=>'010101'.$this->faker->numberBetween(10000,99999)
        ];
    }
}



