<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\GetTravelMatrixRequest;
use Illuminate\Http\Request;

class GetTravelMatrixController extends Controller
{
    public function __invoke(GetTravelMatrixRequest $showTravelDetailsRequest){



        return $this->applyAspect(

            //--------------------Functional Service ------------------------------------

            new (
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
