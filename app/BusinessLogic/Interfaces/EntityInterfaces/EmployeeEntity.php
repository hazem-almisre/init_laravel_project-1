<?php
namespace App\BusinessLogic\Interfaces\EntityInterfaces;


interface EmployeeEntity extends BaseEntity{

    
    public function getFirstName ():string;

    public function getLastName ():string;

    // public function setEmail($email);

    public function setPhoneNumber($phoneNumber);
    
    public function getPhoneNumber();
    
    public function getEmail() : string ;
    
    public function setPassword(string $password);

    public function getPassword() ;

    public function setFirstName($firstName) : void ;

    public function setLastName($lastName) : void ;

    public function getGendor() : String;

    public function setGendor($gendor) : void;

    public function getImage() : String;

    public function setImage($image) : void;

    public function getbirthDay() : String;

    public function setbirthDay($birthDay) : void;

    public function getCompanyId() : int;

    public function getAttributes():array;


}