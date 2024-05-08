<?php

namespace App\Http\Controllers\UserControllers;

use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\Http\Requests\UserRequests\GetTravelMatrixRequest;
use App\BusinessLogic\UseCases\UserActor\GetTravelMatrixUseCase\GetTravelMatrixInput;
use App\BusinessLogic\UseCases\UserActor\GetTravelMatrixUseCase\GetTravelMatrixLogic;

class GetTravelMatrixController extends Controller
{
    public function __invoke(GetTravelMatrixRequest $showTravelDetailsRequest){


        $data = ["userId" => auth()->user()->userId]
        return $this->applyAspect(

            //--------------------Functional Service ------------------------------------

            new GetTravelMatrixLogic(
            new GetTravelMatrixInput($showTravelDetailsRequest->validated()),
            new BaseRepository ,
            new JsonResponsePresenter,
            ),

        //------------------Non Functional Registered--------------------------------
            [
                /*array of non functional services*/
            ]


        )->sendResult();
    }
}
