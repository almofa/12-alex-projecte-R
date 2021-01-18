<?php


namespace App\Core;


use App\Core\Exception\NotFoundException;
use App\Model\UserModel;

class Security
{
    public static function isAuthenticatedUser(): bool
    {
        if (App::get('user')!==null){
                return true;
        }
        return false;
    }
}