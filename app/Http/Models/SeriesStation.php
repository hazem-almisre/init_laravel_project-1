<?php
namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeriesStation extends Model
{
    use HasFactory;

    protected $table = 'series_stations';

    protected $primaryKey = 'travelStationId';

    protected $fillable = [
        "stationId",
        "seriesId",
        "ExpectedArrivalTime",
        "city",
        "name",
    ];


    protected $hidden = [
        'companyId',
    ];

    /**
     * Get the company that owns the CompanyImage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }


   
}
