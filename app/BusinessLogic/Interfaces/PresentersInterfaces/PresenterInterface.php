<?php
namespace App\BusinessLogic\Interfaces\PresentersInterfaces;

use App\BusinessLogic\Interfaces\Result;

interface PresenterInterface {

    public static function sendSuccess($data , $message) : Result;

    public static function sendFailed( $data , $message) : Result;


}
