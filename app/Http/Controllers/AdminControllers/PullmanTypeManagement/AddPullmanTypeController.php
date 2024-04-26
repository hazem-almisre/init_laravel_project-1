<?php

namespace App\Http\Controllers\AdminControllers\PullmanTypeManagement;

use App\Services\Services;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\AdminActor\PullmanManagement\AddPullmanUseCase\AddPullmanInput;
use App\BusinessLogic\UseCases\AdminActor\PullmanManagement\AddPullmanUseCase\AddPullmanLogic;
use App\BusinessLogic\UseCases\CompanyActor\FeaturesManagement\AddFeatureUseCase\AddFeatureLogic;

class AddPullmanTypeController extends Controller
{
    public function __invoke( Request  $request )
    {


        return $this->applyAspect(

        //--------------------Functional Service ------------------------------------

        new AddPullmanLogic(new AddPullmanInput($request->all()) ,
        new BaseRepository ,
        new JsonResponsePresenter,
        new Services
    ),

    //------------------Non Functional Registered--------------------------------
        [
            /*array of non functional services*/
        ]
    )->sendResult();

        }
}
