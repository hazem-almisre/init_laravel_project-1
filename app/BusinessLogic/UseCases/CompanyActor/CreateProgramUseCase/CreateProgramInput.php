<?php

namespace App\BusinessLogic\UseCases\CompanyActor\CreateProgramUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class CreateProgramInput implements RequestModel{

    private $start ;
    private $end ;
    private $from ;
    private $to ;
    private $companyId ;
    private $sunday ;
    private $monday ;
    private $tuesday ;
    private $wednesday ;
    private $thursday ;
    private $friday ;
    private $saturday ;

    public function __construct(array $inputData)
    {
        $this->start = $inputData['start'];
        $this->end   = $inputData['end'];
        $this->from  = $inputData['from'];
        $this->to    = $inputData['to'];
        $this->companyId = $inputData['companyId'];
        $this->sunday    =  $inputData['sunday'];
        $this->monday    =  $inputData['monday'];
        $this->tuesday   =  $inputData['tuesday'];
        $this->wednesday =  $inputData['wednesday'];
        $this->thursday  =  $inputData['thursday'];
        $this->friday    =  $inputData['friday'];
        $this->saturday  =  $inputData['saturday'];

    }

    public function getMondayTravels(){
        return $this->monday;
    }

    public function getSundayTravels(){
        return $this->sunday;
    }

    public function getThursdayTravels(){
        return $this->thursday;
    }

    public function DayHasTravel(string $dayName) : bool
    {
        return false;
    }

    public function getTravelStations(array $travel) : array
    {
        return $travel['stations'] ?? null;
    }

    public function getTravelFeatures(array $travel) : array
    {
        return $travel['features']?? null;
    }

    public function getPullmanDescriptionId(array $travel) : array
    {
        return $travel['features']?? null;
    }


    public function getStartDate (){return $this->start;}
    public function getEndDate (){return $this->end;}


    public function toArray() : array
    {
        return [
            "start"     => $this->start,
            "end"       => $this->end,
            "from"      => $this->from,
            "to"        => $this->to,
            "companyId" => $this->companyId,
            "Sunday"    => $this->sunday,
            "Monday"    => $this->monday,
            "Tuesday"   => $this->tuesday,
            "Wednesday" => $this->wednesday,
            "Thursday"  => $this->thursday,
            "Friday"    => $this->friday,
            "Saturday"  => $this->saturday,
        ];
    }

}

