<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyRecommendedController extends Controller
{
    public function __invoke(Comp $request){
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
