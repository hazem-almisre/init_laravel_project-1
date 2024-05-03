<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\ShowCompanyPostsRequest;

class ShowCompanyPostsController extends Controller
{
    public function __invoke(ShowCompanyPostsRequest $request){
        $data = ["userId" => auth()->user()->userId , "companyId" => $request->companyId];
        return $this->applyAspect(

            //--------------------Functional Service ------------------------------------

            new Show(
                 new CompanyRecommendedInput($data) ,
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
