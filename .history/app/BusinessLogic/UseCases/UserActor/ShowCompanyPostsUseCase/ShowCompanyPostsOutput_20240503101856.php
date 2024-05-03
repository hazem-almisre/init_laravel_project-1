<?php
namespace App\BusinessLogic\UseCases\UserActor\ShowCompanyPostsUseCase;


use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class ShowCompanyPostsOutput implements ResponseModel {


    public function __construct(private $data)
    {}


    public function getOutputAsArray() : array{
        return 
    }

}
