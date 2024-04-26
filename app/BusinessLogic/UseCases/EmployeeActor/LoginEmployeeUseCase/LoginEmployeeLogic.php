<?php
namespace App\BusinessLogic\UseCases\EmployeeActor\LoginEmployeeUseCase;

use App\BusinessLogic\Core\Constent;
use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Interfaces\EntityInterfaces\EmployeeEntity;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Core\Messages\ValidationMessages\ValidationMessage;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class LoginEmployeeLogic implements UseCase {

    

    
public function __construct(
    //---------------------------------------------------------------------------------------
    private LoginEmployeeInput $input,  /*| Pass Request To Service*/
    //---------------------------------------------------------------------------------------
    private BaseRepositoryInterface $repository ,    // for use FrameWork from business logic ---- frameWork 
    private PresenterInterface $output,         // for present output to Views ---- Views
    private ServicesInterface $service           // frameWork services

 ){}

 
public function execute() : Result {

    
    // create model
    $this->repository->buildRepositoryModel( EntityType::Employee ,[]);
    $employee = $this->repository->readRepository()->getFirstModelByValue(Constent::$PHONE_NUMBER , $this->input->getPhoneNumber());
       
   
    if($employee instanceof EmployeeEntity ){ 
       
   
       //compare password
       if(!$this->service->checkPassword([
           "password"       => $this->input->getPassword(),
           "hashedPassword" => $employee->getPassword()
   ]))return $this->output->sendFailed(null,ValidationMessage::$IncorrectPassword);
   
   
   
   // create token
    $employee['token'] = $this->service->getToken($employee);
       
  // return view model 
    return $this->output->sendSuccess((new LoginEmployeeOutput( $employee ))->getOutputAsArray(),
        SuccessMessage::$loginSuccessfull
        );
    }


    return $this->output->sendFailed(null,ErrorMessage::$AccountNotFound);

    }


}

