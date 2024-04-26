<?php
namespace App\Http\Controllers\EmployeeControllers;

use App\Adapters\presenters\JsonResponsePresenter;
use App\Http\Controllers\Controller;
use App\BusinessLogic\UseCases\EmployeeActor\LoginEmployeeUseCase\LoginEmployeeInput;
use App\BusinessLogic\UseCases\EmployeeActor\LoginEmployeeUseCase\LoginEmployeeLogic;
use App\Http\Requests\publicRequests\LoginByPhoneNumberRequest;
use App\Repository\BaseRepository;
use App\Services\Services;

class EmployeeLoginController extends Controller
{


    public function __invoke( LoginByPhoneNumberRequest $request )
    {

       return $this->applyAspect(

        //--------------------Functional Service ------------------------------------

        new LoginEmployeeLogic( new LoginEmployeeInput($request->validated()),
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