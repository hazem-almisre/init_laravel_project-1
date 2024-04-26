<?php

namespace App\Http\Controllers\CompanyControllers;


use App\Services\Services;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;

class CreateProgramController extends Controller
{

    public function __invoke()
    {

        // $stations = [
        //     [
        //         'stationId' => 7,
        //         'ArrivalTime'=>'9:30',
        //     ],
        //     [
        //         'stationId' => 2,
        //         'ArrivalTime'=>'10:30',
        //     ],
        //     [
        //         'stationId' => 5,
        //         'ArrivalTime'=>'11:30',
        //     ],
        //     [
        //         'stationId' => 9,
        //         'ArrivalTime'=>'12:30',
        //     ],
        // ];
        
    
        // $features =[
        //     [
        //         'featureId'=>5 ,
        //     ],
        //     [
        //         'featureId'=>8 ,
        //     ],
        //     [
        //         'featureId'=>4 ,
        //     ],
        //     [
        //         'featureId'=>2 ,
        //     ],
        //     [
        //         'featureId'=>13 ,
        //     ],
        // ];


        // $travel =
        // [
        //     'programId' => 5,
        //     'timeToLeave' => '4-7-2024',
        //     'price'=> 60000,
        //     'pullmanId'=>5,
        //     'note'=>'TextTextTextTextTextTextTextTextText ',
        //     'isVip'=>true,
        //     'busNumber' =>17,
        //     'DailySerialNumber' =>17567999655,
        //     'stations' => $stations ,
        //     'features' => $features ,
        // ];
    
        // $data = [
        //     'start' => '4-6-2024' ,
        //     'End' => '4-7-2024',
        //     'from'=> 5 ,
        //     'to'=> 3 ,
        //     'companyId'=> 7 ,
        //     'Tuesday'=> [$travel,$travel],
        //     'Wednesday'=> [],
        //     'Thursday'=> [$travel,$travel],
        //     'Friday'=> [$travel ,$travel,$travel],
        //     // Saturday  Sunday  Monday
            
        // ];
  
        // $days = (new Services)->DateServices()->getDaysBetween('4-7-2024','15-7-2024');
        
        // return response()->json($days);

        return $this->applyAspect(

            //--------------------Functional Service ------------------------------------
    
            new LoginCompanyLogic(new LoginCompanyInput($request->validated()),
            new BaseRepository ,
            new JsonResponsePresenter,
            new Services),
    
        //------------------Non Functional Registered--------------------------------
            [
                /*array of non fanctional services*/
            ]
    
    
    )->sendResult();
        
        
        
    }

    
}
