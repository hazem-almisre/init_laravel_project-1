<?php

namespace App\Http\Resources\response;

use Illuminate\Http\Resources\Json\JsonResource;

class SuccessResponse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */



     public function __construct( protected $data,
        protected $message ,
        protected $code = 200 
        ){}

    public function toArray($request)
    {
        return [
            "status"=> 1,
           // "code"=> $this->code,
            "message"=> $this->message,
            'data'=>$this->data
        ];
    }
}
