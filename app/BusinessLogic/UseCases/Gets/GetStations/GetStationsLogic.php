<?php
namespace App\BusinessLogic\UseCases\Gets\GetStations;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class GetStationsLogic implements UseCase {

    
    public function __construct(
        //---------------------------------------------------------------------------------------
        private GetStationsInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}
    
     
    public function execute() : Result { 
        

        $this->repository->buildRepositoryModel(EntityType::City , []);
        
        $stations = $this->repository->readRepository()->getRecordsByCustomQuery(['stationId',"name"] ,$this->input->getConditions());

        if($stations == null )
        return $this->output->sendFailed(null , ErrorMessage::$NoStations);

        return $this->output->sendSuccess((new GetStationsOutput($stations))->getDataAsObject() , 'Success');

    }
}
    