<?php
namespace App\Adapters\presenters;

use App\Adapters\ResultAdapter;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;

class JsonResponsePresenter implements PresenterInterface
{

    public static function sendSuccess($data, $message) : ResultAdapter
    {
        return (new ResultAdapter(
         response()->json(
            [
                "state" => 1,
                "message" => $message,
                "data" => $data,
            ])
        ));
    }

    public static function sendFailed($data, $message) : ResultAdapter
    {
       return (new ResultAdapter(

        response()->json([
            'state' => 0,
            "message" => $message,
            "errors" => $data,
        ])

));

        
    }
}
