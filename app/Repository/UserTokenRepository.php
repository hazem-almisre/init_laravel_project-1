<?php
namespace App\Repository;

class UserTokenRepository{

    static public function getToken($user) {
        return $user->createToken('API Token')->accessToken;
    }

}
