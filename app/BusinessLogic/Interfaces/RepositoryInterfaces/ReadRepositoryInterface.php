<?php
namespace App\BusinessLogic\Interfaces\RepositoryInterfaces;


interface ReadRepositoryInterface{

    public function __construct($model);

    public function getFirstModelByValue($key,$value) ;

    public function existsRecord($columnsWithValue):bool ;

    // get all record with selected column
    public function getAllBySelected(array $selected);

    public function getById($id);
    
    public function getAlreadyExistsFeaturesInCompany($companyId , $features);

    public function getWithRelation(array $getWhereId,array $relation) ;

    //get records by set of values
    public function getRecordsByValues( $columnName, $values) ;

    public function getRecordsByCustomQuery( array | string $selectedColumn = "*"  , $conditions =[] , $with = [] , $orderBy = [] , $dateConditions = [] );

    public function getTravelsWithCompanyByFilters(
        $selectFromTravel  , $selectFromCompany ,$conditionsValues , $companies =[] ,$orderByColumns );
}
