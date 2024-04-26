<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\BusinessLogic\Interfaces\EntityInterfaces\StationEntity;

class Station extends Model implements StationEntity
{
    use HasFactory;
    
    
    protected $table = 'stations';

    protected $primaryKey = 'stationId';

    protected $fillable = [
        "name",
        "city",
        "companyId",
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
