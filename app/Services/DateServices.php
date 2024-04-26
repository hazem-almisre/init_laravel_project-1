<?php
namespace App\Services;

use Carbon\Carbon;
use App\BusinessLogic\Interfaces\ServicesInterfaces\DateServicesInterface;

class DateServices implements DateServicesInterface {



    // Verify Age  function
    public function verifyAge( $birthDate ,int $age) : bool{
     if( Carbon::parse($birthDate)->age > $age ) return true;
        return false;
    }

    // check if first date greater than or equals second date
    public function dateGreaterThanOrEquals ($firstDate , $secondDate , $format ='Y-m-d' ) :bool {

        $date1 = Carbon::createFromFormat($format , $firstDate);
        $date2 = Carbon::createFromFormat($format, $secondDate);
    
            return $date1->gte($date2);
    }


    // get count days between tow date
    public function getDaysBetween($data1 , $data2 ,  $format ='Y-m-d' ){
        
    $from = Carbon::createFromFormat($format , $data1);
    $to   = Carbon::createFromFormat($format , $data2);

    $days = $to->diffInDays($from);
    return $days ;
    }


    // get name of day from date
    public function getDayName( $date , $format = 'Y-m-d') : string {
            return Carbon::createFromFormat($format, $date)->format('l');
    }
    
}