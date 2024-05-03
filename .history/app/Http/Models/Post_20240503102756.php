<?php

namespace App\Http\Models;

use App\BusinessLogic\Interfaces\EntityInterfaces\BaseEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements BaseEntity
{
    use HasFactory;
}
