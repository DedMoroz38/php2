<?php
namespace app\models;


class Cart extends DBModel 
{
    protected $id;
    protected $userId;
    protected $itemId;
    protected $orderId;

    protected $props = [
        'userId' => false,
        'itemId' => false,
        'orderId' => false
    ];

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