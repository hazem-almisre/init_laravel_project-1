<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $table = 'follows';

    protected $primaryKey = 'followId';

    protected $fillable = [
        "companyId",
        "userId",
    ];

    hasM

}
