<?php
namespace app\models\entities;

use app\models\Model;

class Cart extends Model
{
    protected $id;
    protected $sessionId;
    protected $itemId;

    protected $props = [
        'sessionId' => false,
        'itemId' => false
    ];

    public function __construct($sessionId = null, $itemId = null)
    {
        $this->sessionId = $sessionId;
        $this->itemId = $itemId;
    }

 }