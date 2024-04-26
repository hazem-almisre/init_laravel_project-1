<?php
namespace App\Http\Controllers\UserControllers;

use App\Services\Services;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\Http\Requests\UserRequests\RegisterUserRequest;
use App\BusinessLogic\UseCases\UserActor\RegisterUserUseCase\RegisterUserInput;
use App\BusinessLogic\UseCases\UserActor\RegisterUserUseCase\RegisterUserLogic;

class RegisterUserController extends Controller
{
    public function __invoke( RegisterUserRequest  $request )
    {


        return $this->applyAspect(

        //--------------------Functional Service ------------------------------------

        new RegisterUserLogic(new RegisterUserInput($request->validated()) ,
        new BaseRepository ,
        new JsonResponsePresenter,
        new Services),

    //------------------Non Functional Registered--------------------------------
        [
            /*array of non functional services*/
        ]


)->sendResult();

}

}
