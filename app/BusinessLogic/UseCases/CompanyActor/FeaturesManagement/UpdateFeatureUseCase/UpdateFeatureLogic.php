<?php
namespace App\BusinessLogic\UseCases\CompanyActor\FeaturesManagement\UpdateFeatureUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class UpdateFeatureLogic implements UseCase {

    
    public function __construct(
        //---------------------------------------------------------------------------------------
        private UpdateFeatureInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}
    
     
    public function execute() : Result { 
        


        $this->repository->buildRepositoryModel(EntityType::Feature , []);

        $newData   = ['feature' =>$this->input->getFeature()];
        
        $result = $this->repository->updateRepository()->update( $this->input->getFeatureId() , $newData);
        
        if(!$result)
        return $this->output->sendFailed(null , ErrorMessage::$ConnectionProblem);

        return $this->output->sendSuccess($result , SuccessMessage::$UpdatedSuccessfully);

    }
}
    