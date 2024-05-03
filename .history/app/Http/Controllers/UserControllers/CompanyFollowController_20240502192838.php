<?php

namespace App\Http\Controllers\UserControllers;

use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\UserActor\CompanyFollowUseCase\CompanyFollowInput;
use App\BusinessLogic\UseCases\UserActor\CompanyFollowUseCase\CompanyFollowLogic;
use App\Http\Requests\UserRequests\CompanyFollowRequest;

class CompanyFollowController extends Controller
{
    public function __invoke(CompanyFollowRequest $request){
        $data = ["userId" => auth()->user()->userId , "companyId" => $request->companyId];
        return $this->applyAspect(

            //--------------------Functional Service ------------------------------------

            new CompanyFollowLogic(
                 new CompanyFollowInput($data) ,
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
