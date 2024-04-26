<?php

namespace App\Http\Controllers\CompanyControllers;

use App\Adapters\presenters\JsonResponsePresenter;
use App\Http\Controllers\Controller;
use App\BusinessLogic\UseCases\CompanyActor\LoginCompanyUseCase\LoginCompanyInput;
use App\BusinessLogic\UseCases\CompanyActor\LoginCompanyUseCase\LoginCompanyLogic;
use App\Http\Requests\publicRequests\LoginByPhoneNumberRequest;
use App\Repository\BaseRepository;
use App\Services\Services;

class CompanyLoginController extends Controller
{
    
    public function __invoke( LoginByPhoneNumberRequest $request )
    {


        return $this->applyAspect(

        //--------------------Functional Service ------------------------------------

        new LoginCompanyLogic(new LoginCompanyInput($request->validated()),
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
