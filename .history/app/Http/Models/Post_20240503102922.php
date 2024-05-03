<?php

namespace App\Http\Models;

use App\BusinessLogic\Interfaces\EntityInterfaces\BaseEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements BaseEntity
{
    use HasFactory;


    protected $table = 'posts';

    protected $primaryKey = 'postId';

    protected $fillable = [
        "companyId",
        ""
    ];

            /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        "companyId"
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

}
