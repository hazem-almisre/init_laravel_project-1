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
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'companyId', 'companyId');
    }

    /**
     * Get all of the users for the Follow
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'userId', 'userId');
    }
}
