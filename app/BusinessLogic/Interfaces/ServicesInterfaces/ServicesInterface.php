<?php
namespace App\BusinessLogic\Interfaces\ServicesInterfaces;


interface ServicesInterface {

    // check PassWord function
    public function checkPassWord($data) :bool ;
    
    // create Token function
    public function getToken($user) :String ;
    
    // hash data function
    public function hashData($data) : String;

    // make Exception function
    public function makeException( $message , $code = 0 );
    
   //Date Services
   public function DateServices (): DateServicesInterface ;

    //Sql Services
    public function SqlServices (): SqlServicesInterface;
}