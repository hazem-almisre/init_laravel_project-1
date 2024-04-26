<?php
namespace App\BusinessLogic\UseCases\CompanyActor\LoginCompanyUseCase;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class LoginCompanyOutput implements ResponseModel{


    private String $companyId;
    private String $name;
    private String $phoneNumber;
    private String $token;

    public function __construct($data)
    {
        $this->companyId = $data['companyId'];
        $this->name = $data['name'];
        $this->phoneNumber = $data['phoneNumber'];
        $this->token = $data['token'];
    }

    public function getOutputAsArray() : array
    {
        return [
            "companyId" => $this->companyId,
            "name" => $this->name,
            "phoneNumber" => $this->phoneNumber,
            "token" => $this->token,
        ];
    }


}