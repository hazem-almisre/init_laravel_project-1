<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyFollowController extends Controller
{
    public function __invoke(){
        return $this->applyAspect(

            //--------------------Functional Service ------------------------------------

                 new CompanyFollowLogic( new LoginUserInput($request->all()) ,
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
