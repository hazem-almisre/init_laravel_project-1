<?php
namespace App\BusinessLogic\UseCases\AdminActor\PullmanManagement\AddPullmanUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class AddPullmanInput implements RequestModel{
    
    private   $type ;
    private   $numOfSeats;

    public function __construct(array $data){
        $this->type = $data['type'] ;
        $this->numOfSeats = $data['numOfSeats'];
}

public function getPullmanType() {
    return $this->type;
}

public function getNumberOfSeats() {
    return $this->numOfSeats;
}


public function toArray() :array {
    return [
        "type" => $this->type,
        "numOfSeats" => $this->numOfSeats,
    ];
}

}