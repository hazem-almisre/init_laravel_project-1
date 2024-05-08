<?php
namespace App\BusinessLogic\UseCases\UserActor\UserReservationUseCase;


use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;
use App\BusinessLogic\UseCases\UserActor\GetTravelMatrixUseCase\logic\GetMatrixAlogrithm;

class UserReservationLogic implements UseCase {


    public function __construct(
        //---------------------------------------------------------------------------------------
        private UserReservationInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork
        private PresenterInterface $output,
    ){}


    public function execute() : Result {


        $this->repository->buildRepositoryModel(EntityType::Reservation , []);

        $travel = $this->repository->readRepository()->getById($this->input->getTravelId());

        $company = $travel->company;

        if($company->isSeparateGender)
        {

            $seatNumbers = json_decode($travel->seatNumbers);

            $matrix = GetMatrixAlogrithm::getMatrixAlogrithm($seatNumbers);

            return $this->output->sendSuccess((new GetTravelMatrixOutput($matrix))->getOutputAsArray() , 'Success');
        }


            return $this->output->sendFailed(null,ErrorMessage::$filedGetTravelMatrix);




    }
}
