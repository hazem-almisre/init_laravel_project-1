<?php
namespace App\BusinessLogic\Interfaces\RepositoryInterfaces;



interface UpdateRepositoryInterface {
    public function __construct($model);


        // update data in dataBase
        public function update($id , $newData);

        public function updateByConditions(array $conditions , $newData);

        
}
