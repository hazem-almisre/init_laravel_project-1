<?php
namespace App\BusinessLogic\UseCases\UserActor\SearchAndFilterTravelUseCase;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class SearchAndFilterTravelOutput implements ResponseModel {


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