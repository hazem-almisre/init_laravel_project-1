<?php
namespace App\BusinessLogic\UseCases\CompanyActor\StationsManagement\DeleteStationUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class DeleteStationInput implements RequestModel{

    private   $stationId;
    private   $companyId ;
  

    public function __construct(array $data){
        $this->companyId = $data['companyId']??null;
        $this->stationId = $data['stationId'] ;

}


public function getCompanyId() {
    return $this->companyId;
}

public function getStationId() {
    return $this->stationId;
    } 


public function toArray() :array {
    return [
        "companyId" => $this->companyId,
        "stationId" => $this->stationId,
    ];
}

}
