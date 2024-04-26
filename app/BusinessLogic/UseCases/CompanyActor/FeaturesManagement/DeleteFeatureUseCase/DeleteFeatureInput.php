<?php
namespace App\BusinessLogic\UseCases\CompanyActor\FeaturesManagement\DeleteFeatureUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class DeleteFeatureInput implements RequestModel{

    private   $featuresIds;
  

    public function __construct(array $data){
        $this->featuresIds = $data['featuresIds'] ;

}


public function getFeaturesIds() {
    return $this->featuresIds;
    } 


public function toArray() :array {
    return [
        "featuresIds" => $this->featuresIds,
    ];
}

}
