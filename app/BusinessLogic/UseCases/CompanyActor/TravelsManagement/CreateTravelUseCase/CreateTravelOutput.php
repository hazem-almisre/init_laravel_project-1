<?php
namespace App\BusinessLogic\UseCases\CompanyActor\TravelsManagement\CreateTravelUseCase;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class CreateTravelOutput implements ResponseModel {


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