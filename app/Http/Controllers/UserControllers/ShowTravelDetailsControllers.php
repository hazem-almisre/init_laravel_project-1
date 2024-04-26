<?php
namespace App\Http\Controllers\UserControllers;


use App\Services\Services;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\Http\Requests\UserRequests\ShowTravelDeteailsRequest;
use App\BusinessLogic\UseCases\UserActor\ShowTravelDetailsUseCase\ShowTravelDetailsInput;
use App\BusinessLogic\UseCases\UserActor\ShowTravelDetailsUseCase\ShowTravelDetailsLogic;

class ShowTravelDetailsControllers extends Controller
{
    public function __invoke(ShowTravelDeteailsRequest $showTravelDetailsRequest){



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
