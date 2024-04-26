<?php

namespace Database\Factories;

use App\Http\Models\Company;
use App\Http\Models\Subscribe;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Company::class;

    public function definition()
    {

        $companies = ['الامير','طروادة', 'القدموس' ,'امان' ,'اجياد'];
        
        $companyName = $companies[ $this->faker->numberBetween(0,4) ] ; 
        
        $logo = ['الامير'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStMScsdrJl8hw--siY2VVR3uf277hMiyxu0S98sOsG-Q&s',
        'طروادة'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2DGDoUqVKzRD9n67_rJ3_lFbrQ8mF_kiEO5-86RhhfQ&s',
         'القدموس'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ69AvjNbUANhBQtIRTM-J6qp2I3NTNlOWg5u8Dor38cw&s' ,
         'امان'=> 'https://mir-s3-cdn-cf.behance.net/projects/404/e5a860177412671.Y3JvcCwxMzM0LDEwNDMsMjksMzUw.jpg',
         'اجياد'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwJvKoRLbe7s_s2TgUYIuZJFAW_BI5WCD9zT2Pc0FUcA&s',
         ];


        return [
            'name' =>$companyName,//$companies[$this->faker->unique()->numberBetween(0,4)],
            //'email',
            'phoneNumber' => $this->faker->unique()->phoneNumber(),
            'password'=> Hash::make('123456789'),
            "subscribeId" => Subscribe::inRandomOrder()->first()->subscribeId,
            "aboutAs" => $this->faker->text(150),
            "logo" =>$logo[$companyName],
            "isActive"=>$this->faker->boolean(),
            "recommendation" =>$this->faker->numberBetween(0 , 1500 )
        ];
    }
}
