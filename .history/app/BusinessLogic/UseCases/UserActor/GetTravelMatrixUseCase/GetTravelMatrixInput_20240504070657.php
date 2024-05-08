<?php
namespace App\BusinessLogic\UseCases\UserActor\GetTravelMatrixUseCase;


use App\BusinessLogic\Core\InternalInterface\RequestModel;

class GetTravelMatrixInput implements RequestModel
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

    v

    public function toArray(): array
    {
        return [
            "travelId" => $this->travelId,
        ];
    }
}
