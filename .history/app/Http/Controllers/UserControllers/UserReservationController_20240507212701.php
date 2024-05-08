<?php

namespace App\Http\Controllers\UserControllers;

use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\Http\Requests\UserRequests\UserReservationRequest;
use App\BusinessLogic\UseCases\UserActor\UserReservationUseCase\UserReservationInput;
use App\BusinessLogic\UseCases\UserActor\UserReservationUseCase\UserReservationLogic;

class UserReservationController extends Controller
{
    public function __invoke(UserReservationRequest $userReservationRequest)
    {

        $data = $userReservationRequest->all();

        $data['userId'] = auth()->user()->userId;
        
        return $this->applyAspect(

            //--------------------Functional Service ------------------------------------

            new UserReservationLogic(
            new UserReservationInput($data),
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
