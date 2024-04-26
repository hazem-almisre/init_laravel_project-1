<?php
namespace App\BusinessLogic\Core\InternalInterface;

use App\BusinessLogic\Interfaces\Result;

Interface UseCase {

public function execute() : Result;

}


