<?php
namespace App\BusinessLogic\UseCases\CompanyActor\AddEmployeeUseCase;

use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;
use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;

class AddEmployeeLogic implements UseCase {


    public function __construct(
        //---------------------------------------------------------------------------------------
        private AddEmployeeInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork
        private PresenterInterface $output, // for present output to Views ---- Views
        private ServicesInterface $service    // helper functions
 
){}

    // execute create entity service
    public function execute(): Result{



        $this->input->setPassword( $this->service->hashData($this->input->getPassword()));

        $this->repository->buildRepositoryModel(EntityType::Employee , []);

        $employee = $this->repository->createRepository()->create( $this->input->toArray());

        // if model is not created
        if($employee == null) return $this->output->sendFailed(null, ErrorMessage::$errorOccurred); 
    
        // return response  
    return $this->output->sendSuccess(
        (new AddEmployeeOutput($employee ))->getOutputAsArray(),
        SuccessMessage::$addedSuccessfully
        );

    }
    
    
}


