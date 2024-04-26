<?php
namespace App\BusinessLogic\UseCases\AdminActor\LoginAdminUseCase;

use App\BusinessLogic\Core\Constent;
use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Interfaces\EntityInterfaces\AdminEntity;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Core\Messages\ValidationMessages\ValidationMessage;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class LoginAdminLogic implements UseCase {

    

    
public function __construct(
    //---------------------------------------------------------------------------------------
    private LoginAdminInput $input,  /*| Pass Request To Service*/
    //---------------------------------------------------------------------------------------
    private BaseRepositoryInterface $repository ,   // for use FrameWork from business logic ---- frameWork 
    private PresenterInterface $output ,       // for present output to Views ---- Views
    private ServicesInterface $service           // frameWork services
 ){}

 
public function execute() : Result {
    
    // create model
    $this->repository->buildRepositoryModel(EntityType::Admin ,[]);
    $admin = $this->repository->readRepository()->getFirstModelByValue(Constent::$PHONE_NUMBER , $this->input->getPhoneNumber());
    

    // return $admin->admin->
    if($admin instanceof AdminEntity ){ 


      
    //compare password
    if(!$this->service->checkPassword([
        "password"       => $this->input->getPassword(),
        "hashedPassword" => $admin->getPassword()
]))return $this->output->sendFailed(null,ValidationMessage::$IncorrectPassword);


 // create token
 $admin['token'] = $this->service->getToken($admin);
    

  // return success response
    return $this->output->sendSuccess(
        (new LoginAdminOutput($admin ))->getOutputAsArray(),
        'Admin '.SuccessMessage::$loginSuccessfull
        );
    }

    return $this->output->sendFailed(null,ErrorMessage::$AccountNotFound);

  }


}

