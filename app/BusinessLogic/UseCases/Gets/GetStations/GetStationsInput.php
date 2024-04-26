<?php
namespace App\BusinessLogic\UseCases\Gets\GetStations;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class GetStationsInput implements RequestModel{

    private int $conditions ;
    private string $cityName ;
    private string $companyId;

    public function __construct( $input )
    {
         $this->conditions = $input['conditions'] ?? [];
         $this->cityName   = $input['city'] ?? null;
         $this->companyId   = $input['companyId'] ?? null;

    }


    public function getConditions(){ return $this->conditions ;}
    public function getCityName(){ return $this->cityName ;}
    public function getCompanyId(){ return $this->companyId ;}



    public function toArray() :array {
        return [
            "cityName" => $this->cityName ??null ,
            "companyId" => $this->companyId??null ,

        ];
  }


}