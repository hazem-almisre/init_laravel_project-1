<?php
namespace App\BusinessLogic\Interfaces\ServicesInterfaces;


interface DateServicesInterface {

  // Verify Age 
  public function verifyAge( $birthDate , int $age) : bool;

  // get name of day from date
  public function getDayName( $date , $format = 'Y-m-d' ) : string ;

  // check if first date greater than or equals second date
  public function dateGreaterThanOrEquals ($firstDate , $secondDate , $format = 'Y-m-d' ) :bool ;

// get count days between tow date
  public function getDaysBetween($data1 , $data2 ,  $format ='Y-m-d' );


}