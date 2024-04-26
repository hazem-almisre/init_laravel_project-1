<?php

namespace App\Http\Controllers\UserControllers;

use App\Services\Services;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\UserActor\ShowCompanyUseCase\ShowCompanyLogic;

class ShowCompanyController extends Controller
{
    public function __invoke( Request  $request )
    {


        return $this->applyAspect(

        //--------------------Functional Service ------------------------------------

        new ShowCompanyLogic(
        new BaseRepository ,
        new JsonResponsePresenter,
        new Services),

    //------------------Non Functional Registered--------------------------------
        [
            /*array of non functional services*/
        ]


)->sendResult();

}
}
