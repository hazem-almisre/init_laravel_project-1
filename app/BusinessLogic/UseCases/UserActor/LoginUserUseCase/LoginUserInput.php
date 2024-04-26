<?php
namespace App\BusinessLogic\UseCases\UserActor\LoginUserUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class LoginUserInput implements RequestModel{

    private String $phoneNumber;
    private String $password;

  public function __construct(array $data)
  {

    $this->setPhoneNumber($data['phoneNumber']);

    $this->setPassword($data['password']);

  }


  public function setPhoneNumber($phoneNumber){
    $this->phoneNumber = $phoneNumber;
  }

  public function setPassword($password) {
        $this->password = $password;
  }

  public function getPassword() {
        return $this->password;
    }


  public function getPhoneNumber() {
    return $this->phoneNumber;
  }


  public function toArray() :array {
        return [
            "phoneNumber" => $this->phoneNumber,
            "password" => $this->password
        ];
  }


}