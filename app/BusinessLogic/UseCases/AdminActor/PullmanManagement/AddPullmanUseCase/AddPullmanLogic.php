<?php
namespace App\BusinessLogic\UseCases\AdminActor\PullmanManagement\AddPullmanUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class AddPullmanLogic implements UseCase {

    
    public function __construct(
        //---------------------------------------------------------------------------------------
        private AddPullmanInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}
    
     
    public function execute() : Result { 
        

        $this->repository->buildRepositoryModel(EntityType::PullmanDescription , []);
        

        //check if pullman type already exists  ? 
        $exists = $this->repository->readRepository()->existsRecord(['type'=>$this->input->getPullmanType()]);
        if($exists )return $this->output->sendFailed(NULL , ErrorMessage::$ExistsPullmanType);

        
        //add new pullman type to system..
        $result =$this->repository->createRepository()->create($this->input->toArray());
        
        if($result == null )
        return $this->output->sendFailed(null , ErrorMessage::$ConnectionProblem);

        return $this->output->sendSuccess((new AddPullmanOutput($result))->getOutputAsArray() , SuccessMessage::$addedSuccessfully);

    }
}
    