<?php
namespace App\BusinessLogic\Interfaces\RepositoryInterfaces;

use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Interfaces\EntityInterfaces\BaseEntity;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\ReadRepositoryInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\CreateRepositoryInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\DeleteRepositoryInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\UpdateRepositoryInterface;


interface BaseRepositoryInterface
{


    public function createRepository(): CreateRepositoryInterface;

    public function readRepository(): ReadRepositoryInterface;

    public function updateRepository(): UpdateRepositoryInterface;

    public function deleteRepository(): DeleteRepositoryInterface;
     
    public function setModel(BaseEntity $model):void;

    public function getModel():BaseEntity;

    // build a new repository model (init model)
    public function buildRepositoryModel(EntityType $type , $data) : BaseEntity; // by Factory

    




}
