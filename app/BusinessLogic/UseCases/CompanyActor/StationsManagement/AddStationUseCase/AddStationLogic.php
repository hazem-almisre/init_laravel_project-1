<?php
namespace App\BusinessLogic\UseCases\CompanyActor\StationsManagement\AddStationUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class AddStationLogic implements UseCase {

    
    public function __construct(
        //---------------------------------------------------------------------------------------
        private AddStationInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}
    
     
    public function execute() : Result { 
        

        $this->repository->buildRepositoryModel(EntityType::Station , []);

        if ($this->repository->readRepository()->existsRecord(['companyId'=> $this->input->getCompanyId() ,'name'=>$this->input->getStationName() ,'city'=>$this->input->getCity()] ))
        return $this->output->sendFailed(null , ErrorMessage::$ExistsStation);


        $result =$this->repository->createRepository()->create($this->input->toArray());
        
        if($result == null )
        return $this->output->sendFailed(null , ErrorMessage::$ConnectionProblem);

        return $this->output->sendSuccess((new AddStationOutput($result))->getOutputAsArray() , SuccessMessage::$addedSuccessfully);

    }
}
    