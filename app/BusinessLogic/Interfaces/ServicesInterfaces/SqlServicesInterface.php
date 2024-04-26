<?php
namespace App\BusinessLogic\Interfaces\ServicesInterfaces;


interface SqlServicesInterface { 


    // transactions functions ---------
    public function startTransaction();

    public function commitTransaction();

    public function rollbackTransaction();

}








