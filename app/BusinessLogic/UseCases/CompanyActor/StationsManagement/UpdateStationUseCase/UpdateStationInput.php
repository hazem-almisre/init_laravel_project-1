<?php
namespace App\BusinessLogic\UseCases\CompanyActor\StationsManagement\UpdateStationUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class UpdateStationInput implements RequestModel{

    private   $stationName;
    private   $companyId ;
    private   $city;
    private   $stationId;

    
  

    public function __construct(array $data){
        $this->companyId = (isset($data['companyId']))? $data['companyId'] : null;
        $this->stationName = $data['stationName'] ?? null;
        $this->city = $data['city'] ?? null;
        $this->stationId = $data['stationId'] ;
}


public function getCompanyId() {
    return $this->companyId;
}

public function getCity() {
    return $this->city;
}

public function getStationId() {
    return $this->stationId;
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