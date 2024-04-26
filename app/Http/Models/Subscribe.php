<?php
namespace App\Http\Models;

use App\BusinessLogic\Interfaces\EntityInterfaces\SubscribeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscribe extends Model implements SubscribeEntity
{
    use HasFactory;

    protected $table = 'subscribes';

    protected $primaryKey = 'subscribeId';



    public function getName() : String {
        return $this->name;
    }

    public function setName($name) : void {
        $this->name = $name;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

}
