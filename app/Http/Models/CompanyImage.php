<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyImage extends Model
{
    use HasFactory;
    protected $table = 'company_images';

    protected $primaryKey = 'companyImageId';

    protected $fillable = [
        "image",
        "companyId",
    ];

    protected $hidden = [
        'companyId',
    ];

    /**
     * Get the compane that owns the CompaneImage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
