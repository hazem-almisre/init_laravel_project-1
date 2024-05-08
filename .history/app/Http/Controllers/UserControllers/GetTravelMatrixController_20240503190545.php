<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetTravelMatrixController extends Controller
{
    public function __invoke(GetTravel $showTravelDetailsRequest){



        return $this->applyAspect(

            //--------------------Functional Service ------------------------------------

            new ShowTravelDetailsLogic(
            new ShowTravelDetailsInput($showTravelDetailsRequest->validated()),
            new BaseRepository ,
            new JsonResponsePresenter,
            new Services
             ),

        //------------------Non Functional Registered--------------------------------
            [
                /*array of non functional services*/
            ]


        )->sendResult();
    }
}
