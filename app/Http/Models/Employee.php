<?php
namespace App\Http\Models;

use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Options\GenderEnum;
use App\BusinessLogic\Interfaces\EntityInterfaces\EmployeeEntity;
use Exception;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Authenticatable implements EmployeeEntity
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'employees';

    protected $primaryKey = 'employeeId';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        // 'email',
        'phoneNumber',
        'gendor',
        'image',
        'birthDay',
        'password',
        'companyId'
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


    public function getImage ():string { return $this->attributes['image']; }

    public function getFirstName ():string { return $this->attributes['firstName']; }

    public function getLastName ():string  { return $this->attributes['lastName']; }

    public function setEmail($email)  { return $this->email= $email; }
    
    public function getEmail() :string { return $this->attributes['phoneNumber']; }
    
    public function setPassword(string $password)  { return $this->password; }

    public function getPassword() { return $this->attributes['password']; }

    public function getBirthDay() : string { return $this->attributes['birthDay']; }

    public function getPersonalId() { return $this->attributes['personalId']; }

    public function getAttributes():array { return $this->attributes; }

    public function setImage($image) : void{
        $this->image = $image;
    }

    public function getCompanyId() : int{
        return $this->companyId;
    }


    public function setFirstName($firstName) : void {
        $this->firstName = $firstName;
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

    public function setGendor($gendor) : void {

        if($gendor == GenderEnum::female->value || $gendor == GenderEnum::male->value){
            $this->gendor = $gendor;
        }
        else  {
            throw new Exception(ErrorMessage::$ErrorGenderType);
        }

    }

    public function setbirthDay($birthDay) : void {
        $this->birthDay = $birthDay;
    }





    







    
}
