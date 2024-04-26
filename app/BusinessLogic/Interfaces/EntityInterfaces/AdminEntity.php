<?php
namespace App\BusinessLogic\Interfaces\EntityInterfaces;

interface AdminEntity extends BaseEntity {


    public function setData($data);

    public function id() : int;

    // public function getEmail();
    
    public function setPhoneNumber($phoneNumber);
    
    public function getPhoneNumber();

    public function getName () : string;
    
    public function setPassword( string $password );

    public function getPassword() : string;

    public function getAttributes() : array;

    
}