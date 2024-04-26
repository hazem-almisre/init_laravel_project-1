<?php
namespace App\BusinessLogic\Interfaces\RepositoryInterfaces;



interface DeleteRepositoryInterface {

    public function __construct($model);

    public function  delete($id);

    public function deleteMultipleRecordByIds ($ids) ;


}
