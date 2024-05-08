<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserReservationController extends Controller
{

    $data = ["userId" => auth()->user()->userId
    , "travelId" => $showTravelDetailsRequest->travelId];
return $this->applyAspect(

//--------------------Functional Service ------------------------------------

new GetTravelMatrixLogic(
new GetTravelMatrixInput($data),
new BaseRepository ,
new JsonResponsePresenter,
),

//------------------Non Functional Registered--------------------------------
[
    /*array of non functional services*/
]


}
