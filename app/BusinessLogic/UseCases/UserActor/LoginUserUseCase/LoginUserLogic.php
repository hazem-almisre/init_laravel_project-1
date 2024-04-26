<?php
namespace App\BusinessLogic\UseCases\UserActor\LoginUserUseCase;

use App\BusinessLogic\Core\Constent;
use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Interfaces\EntityInterfaces\UserEntity;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Core\Messages\ValidationMessages\ValidationMessage;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;


class LoginUserLogic implements UseCase {

    

    
public function __construct(
    //---------------------------------------------------------------------------------------
    private LoginUserInput $input,  /*| Pass Request To Service*/
    //---------------------------------------------------------------------------------------
    private BaseRepositoryInterface $repository ,   // for use FrameWork from business logic ---- frameWork 
    private PresenterInterface $output,             // for present output to Views ---- Views
    private ServicesInterface $service              // frameWork services
 ){}

 
public function execute() : Result {

    
    
    // create model
    $this->repository->buildRepositoryModel( EntityType::User ,[]);
    $user = $this->repository->readRepository()->getFirstModelByValue(Constent::$PHONE_NUMBER , $this->input->getPhoneNumber());
    

    if($user instanceof UserEntity ){ 
    

    //compare password
    if(!$this->service->checkPassword([
        "password"       => $this->input->getPassword(),
        "hashedPassword" => $user->getPassword()
]))return $this->output->sendFailed(null,ValidationMessage::$IncorrectPassword);


// create token
 $user['token'] = $this->service->getToken($user);
    

// return Success response
    return $this->output->sendSuccess((  new LoginUserOutput($user))->getOutputAsArray(),
        SuccessMessage::$loginSuccessfull );
    }
    
    return $this->output->sendFailed(null,ErrorMessage::$AccountNotFound);

    }


}

