<?php
namespace App\BusinessLogic\UseCases\CompanyActor\FeaturesManagement\AddFeatureUseCase;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class AddFeatureOutput implements ResponseModel {

    public function __construct( private $data)
    {}

    public function getDataAsObject()  { 
         return $this->data;
    }

    public function getOutputAsObject() {return $this->data;}

    public function getOutputAsArray() : array{
        return [
            'featureId'=>$this->data->featureId,
            'feature'=>$this->data->feature,
        ];
    }

}