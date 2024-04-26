<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\BusinessLogic\Interfaces\EntityInterfaces\TravelFeatureEntity;

class TravelFeatures extends Model implements TravelFeatureEntity
{
    use HasFactory;

    use HasFactory;
    protected $table = 'travel_features';

    protected $primaryKey = 'travelStationId';

    protected $fillable = [
        "travelId",
        "featureId",
    ];


    
}
