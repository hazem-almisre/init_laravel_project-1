<?php
namespace App\BusinessLogic\UseCases\UserActor\GetTravelMatrixUseCase;


use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

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


        if (!$travel) {
            
            $reservationData = [
            "userId"=>$this->input->getUserId(),
            "travelId" => $this->input->getTravelId(),
            "seatNumbers" =>  json_encode(array_fill(0,47,0))
            ];

            return $this->output->sendSuccess((new GetTravelMatrixOutput($reservationData))->getDataAsObject() , 'Success');
        }
        else {
            return $this->output->sendFailed(null,ErrorMessage::$unfollowFiled);
        }



    }
}
