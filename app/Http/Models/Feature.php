<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\BusinessLogic\Interfaces\EntityInterfaces\FeatureEntity;

class Feature extends Model implements FeatureEntity
{
    use HasFactory;
    protected $table = 'features';
    protected $primaryKey = 'featureId';
    protected $fillable = ['companyId' , 'feature'] ;


   /**
    * Get the company that owns the Feature
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function company()
   {
       return $this->belongsTo(Company::class);
   }
    
}
