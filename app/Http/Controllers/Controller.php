<?php

namespace App\Http\Controllers;

use App\BusinessLogic\Core\InternalInterface\UseCase;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


public static function applyAspect (UseCase $service ,  $register = [ ] )
{
    
        //apply non functional services befor execute the functional service
        foreach ($register  as $nonFunctionalService )
        {
            $nonFunctionalService->befor($service);
        }


        //------------------------------------------

        $result = $service->execute(); //execute service

        //------------------------------------------


        //apply non functional services after execute the functional service
        foreach ($register  as $nonFunctionalService )
        {
            $nonFunctionalService->after($service);
        }
        
        return $result;
    }
}
