<?php
namespace App\BusinessLogic\UseCases\UserActor\ShowTravelDetailsUseCase;


use App\BusinessLogic\Core\InternalInterface\RequestModel;

class ShowTravelDetailsInput implements RequestModel
{

    private  $travelId;

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
