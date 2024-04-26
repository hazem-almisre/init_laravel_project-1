<?php
namespace App\BusinessLogic\UseCases\CompanyActor\TravelsManagement\CreateTravelUseCase;

use DateTime;
use App\BusinessLogic\Core\InternalInterface\RequestModel;

class CreateTravelInput implements RequestModel{

    private  int $companyId ;
    private  string $from;
    private  string $to ;
    private  $stations ;
    private  $features ;
    private  $pullmanId;
    private  $note ;
    private  bool $isVIP = false  ;
    private  $travelDate;
    private  $timeToLeave;
    private  $price;
    private $seriesId;

    public function __construct(array $data){
        $this->companyId = $data['companyId'];
        $this->from = $data ['from'];
        $this->to = $data['to'];
        $this->stations =  (isset($data['stations']))? $data['stations'] : null;
        $this->features =  (isset($data['features']))? $data['features'] : null;
        $this->pullmanId = $data['pullmanIdDescriptionId'];
        $this->note = $data['note'];
        $this->isVIP = (isset($data['isVIP']))?$data['isVIP']: false;
        $this->setDate((isset($data['travelDate']))?$data['travelDate']:null);
        $this->timeToLeave = (isset($data['timeToLeave']))? $data['timeToLeave'] : null ;
        $this->price = $data['price']?? null;
        $this->seriesId = $data['seriesId'];

}

public function setDate($date){
   if($date != null){
    $dateformat = new DateTime("@$date"); 
    $this->travelDate = $dateformat->format('Y-m-d');
   }
   else {  $this->travelDate= date('Y-m-d');}

}

public function getSeriesId() {
    return $this->seriesId;
}

public function getCompanyId() {
    return $this->companyId;
}
public function getPullmanId() {
    return $this->pullmanId;
}

public function getStations() {
    return $this->stations;
}

public function getFeatures() {
    return $this->features;
}

public function getDate() {
     return $this->travelDate;
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

        "companyId" => $this->companyId,
        "from" => $this->from,
        "to" => $this->to,
        "isVIP" => $this->isVIP,
        "travelDate" => $this->travelDate,
        "pullmanDescriptionId"=>$this->pullmanId,
        "note"=>$this->note,
        'timeToLeave'=>$this->timeToLeave,
        'price'=>$this->price,
        'seriesId' => $this->seriesId,

    ];
}

}