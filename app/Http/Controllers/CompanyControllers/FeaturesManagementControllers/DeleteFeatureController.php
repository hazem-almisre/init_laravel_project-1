<?php

namespace App\Http\Controllers\CompanyControllers\FeaturesManagementControllers;

use App\Services\Services;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\CompanyActor\FeaturesManagement\DeleteFeatureUseCase\DeleteFeatureInput;
use App\BusinessLogic\UseCases\CompanyActor\FeaturesManagement\DeleteFeatureUseCase\DeleteFeatureLogic;

class DeleteFeatureController extends Controller
{
       public function __invoke( Request  $request )
        {
            return $this->applyAspect(
    
            //--------------------Functional Service ------------------------------------
    
            new DeleteFeatureLogic(new DeleteFeatureInput($request->all()) ,
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
