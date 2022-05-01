<?php
namespace app\models\entities;
use app\models\Model;


class User extends Model
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
}