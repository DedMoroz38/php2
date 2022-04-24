<?php
namespace app\models;



class User extends Model
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

    public function getTableName(){
        return "users";
    }
}