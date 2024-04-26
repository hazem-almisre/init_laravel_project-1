<?php
namespace App\BusinessLogic\Interfaces\RepositoryInterfaces;


interface CreateRepositoryInterface{

    public function __construct($model);

    public function create(array $data);
    
    public function saveModelToDataBase( ):bool;

   // insert multi record to dataBase
   public function insert ($records);
}
