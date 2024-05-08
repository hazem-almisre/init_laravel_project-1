<?php
namespace App\BusinessLogic\UseCases\UserActor\UserReservationUseCase;


use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;
use App\BusinessLogic\UseCases\UserActor\GetTravelMatrixUseCase\logic\GetMatrixAlogrithm;
use Exception;

class UserReservationLogic implements UseCase {


    public function __construct(
        //---------------------------------------------------------------------------------------
        private UserReservationInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork
        private PresenterInterface $output,
    ){}


    public function execute() : Result {


        $this->repository->buildRepositoryModel(EntityType::Travel , []);

        $travel = $this->repository->readRepository()->getById($this->input->getTravelId());

        $matrix = json_decode($travel->seatNumbers);

        $this->repository->buildRepositoryModel(EntityType::Reservation , []);

        foreach ($this->input->getMatrix() as $value) {
            if ($matrix[$value["seteIndex"]]) {
                # code...
            }
            $reservation = $this->repository->createRepository()->create([
                "userId" => $this->input->getUserId(),
                "travelId" => $this->input->getTravelId(),
                "station" => $this->input->getStation(),
                "seteIndex" => $value["seteIndex"],
                "gendor" => $value["gendor"]
            ]);

            if (!$reservation) {
                throw new Exception();
            }
        }


        return $this->output->sendSuccess((new UserReservationOutput(""))->getOutputAsArray() , 'Success');



        return $this->output->sendFailed(null,ErrorMessage::$filedGetTravelMatrix);

    }
}
