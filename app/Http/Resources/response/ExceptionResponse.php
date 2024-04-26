<?php

namespace App\Http\Resources\response;

use Illuminate\Http\Resources\Json\JsonResource;

class ExceptionResponse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */


     public function __construct( protected \Throwable $e 
     ){}
 
    public function toArray($request)
    {
        return 
        [
            "status"=> 0 ,
            'message' => "developer error",
            "data" => $this->e->getMessage()
        ];
    }
}
