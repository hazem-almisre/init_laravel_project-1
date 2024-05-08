<?php
namespace App\BusinessLogic\UseCases\UserActor\GetTravelMatrixUseCase\logic;


class GetMatrixAlogrithm {


    public static function getMatrixAlogrithm(array $seatNumbers) {


    $male = [];
    $female = [];
    $n =count($seatNumbers);
    for($i=0; $i<$n; $i++)
    {
        if($seatNumbers[$i]!=0)
        {
            $male[$i]=0;
            $female[$i]=0;
        }

        else
        {
            if(($i+1)%2==1 && $i+1 < $n )
            {
                if($seatNumbers[$i+1]==1||$seatNumbers[$i+1]==0)
                    $male[$i]=1;
                else
                    $male[$i]=0;

                if($seatNumbers[$i+1]==2||$seatNumbers[$i+1]==0)
                    $female[$i]=1;
                else
                    $female[$i]=0;
            }
            else
            {
                if($seatNumbers[$i-1]==1||$seatNumbers[$i-1]==0)
                    $male[$i]=1;
                else
                    $male[$i]=0;
                if($seatNumbers[$i-1]==2||$seatNumbers[$i-1]==0)
                    $female[$i]=1;
                else
                    $female[$i]=0;
            }
        }
    }

    return [
        "maleMatrix" => $male,
        "femaleMatrix" => $female,
    ];

}

}

