<?php
namespace App\BusinessLogic\UseCases\AdminActor\AddCompanyUseCase;


use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;
use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;

class AddCompanyLogic implements UseCase {

    
    public function __construct(
        //---------------------------------------------------------------------------------------
        private AddCompanyInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository,    // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output ,            // for present output to Views ---- Views
        private ServicesInterface $service               // frameWork services
    
    ){}
    
    // execute create entity service
    public function execute(): Result{
    
        
    

    $this->input->setPassword( $this->service->hashData($this->input->getPassword()));
    
    //Create Model
    $this->repository->buildRepositoryModel(EntityType::Company , []);
    
    //insert to dataBase
    $company = $this->repository->createRepository()->create($this->input->toArray());
    
    // if model is not created
    if($company == null) return $this->output->sendFailed(null, ErrorMessage::$errorOccurred); 
        
    // return response  
    return $this->output->sendSuccess(
    (new AddCompanyOutput($company))->getOutputAsArray(),
            SuccessMessage::$registerSuccessfully
        );
    
    
       
    }
    
    
}
