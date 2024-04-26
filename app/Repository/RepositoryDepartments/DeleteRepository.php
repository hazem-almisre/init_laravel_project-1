<?php
namespace App\Repository\RepositoryDepartments;

use App\BusinessLogic\Interfaces\RepositoryInterfaces\DeleteRepositoryInterface;

class DeleteRepository  implements DeleteRepositoryInterface
{

    public function __construct(
        private  $model
    ){}


    public function delete($id) {
       return  $this->model::find($id)->delete();
    }

    public function deleteMultipleRecordByIds ($ids) {
        $query =  $this->model::where($ids[0]);
        unset($ids[0]);
        foreach($ids as $id) $query->orWhere($id);
        return $query->delete();
     }
    

}
