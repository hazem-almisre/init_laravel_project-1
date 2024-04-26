<?php
namespace App\Http\Controllers\AdminControllers;

use App\Services\Services;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\Http\Requests\CompanyRequests\AddCompanyRequest;
use App\BusinessLogic\UseCases\AdminActor\AddCompanyUseCase\AddCompanyInput;
use App\BusinessLogic\UseCases\AdminActor\AddCompanyUseCase\AddCompanyLogic;

class AddCompanyController extends Controller
{


    public function __invoke( AddCompanyRequest $request )
    {

    return $this->applyAspect(

        //--------------------Functional Service ------------------------------------

        new AddCompanyLogic(new AddCompanyInput($request->validated()) ,
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
