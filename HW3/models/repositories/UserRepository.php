<?php

namespace app\models\repositories;

use app\models\entities\User;
use app\models\Repository;

class UserRepository extends Repository
{
    public function Auth($login, $password){
        $user = $this->getWhere('login', $login);
        if($password == $user->password){
            $_SESSION["login"] = $login;
            return true;
        } else {
            return false;
        }
    }

    public function isAuth()
    {
        return isset($_SESSION["login"]);
    }

    public function getName()
    {
        return $_SESSION["login"];
    }
    public function getEntityName(){
        return User::class;
    }

    public function getTableName(){
        return "users";
    }
}