<?php

namespace App\Http\Controllers\UserControllers;

use App\BusinessLogic\UseCases\UserActor\ShowCompanyUseCase\ShowCompanyLogic;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\ShowCompanyPostsRequest;

class ShowCompanyPostsController extends Controller
{
    public function __invoke(ShowCompanyPostsRequest $request){
        return $this->applyAspect(

            //--------------------Functional Service ------------------------------------

            new ShowCompanyLogic(
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
