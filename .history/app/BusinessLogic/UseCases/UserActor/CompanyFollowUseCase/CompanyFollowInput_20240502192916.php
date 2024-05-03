<?php
namespace App\BusinessLogic\UseCases\UserActor\CompanyFollowUseCase;


use App\BusinessLogic\Core\InternalInterface\RequestModel;

class CompanyFollowInput implements RequestModel
{

    private  $userId;
    private  $companyId;

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
