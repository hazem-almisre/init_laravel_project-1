<?php

namespace App\Http\Controllers\CompanyControllers\FeaturesManagementControllers;

use App\Services\Services;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\CompanyActor\FeaturesManagement\AddFeatureUseCase\AddFeatureInput;
use App\BusinessLogic\UseCases\CompanyActor\FeaturesManagement\AddFeatureUseCase\AddFeatureLogic;

class AddFeatureController extends Controller
{
    public function __invoke( Request  $request )
    {


        return $this->applyAspect(

        //--------------------Functional Service ------------------------------------

        new AddFeatureLogic(new AddFeatureInput($request->all()) ,
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
