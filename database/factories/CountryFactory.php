<?php

namespace Database\Factories;

use App\Http\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{

    protected $model = Country::class;

    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    public function definition()
    {
        return [
            'name' => 'سوريا',
        ];
    }
}
