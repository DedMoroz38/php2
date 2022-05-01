<?php
namespace app\models\entities;

use app\models\Model;

class Cart extends Model
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

 }