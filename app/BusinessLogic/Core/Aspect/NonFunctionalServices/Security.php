<?php

use App\BusinessLogic\Core\Aspect\Aspect;
use App\BusinessLogic\Core\InternalInterface\Service;

class Security implements Aspect {

    public function after(Service $service = null){ return null;}
    public function befor(Service $service = null){ return null;}
    public function exception(\Throwable $e){}
}