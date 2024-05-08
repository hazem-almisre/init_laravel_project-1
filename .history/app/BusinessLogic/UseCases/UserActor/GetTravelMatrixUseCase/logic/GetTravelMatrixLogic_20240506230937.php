<?php
namespace App\BusinessLogic\UseCases\UserActor\GetTravelMatrixUseCase\logic;


class GetMatrixAlogrithm {


    public static function getMatrixAlogrithm() {


    $a= [0,2,0,0,2,0,0,1,2,0,0,1,1,0,1,0,2,1,0,1];
    $male[20];
    $female[20];
    for(int $i=0; i<sizeof(a)/4; $i++)
    {
        if($a[$i]!=0)
        {
            male[i]=0;
            female[i]=0;
        }

        else
        {
            if((i+1)%2==1)
            {
                if(a[i+1]==1||a[i+1]==0)
                    male[i]=1;
                else
                    male[i]=0;

                if(a[i+1]==2||a[i+1]==0)
                    female[i]=1;
                else
                    female[i]=0;
            }
            else
            {
                if(a[i-1]==1||a[i-1]==0)
                    male[i]=1;
                else
                    male[i]=0;
                if(a[i-1]==2||a[i-1]==0)
                    female[i]=1;
                else
                    female[i]=0;
            }


        }
    }

    return true;



}

}

