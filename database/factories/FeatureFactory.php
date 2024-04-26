<?php

namespace Database\Factories;

use App\Http\Models\Company;
use App\Http\Models\Feature;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Feature::class;
    public function definition()
    {
        $name   = ["انترنت مجاني","مقاعد مريحة ", "تكييف" ," طاولة بجانب كل مقعد" ,"مقاعد مخصصة للمرضى و المسنين"];

        return [
            'feature' =>  $name[$this->faker->numberBetween(0,4)],
            "companyId"=>Company::inRandomOrder()->first()->companyId,
        ];
    }
}
