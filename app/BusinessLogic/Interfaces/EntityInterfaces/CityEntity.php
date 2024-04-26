<?php
namespace App\BusinessLogic\Interfaces\EntityInterfaces;


interface CityEntity extends BaseEntity{

    public function getName() : String ;

    public function setName($name) : void ;



}
