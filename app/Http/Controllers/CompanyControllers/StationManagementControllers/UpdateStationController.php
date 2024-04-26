<?php
namespace App\Http\Controllers\CompanyControllers\StationManagementControllers;

use App\Services\Services;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\CompanyActor\StationsManagement\UpdateStationUseCase\UpdateStationInput;
use App\BusinessLogic\UseCases\CompanyActor\StationsManagement\UpdateStationUseCase\UpdateStationLogic;

class UpdateStationController extends Controller
{
    public function __invoke( Request  $request )
    {


        return $this->applyAspect(

        //--------------------Functional Service ------------------------------------

        new UpdateStationLogic(new UpdateStationInput($request->all()) ,
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
