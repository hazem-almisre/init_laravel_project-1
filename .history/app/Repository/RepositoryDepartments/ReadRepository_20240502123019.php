<?php
namespace App\Repository\RepositoryDepartments;

use App\Http\Models\SeriesStation;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\ReadRepositoryInterface;

class ReadRepository implements ReadRepositoryInterface
 {

    public function __construct(private $model){}

    public function getFirstModelByValue($key,$value) {
        $recorded = $this->model->where($key,'=',$value)->first();
        return $recorded? $recorded : null;
    }


    // check if record is exists in dataBase
    public function existsRecord($columnsWithValue):bool{
        return $this->model->where($columnsWithValue)->exists();
    }

    // get all record with selected column
    public function getAllBySelected(array $selected){
        return $this->model->select($selected)->get();
    }

    public function getById($id) {
        return $this->model->findOrFail($id);
    }


    // search travel
    public function getTravelsWithCompanyByFilters(
        $selectFromTravel  , $selectFromCompany ,$conditionsValues , $companies = [] ,$orderByColumns )
        {
            $query = $this->model->select($selectFromTravel)->where('from','like',$conditionsValues['from'])
            ->where('to','like',$conditionsValues['to'])->whereDate('travelDate',$conditionsValues['travelDate']);

            if($companies != null ){
                $query->whereIn('companyId', $companies);
            }

            if(isset($conditionsValues['isVIP'])) $query->where('isVIP',$conditionsValues['isVIP']);

            if(isset($conditionsValues['stationId'])){
                $id = $conditionsValues['stationId'];

                if( SeriesStation::select('seriesId')->where('stationId',$id)->exists())
                {
                    $subQuery = SeriesStation::select('seriesId')->where('stationId',$id)->get();

                }
                else{$subQuery = [0];}
                $query->whereIn('seriesId',$subQuery);
                // $id = $conditionsValues['stationId'];
                // $query->whereHas('stations',function($station) use($id) {
                //     $station->where("stations.stationId", $id);
                // }); //seriesId
            }

        $query->with(['company' => function ($q) {
            $q->select('companyId', 'name' , 'logo');
        }]);

        if(isset($orderByColumns['price'])) $query->orderBy('price');
        $query->orderBy('recommendation', 'desc');
        return $query->get();

        }


        public function getWithRelation(array $getWhereId , array $relation) {
            return $this->model->select()->where($getWhereId)->with($relation)->get();
        }


    // build your custom query
    public function getRecordsByCustomQuery( array | string $selectedColumn = "*" , $conditions =[] , $with = [] , $orderBy = [] ,  $dateConditions =[]){

        $query = $this->model->select($selectedColumn);

        foreach ($conditions as $condition) {
          $query->where($condition[0],$condition[1],$condition[2]);
        }

        foreach ($dateConditions as $condition) {
            $query->whereDate($condition[0],$condition[1],$condition[2]);
          }

        foreach($with as $entity) {
            $query->with($entity);
        }

        foreach($orderBy as $order){
            $query->orderby($order[0],$order[1]);
        }

        $result = $query->get();

        return $result->isNotEmpty() ? $result : null;
    }

    //get records by set of values
    public function getRecordsByValues( $columnName, $values) {
            $records = $this->model::whereIn($columnName,$values)->get();
            return $records? $records : null;
    }


    public function getAlreadyExistsFeaturesInCompany($companyId , $features){
        $query = $this->model->where('companyId',$companyId)
        ->where('feature','like',$features[0]);
        unset($features[0]);
            foreach($features as $feature)
                $query->orWhere( 'feature','like',$feature);
       return $query->get();
    }

}
