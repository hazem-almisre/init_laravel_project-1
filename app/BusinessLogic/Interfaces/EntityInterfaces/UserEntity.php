<?php
namespace App\BusinessLogic\Interfaces\EntityInterfaces;


interface UserEntity extends BaseEntity{



    public function getFirstName ():string;

    public function setFirstName($firstName) : void ;

    public function getLastName ():string;

    public function setLastName($lastName) : void ;

    public function setPhoneNumber($phoneNumber);
    
    public function getPhoneNumber();
    
    public function setPassword(string $password);

    public function getPassword() ;

    public function getBirthDay();

    public function getGendor() : String;

    public function setGendor($gendor) : void;

    public function getPersonalId() : String;

    public function setPersonalId($personalId) : void;

    public function setBirthDay($birthDay) : void;

    public function getAttributes():array;

    
}