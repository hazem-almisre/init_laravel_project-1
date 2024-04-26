<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\BusinessLogic\Interfaces\EntityInterfaces\TravelStationEntity;

class TravelStation extends Model implements TravelStationEntity
{
    use HasFactory;
    protected $table = 'travel_stations';

    protected $primaryKey = 'travelStationId';

    protected $fillable = [
        "travelId",
        "stationId",
        "ExpectedArrivalTime",
    ];



    
}
