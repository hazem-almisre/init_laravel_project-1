<?php
namespace App\Http\Models;

use App\Http\Models\Subscribe;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\BusinessLogic\Interfaces\EntityInterfaces\CompanyEntity;

class Company extends Authenticatable implements CompanyEntity
{
    use HasApiTokens, HasFactory, Notifiable;


    public function getName() : String {
        return $this->name;
    }

    public function setName($name) : void {
        $this->name = $name;
    }

    public function getPhoneNumber() : String{
        return $this->phoneNumber;
    }


    public function setPhoneNumber($phoneNumber) : void{
        $this->phoneNumber = $phoneNumber;
    }
    public function getPassword() : String{
        return $this->password;
    }

    public function setPassword($password) : void{
        $this->password = Hash::make($password);
    }

    public function getSubscribeId() : int{
        return $this->subscribeId;
    }

    public function id():int {return $this->attributes['companyId'];}

    public function getEmail(){ return $this->attributes['email'];}

    public function getAttributes():array{return $this->attributes;}






    protected $table = 'companies';

    protected $primaryKey = 'companyId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        // 'email',
        'phoneNumber',
        'password',
        "subscribeId",
        "aboutAs",
        "logo",
        "isActive",
        "recommendation"
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all of the travels for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function travels()
    {
        return $this->hasMany(Travel::class, 'companyId', 'companyId');
    }



  /**
     * Get the subscribe that owns the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subscribe()
    {
        return $this->belongsTo(Subscribe::class);
    }

    /**
     * Get all of the employee for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employee()
    {
        return $this->hasMany(Employee::class);
    }


    /**
     * Get all of the images for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(CompanyImage::class,"companyId","companyId");
    }

    /**
     * Get all of the stations for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stations()
    {
        return $this->hasMany(Station::class);
    }

    public function series()
    {
        return $this->hasMany(Series::class);
    }

}
