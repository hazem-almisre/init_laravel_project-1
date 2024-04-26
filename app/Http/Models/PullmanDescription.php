<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\BusinessLogic\Interfaces\EntityInterfaces\PullmanDescriptionEntity;

class PullmanDescription extends Model implements PullmanDescriptionEntity
{
    use HasFactory;
    
    protected $table = 'pullman_descriptions';

    protected $primaryKey = 'pullmanDescriptionId';

    protected $fillable = [
        "type",
        "numOfSeats",
    ];

    /**
     * Get all of the travel for the PullmanDescription
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function travel()
    {
        return $this->hasMany(Travel::class);
    }
}
