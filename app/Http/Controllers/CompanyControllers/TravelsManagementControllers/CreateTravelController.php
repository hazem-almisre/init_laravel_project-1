<?php

namespace App\Http\Controllers\CompanyControllers\TravelsManagementControllers;

use App\Services\Services;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\CompanyActor\TravelsManagement\CreateTravelUseCase\CreateTravelInput;
use App\BusinessLogic\UseCases\CompanyActor\TravelsManagement\CreateTravelUseCase\CreateTravelLogic;

class CreateTravelController extends Controller
{
    public function __invoke( Request  $request )
    {

        

        return $this->applyAspect(

        //--------------------Functional Service ------------------------------------

        new CreateTravelLogic(new CreateTravelInput($request->all()) ,
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
