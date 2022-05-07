<?php
namespace app\models;



class User extends DBModel
{

    public $id;
    public $login;
    public $password;
    public $hash;

    public function __construct($login = null, $password = null, $hash = null)
    {
        $this->login = $login;
        $this->password = $password;
        $this->hash = $hash;
    }

    public static function getTableName(){
        return "users";
    }
}