<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\BusinessLogic\Interfaces\EntityInterfaces\TravelEntity;

class Travel extends Model implements TravelEntity
{
    use HasFactory;

    
    protected $table = 'travels';

    protected $primaryKey = 'travelId';

    protected $fillable = [
        'programId',
        "from",
        "to",
        "companyId",
        'travelDate',
        'timeToLeave',
        "price",
        "numOfSeatsBooking",
        'numOfSeats',
        'day',
        'DailySerialNumber',
        'periodName',
        "notes",
        "available",
        "isVIP",
        "pullmanDescriptionId",
        "recommendation",
        "seriesId"
    ];




    protected $hidden = [
        "companyId",
        "pullmanDescriptionId"
    ];


    public function company()
    {
        return $this->belongsTo(Company::class ,'companyId','companyId');
    }


    public function series()
    {
        return $this->hasOne(Series::class);
    }

    
    /**
     * Get the pullmanDescription that owns the Travel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pullmanDescription()
    {
        return $this->belongsTo(PullmanDescription::class);
    }

    
    public function stations()
    {
        return $this->hasMany(SeriesStation::class ,'seriesId','seriesId');
    }

    


        /**
     * Get all of the features for the Travel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function features()
    {
        return $this->hasManyThrough(Feature::class, TravelFeatures::class,'travelId','featureId','travelId','featureId');
    }
}
