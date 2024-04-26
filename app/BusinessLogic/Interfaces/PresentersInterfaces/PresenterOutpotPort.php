<?php
namespace App\BusinessLogic\Interfaces\PresentersInterfaces;

use App\BusinessLogic\Core\InternalInterface\ResponseModel ;
use App\BusinessLogic\Interfaces\ViewModel;

interface PresenterOutpotPort {

    public function sendSuccessResponse(ResponseModel $response , $message): ViewModel ;

    public function sendErrorResponse($errors , $publicMessage  ): ViewModel ;

    public function sendExceptionResponse( \Throwable $e ): ViewModel ;


}