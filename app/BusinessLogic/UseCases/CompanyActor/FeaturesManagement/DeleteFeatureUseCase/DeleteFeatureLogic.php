<?php
namespace App\BusinessLogic\UseCases\CompanyActor\FeaturesManagement\DeleteFeatureUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class DeleteFeatureLogic implements UseCase {

    
    public function __construct(
        //---------------------------------------------------------------------------------------
        private DeleteFeatureInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository, // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}
    
     
    public function execute() : Result { 
        

        $this->repository->buildRepositoryModel(EntityType::Feature , []);
        
        $featuresIds = array();
        foreach($this->input->getFeaturesIds() as $featureId)
         array_push($featuresIds , ['featureId'=>$featureId] );
        
        $result = $this->repository->deleteRepository()->deleteMultipleRecordByIds($featuresIds);
        
        if(!$result)
        return $this->output->sendFailed(null , ErrorMessage::$NotExistItem);

        return $this->output->sendSuccess($result , SuccessMessage::$DeletedSuccessfully);
    }
}
    