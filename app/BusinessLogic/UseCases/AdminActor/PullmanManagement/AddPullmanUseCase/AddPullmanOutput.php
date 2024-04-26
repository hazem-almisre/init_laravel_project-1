<?php
namespace App\BusinessLogic\UseCases\AdminActor\PullmanManagement\AddPullmanUseCase;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class AddPullmanOutput implements ResponseModel {

    public function __construct( private $data)
    {}

    public function getDataAsObject()  { 
         return $this->data;
    }

    public function getOutputAsObject() {return $this->data;}

    public function getOutputAsArray() : array{
        return [
            'pullmanTypeId'=>$this->data->pullmanDescriptionId,
            'type'=>$this->data->type,
            'numOfSeats'=>$this->data->numOfSeats,
        ];
    }

}