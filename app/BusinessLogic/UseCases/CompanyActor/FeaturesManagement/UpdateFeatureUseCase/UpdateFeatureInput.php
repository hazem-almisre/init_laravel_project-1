<?php
namespace App\BusinessLogic\UseCases\CompanyActor\FeaturesManagement\UpdateFeatureUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class UpdateFeatureInput implements RequestModel{

    private   $feature;
    private   $companyId ;
    private   $featureId;

    
  

    public function __construct(array $data){
        $this->companyId = (isset($data['companyId']))? $data['companyId'] : null;
        $this->feature = $data['feature'];
        $this->featureId = $data['featureId'] ;
}


public function getCompanyId() {
    return $this->companyId;
}


public function getFeatureId() {
    return $this->featureId;
    } 
    
public function getFeature() {
     return $this->feature;
}



public function toArray() :array {
    return [
        "companyId" => $this->companyId,
        "feature" => $this->feature,
    ];
}

}