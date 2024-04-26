<?php
namespace App\Services;

use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;

class Services implements ServicesInterface {

        // check Passowrd function
        public function checkPassWord($data) :bool {
            return Hash::check($data['password'], $data['hashedPassword']);
        }
    
    
        // create Token function
        public function getToken($user) :String {
         return $user->createToken('API Token')->accessToken;
        }
        
        
        // hash data function
        public function hashData($data) : String{
            return Hash::make($data);
        }
    
        // make Exception function
        public function makeException( $message , $code = 0 ){
            throw new Exception(  $message , $code );
        }



    //Date Services
    public function DateServices (): DateServices
    {
        return (new DateServices);
    }


    //Sql Services
    public function SqlServices (): SqlServices
    {
            return (new SqlServices);
    }
    
}