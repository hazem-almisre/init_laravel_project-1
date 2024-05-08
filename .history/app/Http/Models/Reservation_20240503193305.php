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
        "travelId",
        "userId"
    ];

    /**
     * Get the travel associated with the Reservation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function travel()
    {
        return $this->hasOne(Travel::class, 'travelId', 'local_key');
    }
}
