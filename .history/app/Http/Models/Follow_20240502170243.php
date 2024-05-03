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

    /**
     * Get all of the compa for the Follow
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function compa(): HasMany
    {
        return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
    }

}
