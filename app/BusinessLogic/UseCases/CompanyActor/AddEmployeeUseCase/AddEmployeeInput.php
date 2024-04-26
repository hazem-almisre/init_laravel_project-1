<?php
namespace App\BusinessLogic\UseCases\CompanyActor\AddEmployeeUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class AddEmployeeInput implements RequestModel {

   
    public String $firstName;
    public String $lastName;
    public String $phoneNumber;
    public String $password;
    public String $gendor;
    public ?String $image;
    public string $birthDay;

    public int $companyId;


    function __construct($data)
    {

        $this->firstName = $data['firstName'];
        $this->lastName = $data['lastName'];
        $this->phoneNumber = $data['phoneNumber'];
        $this->setPassword($data['password']);
        $this->gendor = $data['gendor'];
        $this->image = $data['image'] ?? null;
        $this->birthDay = $data['birthDay'];
        $this->companyId = $data['companyId'];

    }

    public function setPassword($password){
        // $this->password = Hash::make($password);
         $this->password = $password;

    }

    public function getPhoneNumber(){
        return $this->phoneNumber;
    }

    public function getPassword(){
        return $this->password;
    }

    public function toArray() : array
    {
        return [
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "phoneNumber" => $this->phoneNumber,
            "gendor" => $this->gendor,
            "image" => $this->image,
            "birthDay" => $this->birthDay,
            "companyId" => $this->companyId,
            "password" => $this->password,
        ];
    }
}