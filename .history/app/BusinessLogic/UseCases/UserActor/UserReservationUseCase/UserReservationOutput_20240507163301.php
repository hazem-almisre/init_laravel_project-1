<?php
namespace App\BusinessLogic\UseCases\UserActor\GetTravelMatrixUseCase;


use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class GetTravelMatrixOutput implements ResponseModel {


    public function __construct( private $data)
    {}


    public function getDataAsObject()  {
         return $this->data;
    }
    public function getOutputAsArray() : array{
        return [
             $this->data
        ];
    }

}
