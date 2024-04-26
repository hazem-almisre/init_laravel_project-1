<?php
namespace App\BusinessLogic\UseCases\UserActor\RegisterUserUseCase;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class RegisterUserOutput  implements ResponseModel
{

    private String $userId;
    private String $firstName;
    private String $lastName;
    private String $phoneNumber;
    private String $gendor;
    private String $birthDay;
    private String $personalId;
    
    public function __construct($data)
    {
        $this->userId = $data['userId'];
        $this->firstName = $data['firstName'];
        $this->lastName = $data['lastName'];
        $this->phoneNumber = $data['phoneNumber'];
        $this->gendor = $data['gendor'];
        $this->birthDay = $data['birthDay'];
        $this->personalId = $data['personalId'];
    }
    
    public function getOutputAsArray() : array
    {
        return [
            "userId" => $this->userId,
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "phoneNumber" => $this->phoneNumber,
            "gendor" => $this->gendor,
            "birthDay" => $this->birthDay,
            "personalId" => $this->personalId,
        ];
    }
}




