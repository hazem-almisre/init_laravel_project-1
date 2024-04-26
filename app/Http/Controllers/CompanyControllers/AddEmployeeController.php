<?php
namespace App\Http\Controllers\CompanyControllers;

use App\Adapters\presenters\JsonResponsePresenter;
use App\Http\Controllers\Controller;
use App\BusinessLogic\UseCases\CompanyActor\AddEmployeeUseCase\AddEmployeeInput;
use App\BusinessLogic\UseCases\CompanyActor\AddEmployeeUseCase\AddEmployeeLogic;
use App\Http\Requests\EmployeeRequests\AddEmployeeRequest;
use App\Repository\BaseRepository;
use App\Services\Services;

class AddEmployeeController extends Controller
{

    public function __invoke( AddEmployeeRequest $request )
    {

    return $this->applyAspect(

        //--------------------Functional Service ------------------------------------

        new AddEmployeeLogic(new AddEmployeeInput($request->validated()),
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
