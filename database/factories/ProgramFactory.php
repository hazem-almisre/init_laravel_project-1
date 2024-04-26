<?php

namespace Database\Factories;

use App\Http\Models\Company;
use App\Http\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{

    protected $model = Program::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cities = ["دمشق","حلب", "حمص" ,"طرطوس" ,"اللاذقية","حماة"];
        
        return [
            "from"=> $cities[$this->faker->numberBetween(0,5)],
            "to"=>$cities[$this->faker->numberBetween(0,5)],
            "companyId"=>Company::inRandomOrder()->first()->companyId,
            'start'=>$this->faker->date('Y-m-d'),
            'end'=>$this->faker->date('Y-m-d'),
        ];

    }
}
