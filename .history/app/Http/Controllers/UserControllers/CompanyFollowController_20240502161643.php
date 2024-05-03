<?php

namespace App\Http\Controllers\UserControllers;

use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;

class CompanyFollowController extends Controller
{
    public function __invoke(){
        return $this->applyAspect(

            //--------------------Functional Service ------------------------------------

            new CompanyFollowLogic(
                 new CompanyFollowInput($request->all()) ,
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
