<?php
namespace App\BusinessLogic\UseCases\UserActor\UserReservationUseCase;


use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class UserReservationOutput implements ResponseModel {


    public function __construct( private $data)
    {}


    public function getDataAsObject()  {
         return $this->data;
    }
    public function getOutputAsArray() : array{
        return [
             
        ];
    }

}
