<?php
namespace App\Repository;

use App\Factories\FactoryModel;
use Illuminate\Database\Eloquent\Model;
use App\BusinessLogic\Core\Options\EntityType;
use App\Repository\RepositoryDepartments\ReadRepository;
use App\Repository\RepositoryDepartments\CreateRepository;
use App\Repository\RepositoryDepartments\DeleteRepository;
use App\Repository\RepositoryDepartments\UpdateRepository;
use App\BusinessLogic\Interfaces\EntityInterfaces\BaseEntity;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\ReadRepositoryInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\CreateRepositoryInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\DeleteRepositoryInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\UpdateRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{


    private Model $model;

    public function createRepository(): CreateRepositoryInterface {
        $create = new CreateRepository($this->model);
        return $create  ;
     }

    public function readRepository(): ReadRepositoryInterface {
        $read = new ReadRepository($this->model);
        return $read  ;
    }

    public function updateRepository(): UpdateRepositoryInterface {
        $update = new UpdateRepository($this->model);
        return $update;
    }

    public function deleteRepository(): DeleteRepositoryInterface {
        $delete = new DeleteRepository($this->model);
        return $delete;
    }

    // pass exists model to repository
    public function setModel(BaseEntity $model):void
    {
       $this->model = $model ;
    }

    // get repository model
    public function getModel():BaseEntity
    {
    if($this->model instanceof BaseEntity )
        return $this->model;
    return null;
    }

        
    
    // build repository new model (init model)
    public function buildRepositoryModel(EntityType $type, $data ) : BaseEntity
    {
       return $this->model = ( new FactoryModel )->make( $type , $data);
    }





}

