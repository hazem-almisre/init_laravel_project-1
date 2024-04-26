<?php
namespace App\Adapters;

use App\BusinessLogic\Interfaces\Result ;
use Facade\FlareClient\View;
use Symfony\Component\HttpFoundation\Response;

class ResultAdapter  implements Result {

    public function __construct( private   Response | View | Array | String  $result ) 
    {}

    public function sendResult(){
        return $this->result;
    }

}