<?php
namespace App\BusinessLogic\UseCases\CompanyActor\StationsManagement\AddStationUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class AddStationInput implements RequestModel{

    private   $stationName;
    private   $companyId ;
    private   $city;

    
  

    public function __construct(array $data){
        $this->companyId = $data['companyId'] ?? null;
        $this->stationName = $data['stationName'] ?? null;
        $this->city = $data['city'] ?? null;
}


public function getCompanyId() {
    return $this->companyId;
}

public function getCity() {
    return $this->city;
}

public function getStationName() {
     return $this->stationName;
}



public function toArray() :array {
    return [
        "companyId" => $this->companyId,
        "name" => $this->stationName,
        "city" => $this->city,
    ];
}

}