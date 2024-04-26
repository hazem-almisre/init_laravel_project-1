<?php
namespace App\BusinessLogic\UseCases\AdminActor\RegisterAdminUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class RegisterAdminInput implements RequestModel {

 
    public String $name;
    public String $phoneNumber;
    public String $password;

    function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->phoneNumber = $data['phoneNumber'];
        $this->password = $data['password'];
    }

    public function getPhoneNumber(){
        return $this->phoneNumber;
    }

    public function setPassword($password){
        // $this->password = Hash::make($password);
        $this->password = $password;

    }

    public function getPassword(){
        return $this->password;
    }

    public function toArray() : array
    {
        return [
            "name" => $this->name,
            "phoneNumber" => $this->phoneNumber,
            "password" => $this->password
        ];
    }


}