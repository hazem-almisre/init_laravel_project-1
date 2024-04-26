<?php
namespace App\Http\Controllers\AdminControllers;

use App\Adapters\presenters\JsonResponsePresenter;
use App\Http\Controllers\Controller;
use App\BusinessLogic\UseCases\AdminActor\LoginAdminUseCase\LoginAdminInput;
use App\BusinessLogic\UseCases\AdminActor\LoginAdminUseCase\LoginAdminLogic;
use App\Http\Requests\publicRequests\LoginByPhoneNumberRequest;
use App\Repository\BaseRepository;
use App\Services\Services;

class AdminLoginController extends Controller
{
    public function __invoke( LoginByPhoneNumberRequest $request )
    {

   return $this->applyAspect(

    //--------------------Functional Service ------------------------------------

        new LoginAdminLogic(new LoginAdminInput($request->validated()) ,
        new BaseRepository ,
        new JsonResponsePresenter,
        new Services
    ),

    //------------------Non Functional Registered--------------------------------
        [
            /*array of non fanctional services*/
        ]
)->sendResult();
        
    }





}
