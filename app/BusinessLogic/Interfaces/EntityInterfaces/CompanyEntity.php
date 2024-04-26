<?php
namespace App\BusinessLogic\Interfaces\EntityInterfaces;



interface CompanyEntity extends BaseEntity{

    public function id() : int;

    // public function getEmail();

    public function getName() : string;
    
    public function setPassword( string $password );

    public function getPassword() : string;

    public function getSubscribeId() : int;

    public function setPhoneNumber($phoneNumber);
    
    public function getPhoneNumber();

    public function getAttributes() : array;

}