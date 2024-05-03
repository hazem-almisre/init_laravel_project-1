<?php
namespace App\BusinessLogic\UseCases\UserActor\ShowCompanyPostsUseCase;


use App\BusinessLogic\Core\InternalInterface\RequestModel;

class ShowCompanyPostsInput implements RequestModel
{

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

    public function getUserId()
    {
        return $this->userId;
    }

    public function toArray(): array
    {
        return [
            "companyId" => $this->companyId,
            "userId" => $this->userId,
        ];
    }
}
