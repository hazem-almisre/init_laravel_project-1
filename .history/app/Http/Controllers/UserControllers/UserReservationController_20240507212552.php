<?php

namespace App\Http\Controllers\UserControllers;

use App\BusinessLogic\UseCases\UserActor\UserReservationUseCase\UserReservationInput;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\UserReservationRequest;
use Illuminate\Http\Request;

class UserReservationController extends Controller
{
    public function __invoke(UserReservationRequest $userReservationRequest)
    {

        $data = $userReservationRequest->all();

        $data['userId'] = auth()->user()->userId;
        return $this->applyAspect(

            //--------------------Functional Service ------------------------------------

            new GetTravelMatrixLogic(
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
