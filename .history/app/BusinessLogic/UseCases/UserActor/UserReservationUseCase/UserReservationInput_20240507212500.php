<?php
namespace App\BusinessLogic\UseCases\UserActor\UserReservationUseCase;


use App\BusinessLogic\Core\InternalInterface\RequestModel;

class UserReservationInput implements RequestModel
{

    private  $travelId;
    private  $userId;

    public function __construct(array $data)
    {
        $this->travelId = $data['travelId'];
        $this->userId = $data['userId'];

    }

    public function getTravelId()
    {
        return $this->travelId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function toArray(): array
    {
        return [
            "travelId" => $this->travelId,
            "userId" => $this->userId,
        ];
    }
}
