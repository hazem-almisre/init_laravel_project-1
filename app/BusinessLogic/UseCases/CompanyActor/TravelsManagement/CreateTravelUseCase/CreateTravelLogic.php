<?php
namespace App\BusinessLogic\UseCases\CompanyActor\TravelsManagement\CreateTravelUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class CreateTravelLogic implements UseCase {

    
    public function __construct(
        //---------------------------------------------------------------------------------------
        private CreateTravelInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}
    
     
    public function execute() : Result { 
        

        $this->repository->buildRepositoryModel(EntityType::PullmanDescription ,[]);
        $pullmanInformation = $this->repository->readRepository()->getById($this->input->getPullmanId());

        $this->repository->buildRepositoryModel(EntityType::Travel , []);
    
        $travelInformation = $this->input->toArray();
        $travelInformation['programId'] = null;
        $travelInformation['available'] = true;
        // $travelInformation['periodName'] = ;
        $travelInformation['numOfSeatsBooking'] = 0;
        $travelInformation['numOfSeats'] = $pullmanInformation['numOfSeats'];
        $travelInformation['day'] = $this->service->DateServices()->getDayName($this->input->getDate() , 'Y-m-d');

       // $this->service->SqlServices()->startTransaction(); // begin transaction..
        $result =$this->repository->createRepository()->create($travelInformation);
        
        
        if($result == null )
        return $this->output->sendFailed(null , ErrorMessage::$ConnectionProblem);

        // add features
        if($this->input->getFeatures()!= null){
            $values = array();
            foreach($this->input->getFeatures() as $featureId)
            array_push($values , ['travelId' => $result->travelId , 'featureId' =>$featureId]);
            $this->repository->buildRepositoryModel(EntityType::TravelFeature ,[]);
            $result =$this->repository->createRepository()->insert($values);
        }
        
        // add Stations




        if( $this->input->getStations()!= null){
            $values = array();
            foreach($this->input->getStations() as $stationId)
            array_push($values , ['travelId' => $result->travelId , 'stationId' =>$stationId]);
            $this->repository->buildRepositoryModel(EntityType::TravelStation ,[]);
            $result =$this->repository->createRepository()->insert($values);
        }

        

      //  $this->service->SqlServices()->commitTransaction(); // commit transaction..
        return $this->output->sendSuccess((new CreateTravelOutput($result))->getOutputAsArray() , SuccessMessage::$addedSuccessfully);
    }
}
    