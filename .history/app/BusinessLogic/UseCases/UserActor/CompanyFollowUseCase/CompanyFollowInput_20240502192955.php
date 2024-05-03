<?php
namespace App\BusinessLogic\UseCases\UserActor\CompanyFollowUseCase;


use App\BusinessLogic\Core\InternalInterface\RequestModel;

class CompanyFollowInput implements RequestModel
{

    private  $userId;
    private  $companyId;

    public function __construct(array $data)
    {
        $this->companyId = $data['companyId'];
        $this->userId = $data['userId'];
    }

    public function getCompanyId()
    {
        return $this->companyId;
    }

    public function toArray(): array
    {
        return [
            "travelId" => $this->travelId,
        ];
    }
}
