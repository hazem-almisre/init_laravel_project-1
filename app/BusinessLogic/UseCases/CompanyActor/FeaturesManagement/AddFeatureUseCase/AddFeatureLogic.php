<?php
namespace App\BusinessLogic\UseCases\CompanyActor\FeaturesManagement\AddFeatureUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class AddFeatureLogic implements UseCase {

    
    public function __construct(
        //---------------------------------------------------------------------------------------
        private AddFeatureInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}
    
     
    public function execute() : Result { 
        

        $this->repository->buildRepositoryModel(EntityType::Feature , []);
        

        //check if entry features already exists in company ? 
        $records = $this->repository->readRepository()->getAlreadyExistsFeaturesInCompany($this->input->getCompanyId(), $this->input->getFeatures());
        if($records->count() > 0 )return $this->output->sendFailed($records , ErrorMessage::$ExistsFeature);

        
        //add new features to company features..
        $features = array();
        foreach($this->input->getFeatures() as $feature ) 
        array_push( $features,['feature'=>$feature , 'companyId'=>$this->input->getCompanyId()]);

        $result =$this->repository->createRepository()->insert( $features);
        
        if($result == null )
        return $this->output->sendFailed(null , ErrorMessage::$ConnectionProblem);

        return $this->output->sendSuccess((new AddFeatureOutput($result))->getOutputAsObject() , SuccessMessage::$addedSuccessfully);

    }
}
    