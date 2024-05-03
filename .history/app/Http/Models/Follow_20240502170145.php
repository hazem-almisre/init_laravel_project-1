<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $table = 'series';

    protected $primaryKey = 'seriesId';

    protected $fillable = [
        "companyId",
        "seriesName",
    ];
    
}
