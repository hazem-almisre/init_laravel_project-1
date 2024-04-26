<?php

namespace App\Http\Controllers\UserControllers;

use App\Adapters\presenters\JsonResponsePresenter;
use App\Http\Controllers\Controller;
use App\BusinessLogic\UseCases\UserActor\LoginUserUseCase\LoginUserInput;
use App\BusinessLogic\UseCases\UserActor\LoginUserUseCase\LoginUserLogic;
use App\Http\Requests\publicRequests\LoginByPhoneNumberRequest;
use App\Repository\BaseRepository;
use App\Services\Services;

class UserLoginController extends Controller
{


    public function __invoke( LoginByPhoneNumberRequest $request )
    {   

    return $this->applyAspect(

//--------------------Functional Service ------------------------------------

     new LoginUserLogic( new LoginUserInput($request->all()) ,
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
