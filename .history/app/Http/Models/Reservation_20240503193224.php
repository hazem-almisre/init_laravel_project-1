<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;



    protected $table = 'reservations';

    protected $primaryKey = 'reservationId';

    protected $fillable = [
        "travelId",
        "userId",
        "station",
        "seatArray",
        "price",
        "status"
    ];

            /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        "companyId"
    ];

    /**
     * Get all of the companies for the Follow
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'companyId', 'companyId');
    }
}
