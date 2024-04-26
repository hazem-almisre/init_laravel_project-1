<?php
namespace App\Http\Controllers\CompanyControllers\StationManagementControllers;


use App\Services\Services;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\CompanyActor\StationsManagement\AddStationUseCase\AddStationInput;
use App\BusinessLogic\UseCases\CompanyActor\StationsManagement\AddStationUseCase\AddStationLogic;

class AddStationController extends Controller
{
        
    public function __invoke( Request  $request )
    {


        return $this->applyAspect(

        //--------------------Functional Service ------------------------------------

        new AddStationLogic(new AddStationInput($request->all()) ,
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
