<?php
namespace App\BusinessLogic\UseCases\UserActor\UserReservationUseCase;


use App\BusinessLogic\Core\InternalInterface\RequestModel;

class UserReservationInput implements RequestModel
{

    private  $travelId;
    private  $userId;
    private  $station;
    private  $matrix ;

    public function __construct(array $data)
    {
        $this->travelId = $data['travelId'];
        $this->userId = $data['userId'];
        $this->station = $data['station'];
        $this->station = $data['station'];

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
