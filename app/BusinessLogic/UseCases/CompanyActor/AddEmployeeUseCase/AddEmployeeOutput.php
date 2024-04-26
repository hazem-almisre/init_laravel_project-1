<?php
namespace App\BusinessLogic\UseCases\CompanyActor\AddEmployeeUseCase;


use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class AddEmployeeOutput  implements ResponseModel
{
    private String $employeeId;
    private String $firstName;
    private String $lastName;
    private String $phoneNumber;
    private String $gendor;
    private ?String $image;
    // private String $companeId;

    public function __construct($data)
    {
        $this->employeeId = $data['employeeId'];
        $this->firstName = $data['firstName'];
        $this->lastName = $data['lastName'];
        $this->phoneNumber = $data['phoneNumber'];
        $this->gendor = $data['gendor'];
        $this->image = $data['image'];
    }

    public function getOutputAsArray() :array
    {
        return [
            "employeeId" => $this->employeeId,
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "phoneNumber" => $this->phoneNumber,
            "gendor" => $this->gendor,
            "image" => $this->image,
        ];
    }
}
