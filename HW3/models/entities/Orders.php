<?php
namespace app\models\entities;
use app\models\Model;


class Orders extends Model
{
    protected $id;
    protected $login;
    protected $address;
    protected $city;
    protected $zip;
    protected $sessionId;

    protected $props = [
        'login' => false,
        'address' => false,
        'city' => false,
        'zip' => false,
        'sessionId' => false
    ];

    public function __construct($login = null, $address = null, $city = null, $zip = null, $sessionId = null)
    {
        $this->login = $login;
        $this->address = $address;
        $this->city = $city;
        $this->zip = $zip;
        $this->sessionId = $sessionId;
    }

    public static function getTableName(){
        return "orders";
    }
}