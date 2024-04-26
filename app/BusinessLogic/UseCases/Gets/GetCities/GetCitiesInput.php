<?php
namespace App\BusinessLogic\UseCases\Gets\GetCities;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class GetCitiesInput implements RequestModel{

    private int $countryId = 1 ;

    public function __construct( $data )
    {
        // $this->countryId = $data['countryId'];
    }


    public function getCountry(){ return $this->countryId ;}



    public function toArray() :array {
        return [
          //  "countryId" => $this->countryId,
        ];
  }


}