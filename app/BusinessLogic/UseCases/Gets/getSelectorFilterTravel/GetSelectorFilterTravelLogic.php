<?php
namespace App\BusinessLogic\UseCases\Gets\getSelectorFilterTravel;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class GetSelectorFilterTravelLogic implements UseCase
{

    public function __construct(
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}
    
     
    public function execute() : Result { 
        
   


        // get cities
        $this->repository->buildRepositoryModel(EntityType::City ,[]);

        $data["cities"] = $this->repository->readRepository()
        ->getAllBySelected(["cityId","name"]);                

        // get Companies
        $this->repository->buildRepositoryModel(EntityType::Company ,[]);
        
        $data['companies']=$this->repository->readRepository()
        ->getAllBySelected(['companyId',"name"]);

        // get stations
        $this->repository->buildRepositoryModel(EntityType::Station ,[]);

        $data['stations']=$this->repository->readRepository()
        ->getAllBySelected(["stationId","name"]);



        // send data..
        return $this->output->sendSuccess($data , 'Selector Filter Travel');

    }
}
    