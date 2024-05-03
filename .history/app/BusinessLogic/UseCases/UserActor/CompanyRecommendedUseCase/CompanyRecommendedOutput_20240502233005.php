<?php
namespace App\BusinessLogic\UseCases\UserActor\CompanyRecommendedUseCase;


use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class CompanyRecommendedOutput implements ResponseModel {


    public function __construct()
    {}


    public function getOutputAsArray() : array{
        return [
            "success" => true
        ];
    }

}
