<?php

namespace App\Http\Resources\response;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class ErrorResponse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function __construct( protected $errors,
        protected $message ,
        protected $code = 404
    ){}


    public function toArray($request)
    {
       return 
            [
                "status"=>0 ,
                //"code"=> $this->code,
                "message"=> $this->message,
                'error'=>$this->errors
            ];
        
    }
}
