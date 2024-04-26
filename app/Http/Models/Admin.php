<?php
namespace App\Http\Models;

use App\BusinessLogic\Interfaces\EntityInterfaces\AdminEntity;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

 class Admin  extends Authenticatable implements AdminEntity
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'admins';

    protected $primaryKey = 'adminId';
    
    
    public function getName() : String {
        return $this->attributes['name'];
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

    public function getAttributes():array{return $this->attributes;}

    public function setData($data){$this->attributes = $data;}

    public function id():int {return $this->attributes['adminId'];}

    // public function getEmail(){return $this->attributes['email'];}



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


}
