<?php
namespace App\BusinessLogic\UseCases\CompanyActor\FeaturesManagement\AddFeatureUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class AddFeatureInput implements RequestModel{
    
    private   $companyId ;
    private   $features;

    public function __construct(array $data){
        $this->companyId = $data['companyId'] ;
        $this->features = $data['feature'];
}

public function getCompanyId() {
    return $this->companyId;
}

public function getFeatures() {
    return $this->features;
}


public function toArray() :array {
    return [
        "companyId" => $this->companyId,
        "features" => $this->features,
    ];
}

}