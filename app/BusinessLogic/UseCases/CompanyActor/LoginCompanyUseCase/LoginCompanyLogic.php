<?php
namespace App\BusinessLogic\UseCases\CompanyActor\LoginCompanyUseCase;

use App\BusinessLogic\Core\Constent;
use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Interfaces\EntityInterfaces\UserEntity;
use App\BusinessLogic\Interfaces\EntityInterfaces\CompanyEntity;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Core\Messages\ValidationMessages\ValidationMessage;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class LoginCompanyLogic implements UseCase {

    

    
  public function __construct(
    //---------------------------------------------------------------------------------------
    private LoginCompanyInput $input,  /*| Pass Request To Service*/
    //---------------------------------------------------------------------------------------
    private BaseRepositoryInterface $repository ,   // for use FrameWork from business logic ---- frameWork 
    private PresenterInterface $output,             // for present output to Views ---- Views
    private ServicesInterface $service              // frameWork services
 ){}

 
public function execute() : Result {

    
    
    // create model
    $this->repository->buildRepositoryModel( EntityType::Company ,[]);
    $company = $this->repository->readRepository()->getFirstModelByValue(Constent::$PHONE_NUMBER , $this->input->getPhoneNumber());
    

    if($company instanceof CompanyEntity ){ 
    
    //compare password
    if(!$this->service->checkPassword([
        "password"       => $this->input->getPassword(),
        "hashedPassword" => $company->getPassword()
]))return $this->output->sendFailed(null,ValidationMessage::$IncorrectPassword);


// create token
 $company['token'] = $this->service->getToken($company);
    

// return Success response
    return $this->output->sendSuccess((  new LoginCompanyOutput($company))->getOutputAsArray(),
        SuccessMessage::$loginSuccessfull );
    }
    
    return $this->output->sendFailed(null,ErrorMessage::$AccountNotFound);

    }

        
    


}

