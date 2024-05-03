<?php
namespace App\BusinessLogic\UseCases\UserActor\CompanyFollowUseCase;


use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class CompanyFollowOutput implements ResponseModel {


    public function __construct( private $data)
    {}


    public function getDataAsObject()  {
         return $this->data;
    }
    public function getOutputAsArray() : array{
        return [
            "su"
        ];
    }

}
