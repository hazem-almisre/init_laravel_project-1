<?php
namespace App\BusinessLogic\UseCases\AdminActor\LoginAdminUseCase;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;
use App\BusinessLogic\Interfaces\EntityInterfaces\AdminEntity;

class LoginAdminOutput implements ResponseModel{


    private String $adminId;
    private String $name;
    private String $phoneNumber;
    private String $token;

    public function __construct($data)
    {
        $this->adminId = $data['adminId'];
        $this->name = $data['name'];
        $this->phoneNumber = $data['phoneNumber'];
        $this->token = $data['token'];
    }

    public function getOutputAsArray() : array
    {
        return [
            "adminId" => $this->adminId,
            "name" => $this->name,
            "phoneNumber" => $this->phoneNumber,
            "token" => $this->token,
        ];
    }
}