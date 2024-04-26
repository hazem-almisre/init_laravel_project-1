<?php 
namespace App\BusinessLogic\UseCases\UserActor\ShowTravelDetailsUseCase;


use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;
use App\BusinessLogic\UseCases\UserActor\SearchAndFilterTravelUseCase\SearchAndFilterTravelOutput;


class ShowTravelDetailsLogic implements UseCase {


    public function __construct(
        //---------------------------------------------------------------------------------------
        private ShowTravelDetailsInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork
        private PresenterInterface $output,
    ){}


    public function execute() : Result {


        $this->repository->buildRepositoryModel(EntityType::Travel , []);

        $relation = [
            "company",
            "pullmanDescription",
            "stations",
            "features"
        ];

        $getWhereId = ["travelId" => $this->input->getTravelId()];

        $travel = $this->repository->readRepository()->getWithRelation($getWhereId,$relation);

        return $this->output->sendSuccess((new SearchAndFilterTravelOutput($travel))->getDataAsObject() , 'Success');

    }
}
