<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\BusinessLogic\Interfaces\EntityInterfaces\CityEntity;

class City extends Model implements CityEntity
{
    use HasFactory;


    public function getName() : String {return $this->name;}

    public function setName($name) : void { $this->name = $name;}

    protected $table = 'cities';
    protected $primaryKey = 'cityId';
    protected $fillable = [
        'name',
        'countryId',
    ];

    /**
     * Get the Country that owns the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Country()
    {
        return $this->belongsTo(Country::class);
    }
}
