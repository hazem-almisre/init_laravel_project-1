<?php
namespace App\BusinessLogic\UseCases\UserActor\ShowTravelDetailsUseCase;


use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class ShowTravelDetailsOutput implements ResponseModel {


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
