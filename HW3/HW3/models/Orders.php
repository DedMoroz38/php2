<?php
namespace app\models;


class Orders extends Model
{
    public $id;
    public $userId;
    public $address;
    public $city;
    public $zip;
    public $cartRefId

    public function __construct($userId = null, $address = null, $city = null, $zip = null, $cartRefId = null)
    {
        $this->userId = $userId;
        $this->address = $address;
        $this->city = $city;
        $this->zip = $zip;
        $this->cartRefId = $cartRefId;
    }

    public function getTableName(){
        return "orders";
    }
}