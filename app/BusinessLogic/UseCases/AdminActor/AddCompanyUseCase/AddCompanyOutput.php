<?php
namespace App\BusinessLogic\UseCases\AdminActor\AddCompanyUseCase;


use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class AddCompanyOutput  implements ResponseModel
{
    private String $companeId;
    private String $name;
    private String $phoneNumber;

    public function __construct($data)
    {
        $this->companeId = $data['companyId'];
        $this->name = $data['name'];
        $this->phoneNumber = $data['phoneNumber'];
    }

    public function getOutputAsArray() : array
    {
        return [
            "companeId" => $this->companeId,
            "name" => $this->name,
            "phoneNumber" => $this->phoneNumber,
        ];
    }

}
