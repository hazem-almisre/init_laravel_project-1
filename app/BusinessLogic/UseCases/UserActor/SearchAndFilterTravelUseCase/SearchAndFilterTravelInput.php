<?php
namespace App\BusinessLogic\UseCases\UserActor\SearchAndFilterTravelUseCase;

use DateTime;
use App\BusinessLogic\Core\InternalInterface\RequestModel;

class SearchAndFilterTravelInput implements RequestModel{

    private  $companies ;
    private  string $from;
    private  string $to ;
    private  ?int $stationId ;
    private  bool $isVIP = false  ;
    private  $date;

    public function __construct(array $data){
        $this->companies = $data['companies'];
        $this->from = $data ['from'];
        $this->to = $data['to'];
        $this->stationId = $data['stationId'];
        $this->isVIP = ($data['isVIP'] != null )? $data['isVIP'] : false;
        $this->setDate($data['date']);
}

public function setDate($date){
   if($date != null){
    $dateformat = new DateTime("@$date");
    $this->date = $dateformat->format('Y-m-d');
   }
   else {  $this->date= date('Y-m-d');}

}

public function getCompanies() {
    return $this->companies;
}

public function getStationId() {
    return $this->stationId;
}

public function getDate() {
     return $this->date;
}

public function getIsVIP(){
    return $this->isVIP;
}

public function getFrom(){
    return $this->from;
}

public function getTo(){
    return $this->to;
}


public function toArray() :array {
    return [

        "companies" => $this->companies,
        "from" => $this->from,
        "to" => $this->to,
        "stationId" => $this->stationId,
        "isVIP" => $this->isVIP,
        "date" => $this->date,

    ];
}

}
