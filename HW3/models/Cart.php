<?php
namespace app\models;


use app\engine\DB;

class Cart extends DBModel
{
    protected $id;
    protected $userId;
    protected $itemId;
    protected $orderId;

    protected $props = [
        'sessionId' => false,
        'itemId' => false,
        'orderId' => false
    ];

    public function __construct($sessionId = null, $itemId = null, $orderId = null)
    {
        $this->sessionId = $sessionId;
        $this->itemId = $itemId;
        $this->orderId = $orderId;
    }
    public function getCart($session_id){
        $sql = "SELECT cart.id as cart_id, name, image, description, price FROM `cart`,
                            `catalogItems` WHERE `sessionId` = :sessionId AND cart.itemId = catalogItems.id;";
        DB::getInstance()->queryAll($sql, ["sessionId" => $session_id]);
        return DB::getInstance()->queryAll($sql, ["sessionId" => $session_id]);
    }
    public static function getTableName(){
        return "cart";
    }
 }