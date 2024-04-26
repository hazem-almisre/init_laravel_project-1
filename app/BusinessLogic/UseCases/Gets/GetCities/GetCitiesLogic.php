<?php
namespace App\BusinessLogic\UseCases\Gets\GetCities;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class GetCitiesLogic implements UseCase {

    
    public function __construct(
        //---------------------------------------------------------------------------------------
        private GetCitiesInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}
    
     
    public function execute() : Result { 
        

        $this->repository->buildRepositoryModel(EntityType::City , []);
        
        $conditions = [
            ['countryId','=', $this->input->getCountry()]
        ];
        
        $cities = $this->repository->readRepository()->getRecordsByCustomQuery(['cityId',"name"] ,$conditions   );

        if($cities == null )
        return $this->output->sendFailed(null , ErrorMessage::$NoCities);

        return $this->output->sendSuccess((new GetCitiesOutput($cities))->getDataAsObject() , 'Success');

    }
}
    