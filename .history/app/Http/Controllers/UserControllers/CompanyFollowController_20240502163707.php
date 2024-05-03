<?php

namespace App\Http\Controllers\UserControllers;

use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\UserActor\CompanyFollowUseCase\CompanyFollowInput;
use App\BusinessLogic\UseCases\UserActor\CompanyFollowUseCase\CompanyFollowLogic;

class CompanyFollowController extends Controller
{
    public function __invoke(Company){
        return $this->applyAspect(

            //--------------------Functional Service ------------------------------------

            new CompanyFollowLogic(
                 new CompanyFollowInput($request->all()) ,
                 new BaseRepository ,
                 new JsonResponsePresenter,
            ),

            //------------------Non Functional Registered--------------------------------
                        [
                            /*array of non fanctional services*/
                        ]


            )->sendResult();


    }
}
