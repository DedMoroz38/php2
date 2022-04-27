<?php
namespace app\models;



class User extends DBModel
{

    protected $id;
    protected $login;
    protected $password;
    protected $hash;

    protected $props = [
        'login' => false,
        'password' => false,
        'hash' => false
    ];

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