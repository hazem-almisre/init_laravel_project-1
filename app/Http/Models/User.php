<?php
namespace App\Http\Models;

use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Options\GenderEnum;
use App\BusinessLogic\Interfaces\EntityInterfaces\UserEntity;
use Exception;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable  implements UserEntity
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table      = 'users';
    protected $primaryKey ='userId';




    public function getFirstName() : String {
        return $this->firstName;
    }

    public function setFirstName($firstName) : void {
        $this->firstName = $firstName;
    }

    public function getLastName() : String {
        return $this->lastName;
    }

    public function setLastName($lastName) : void {
        $this->lastName = $lastName;
    }

    public function getPhoneNumber() : String{
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber) : void{
        $this->phoneNumber = $phoneNumber;
    }

    public function getGendor() : String{
        return $this->gendor;
    }

    public function setGendor($gendor) : void{
        if($gendor == GenderEnum::female->value || $gendor == GenderEnum::male->value){
            $this->gendor = $gendor;
        }
        else{
            throw new Exception(ErrorMessage::$ErrorGenderType);
        }
    }

    public function getbirthDay() : String{
        return $this->birthDay;
    }

    public function setbirthDay($birthDay) : void{
        $this->birthDay = $birthDay;
    }

    public function getPassword() : String{
        return $this->password;
    }

    public function setPassword($password) : void{
        $this->password = Hash::make($password);
    }


    public function getPersonalId() : String{
        return $this->personalId;
    }

    public function setPersonalId($personalId) : void{
        $this->personalId = $personalId;
    }



    public function getAttributes():array { return $this->attributes; }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'phoneNumber',
        'gendor',
        'birthDay',
        'password',
        'personalId'
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
