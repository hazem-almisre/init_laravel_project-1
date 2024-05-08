<?php
namespace App\BusinessLogic\UseCases\UserActor\GetTravelMatrixUseCase;


use App\BusinessLogic\Core\InternalInterface\RequestModel;

class GetTravelMatrixInput implements RequestModel
{

    private  $travelId;
    private 

    public function __construct(array $data)
    {
        $this->travelId = $data['travelId'];

    }

    public function getTravelId()
    {
        return $this->travelId;
    }

    public function toArray(): array
    {
        return [
            "travelId" => $this->travelId,
        ];
    }
}
