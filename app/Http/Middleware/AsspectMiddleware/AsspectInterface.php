<?php

namespace App\Http\Middleware\AsspectMiddleware;

    interface AsspectInterface{
        public function befor();
        public function after($data);
        public function onExceptions();
    }


?>
