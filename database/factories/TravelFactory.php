<?php

namespace Database\Factories;

use App\Http\Models\Series;
use App\Http\Models\Travel;
use App\Http\Models\Company;
use App\Http\Models\Program;
use App\Http\Models\PullmanDescription;
use Illuminate\Database\Eloquent\Factories\Factory;

class TravelFactory extends Factory
{

    protected $model = Travel::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $cities = ["دمشق","حلب", "حمص" ,"طرطوس" ,"اللاذقية","حماة"];
        $period = ['morning', 'noon','afternoon','evening','night'];
        $day = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
        $number = $this->faker->numberBetween(0,1);
        $number2 = 0;
        if($number == 0 ) 
        {
            $number2 =1; 
        }
        
        return [
            'programId'=>Program::inRandomOrder()->first()->programId,
            "from"=> $cities[ $number],
            "to"=>$cities[$number2],
            'travelDate'=>$this->faker->dateTimeBetween('2024-04-10' ,'2024-5-1')->format('Y-m-d') ,
            'timeToLeave'=>$this->faker->time(),
            "price"=>$this->faker->numberBetween(40000,90000 ),
            "numOfSeatsBooking"=>$this->faker->numberBetween(0,24),
            'numOfSeats'=>24,
            'day'=>$day[$this->faker->numberBetween(0,6)],
            'DailySerialNumber'=>$this->faker->numberBetween(1,15),
            'periodName'=> $period[$this->faker->numberBetween(0,4)],
            "notes"=>$this->faker->text(150),
            "available"=>$this->faker->boolean(80),
            "isVIP"=>$this->faker->boolean(10),
            "seriesId"=>Series::inRandomOrder()->first()->seriesId,
            "pullmanDescriptionId"=>PullmanDescription::inRandomOrder()->first()->pullmanDescriptionId,
            "companyId"=>Company::inRandomOrder()->first()->companyId,
            
        ];
    }
}
