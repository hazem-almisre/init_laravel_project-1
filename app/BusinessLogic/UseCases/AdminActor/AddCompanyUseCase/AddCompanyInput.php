<?php
namespace App\BusinessLogic\UseCases\AdminActor\AddCompanyUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class AddCompanyInput implements RequestModel {
    public String $name;
    public String $phoneNumber;
    public String $password;
    public String $subscribeId;

    function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->phoneNumber = $data['phoneNumber'];
        $this->subscribeId = $data['subscribeId'];
        $this->setPassword($data['password']);
    }

    public function setPassword($password){
        // $this->password = Hash::make($password);
        $this->password =$password;
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
            "name" => $this->name,
            "phoneNumber" => $this->phoneNumber,
            "password" => $this->password,
            "subscribeId" => $this->subscribeId
        ];
    }

}