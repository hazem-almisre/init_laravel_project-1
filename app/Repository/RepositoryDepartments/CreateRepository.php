<?php
namespace App\Repository\RepositoryDepartments;

use Exception;
use App\BusinessLogic\Core\Message\ResponseMessage;
use App\BusinessLogic\Interfaces\EntityInterfaces\BaseEntity;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\CreateRepositoryInterface;

class CreateRepository implements CreateRepositoryInterface
{
    public function __construct(private $model){}


    public function create(array $data) {
        $recored = $this->model->create($data);
        return $recored?$recored:null;
    }

    public function saveModelToDataBase(): bool {
        return $this->model->save();
    }

    // insert multi record to dataBase
    public function insert ($records){
        return $this->model::insert($records);
    }


}
