<?php
namespace App\BusinessLogic\UseCases\UserActor\ShowCompanyUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class ShowCompanyLogic implements UseCase
{

    public function __construct(
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}
    
     
    public function execute() : Result { 
        
   
        $this->repository->buildRepositoryModel(EntityType::Company , []);

        $columns =['companyId',"name","logo","aboutAs"];

            $data=$this->repository->readRepository()
            ->getRecordsByCustomQuery($columns ,[],['images']);


            return $this->output->sendSuccess( $data , 'get all companies');
    }
}
    