<?php

namespace App\Http\Controllers\UserControllers;

use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\UserActor\CompanyRecommendedUseCase\CompanyRecommendedInput;
use App\BusinessLogic\UseCases\UserActor\CompanyRecommendedUseCase\CompanyRecommendedLogic;
use App\Http\Requests\UserRequests\CompanyRecommendedRequest;

class CompanyRecommendedController extends Controller
{
    public function __invoke(CompanyRecommendedRequest $request){
        $data = ["userId" => auth()->user()->userId , "companyId" => $request->companyId];
        return $this->applyAspect(

            //--------------------Functional Service ------------------------------------

            new CompanyRecommendedLogic(
                 new CompanyRecommendedInput($data) ,
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
