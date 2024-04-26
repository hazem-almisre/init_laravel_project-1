<?php
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Series extends Model
{
    use HasFactory;

    protected $table = 'series';

    protected $primaryKey = 'seriesId';

    protected $fillable = [
        "companyId",
        "seriesName",
    ];


}
