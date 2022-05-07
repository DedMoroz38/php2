<?php
namespace app\models;


class Cart extends DBModel 
{
    public $id;
    public $userId;
    public $itemId;
    public $orderId;

    public function __construct($userId = null, $itemId = null, $orderId = null)
    {
        $this->userId = $userId;
        $this->itemId = $itemId;
        $this->orderId = $orderId;
    }

    public static function getTableName(){
        return "cart";
    }
 }