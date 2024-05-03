<?php
namespace App\BusinessLogic\Core\Options;

enum EntityType : String {

    case User       = "user";
    case Company    = "company";
    case Employee   = "employee";
    case Admin      = "admin";
    case Station    = "station";
    case Travel     = "travel";
    case City       = "city";
    case Feature    = "feature";
    case PullmanDescription = "pullmanDescription"; 
    case TravelStation ='travelStation';
    case TravelFeature = 'travelFeature';
    case SeriesStation = 'seriesStation';
    case Series = 'series';


    
    

}


