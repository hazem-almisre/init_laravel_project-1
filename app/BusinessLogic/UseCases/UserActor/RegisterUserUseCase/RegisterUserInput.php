<?php
namespace App\BusinessLogic\UseCases\UserActor\RegisterUserUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;
use Illuminate\Support\Facades\Hash;

class RegisterUserInput implements RequestModel {


    public String $firstName;
    public String $lastName;
    public String $phoneNumber;
    public String $password;
    public String $gendor;
    public String $personalId;
    public String $birthDay;


    function __construct($data)
    {

        $this->firstName = $data['firstName'];
        $this->lastName = $data['lastName'];
        $this->phoneNumber = $data['phoneNumber'];
        $this->setPassword($data['password']);
        $this->gendor = $data['gendor'];
        $this->personalId = $data['personalId'];
        $this->birthDay = $data['birthDay'];

    }

    public function setPassword($password){
        $this->password = Hash::make($password);
    }

    public function getPhoneNumber(){
        return $this->phoneNumber;
    }


    public function getPassword(){
        return $this->password;
    }


    public function getBirthDay(){
        return  $this->birthDay;
    }


    public function toArray() : array
    {
        return [
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "phoneNumber" => $this->phoneNumber,
            "gendor" => $this->gendor,
            "birthDay" => $this->birthDay,
            "personalId" => $this->personalId,
            "password" => $this->password,
        ];
    }


}