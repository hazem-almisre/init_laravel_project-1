<?php
namespace App\BusinessLogic\UseCases\UserActor\GetTravelMatrixUseCase;


use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;
use App\BusinessLogic\UseCases\UserActor\SearchAndFilterTravelUseCase\SearchAndFilterTravelOutput;


class GetTravelMatrixLogic implements UseCase {


    public function __construct(
        //---------------------------------------------------------------------------------------
        private GetTravelMatrixInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork
        private PresenterInterface $output,
    ){}


    public function execute() : Result {


        $this->repository->buildRepositoryModel(EntityType::Travel , []);

        $travel = $this->repository->readRepository()->getById($this->input->getTravelId());

        $reservation = $travel->reservation;

        if (!$reservation) {
            $this->repository->buildRepositoryModel(EntityType::Reservation , [""]);
        }

        return $this->output->sendSuccess((new SearchAndFilterTravelOutput($travel))->getDataAsObject() , 'Success');

    }
}
