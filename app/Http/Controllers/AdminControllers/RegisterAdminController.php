<?php
namespace App\Http\Controllers\AdminControllers;

use App\Adapters\presenters\JsonResponsePresenter;
use App\Http\Controllers\Controller;
use App\BusinessLogic\UseCases\AdminActor\RegisterAdminUseCase\RegisterAdminInput;
use App\BusinessLogic\UseCases\AdminActor\RegisterAdminUseCase\RegisterAdminLogic;
use App\Http\Requests\AdminRequests\RegisterAdminRequest;
use App\Repository\BaseRepository;
use App\Services\Services;

class RegisterAdminController extends Controller
{


    public function __invoke( RegisterAdminRequest $request )
    {

    return $this->applyAspect(

        //--------------------Functional Service ------------------------------------

        new RegisterAdminLogic(new RegisterAdminInput($request->validated()) , 
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
