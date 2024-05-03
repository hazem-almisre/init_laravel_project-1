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
     * Get all of the companies for the Follow
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companies()
    {
        return $this->hasMany(Company::class, 'companyId', 'companyId');
    }

    /**
     * Get all of the users for the Follow
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'userId', 'userId');
    }
}
