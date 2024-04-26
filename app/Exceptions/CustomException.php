<?php
namespace App\Exceptions;

use Throwable;

class CustomException {

    public function __construct(private Throwable $th) {}

    public function getMessage() {
        return $this->th->getMessage();
    }

    public function getData() {
        return (isset($this->th->validator))?$this->th->validator->errors():$this->th->getTrace();
    }


}

