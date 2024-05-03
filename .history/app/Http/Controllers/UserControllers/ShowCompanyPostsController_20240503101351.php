<?php

namespace App\Http\Controllers\UserControllers;

use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\Http\Requests\UserRequests\ShowCompanyPostsRequest;
use App\BusinessLogic\UseCases\UserActor\ShowCompanyUseCase\ShowCompanyLogic;
use App\BusinessLogic\UseCases\UserActor\ShowCompanyPostsUseCase\ShowCompanyPostsInput;

class ShowCompanyPostsController extends Controller
{
    public function __invoke(ShowCompanyPostsRequest $request){
        $data = ["userId" => auth()->user()->userId , "companyId" => $request->companyId];
        return $this->applyAspect(

            //--------------------Functional Service ------------------------------------

            new ShowCompanyLogic(
                 new ShowCompanyPostsInput($request->all()) ,
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
