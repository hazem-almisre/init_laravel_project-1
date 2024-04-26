<?php
namespace App\BusinessLogic\UseCases\CompanyActor\StationsManagement\UpdateStationUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\UseCases\CompanyActor\StationsManagement\StationInput;
use App\BusinessLogic\UseCases\CompanyActor\StationsManagement\StationOutput;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class UpdateStationLogic implements UseCase {

    
    public function __construct(
        //---------------------------------------------------------------------------------------
        private UpdateStationInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}
    
     
    public function execute() : Result { 
        

        $newData = [];

        if($this->input->getCity() != null)
        $newData['city']= $this->input->getCity();

        if($this->input->getStationName() != null)
        $newData['name']= $this->input->getStationName();

        $this->repository->buildRepositoryModel(EntityType::Station , []);

        $result = $this->repository->updateRepository()->update($this->input->getStationId() , $newData);
        
        if(!$result)
        return $this->output->sendFailed(null , ErrorMessage::$ConnectionProblem);

        return $this->output->sendSuccess($result , SuccessMessage::$UpdatedSuccessfully);

    }
}
    