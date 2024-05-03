<?php
namespace App\Factories;


use App\Http\Models\City;
use App\Http\Models\User;
use App\Http\Models\Admin;
use App\Http\Models\Series;
use App\Http\Models\Travel;
use App\Http\Models\Company;
use App\Http\Models\Feature;
use App\Http\Models\Station;
use App\Http\Models\Employee;
use App\Http\Models\SeriesStation;
use App\Http\Models\TravelStation;
use App\Http\Models\TravelFeatures;
use App\Http\Models\PullmanDescription;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Interfaces\EntityInterfaces\BaseEntity;

class FactoryModel  
{

    public function make(EntityType $type, $data) :BaseEntity
    {    
        // Add a New Modle to Factory here..
        //------------------------------------- 
        
        $model = 
        [
            'user'                  =>(new User( $data)),  
            'admin'                 =>(new Admin( $data)),
            'employee'              =>(new Employee($data)),
            'company'               =>(new Company( $data)),
            'station'               =>(new Station($data)),
            'travel'                =>(new Travel($data)),
            'city'                  =>(new City($data)),
            'feature'               =>(new Feature($data)),
            'pullmanDescription'    =>(new PullmanDescription($data)),
            'travelStation'         =>(new TravelStation($data)),
            'travelFeature'         =>(new TravelFeatures($data)),
            'seriesStation'         =>(new SeriesStation($data)),
            'series'                =>(new Series($data)),

        ];
                
        return $model[$type->value];
    }
}
