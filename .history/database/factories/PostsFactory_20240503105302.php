<?php

namespace Database\Factories;

use App\Http\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $logo = [
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStMScsdrJl8hw--siY2VVR3uf277hMiyxu0S98sOsG-Q&s',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2DGDoUqVKzRD9n67_rJ3_lFbrQ8mF_kiEO5-86RhhfQ&s',
         'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ69AvjNbUANhBQtIRTM-J6qp2I3NTNlOWg5u8Dor38cw&s' ,
         'https://mir-s3-cdn-cf.behance.net/projects/404/e5a860177412671.Y3JvcCwxMzM0LDEwNDMsMjksMzUw.jpg',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwJvKoRLbe7s_s2TgUYIuZJFAW_BI5WCD9zT2Pc0FUcA&s',
         ];
        return [
            "companyId" => ,
            "content" => $this->faker->paragraph(),
            "image" => $logo[$this->faker->numberBetween(0,4)],
        ];
    }
}
