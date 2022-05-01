<?php
namespace app\models\entities;
use app\models\Model;


class Orders extends Model
{
    protected $id;
    protected $userId;
    protected $address;
    protected $city;
    protected $zip;
    protected $cartRefId;

    protected $props = [
        'userId' => false,
        'address' => false,
        'city' => false,
        'zip' => false,
        'cartRefId' => false
    ];

    public function __construct($userId = null, $address = null, $city = null, $zip = null, $cartRefId = null)
    {
        $this->userId = $userId;
        $this->address = $address;
        $this->city = $city;
        $this->zip = $zip;
        $this->cartRefId = $cartRefId;
    }

    public static function getTableName(){
        return "orders";
    }
}