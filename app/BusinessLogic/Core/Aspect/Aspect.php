<?php
namespace App\BusinessLogic\Core\Aspect;

use App\BusinessLogic\Core\InternalInterface\Service;

interface Aspect {

    public function after(Service $service = null);
    public function befor(Service $service = null);
    public function exception(\Throwable $e);

}