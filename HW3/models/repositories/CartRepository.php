<?php

namespace app\models\repositories;

use app\engine\App;
use app\engine\DB;
use app\models\entities\Cart;
use app\models\Repository;

class CartRepository extends Repository
{
    public function getCart($session_id){
        $sql = "SELECT cart.id as cart_id, name, image, description, price FROM `cart`,
                            `catalogItems` WHERE `sessionId` = :sessionId AND cart.itemId = catalogItems.id;";
        App::call()->db->queryAll($sql, ["sessionId" => $session_id]);
        return App::call()->db->queryAll($sql, ["sessionId" => $session_id]);
    }
    public function getTableName(){
        return "cart";
    }
    public function getEntityName(){
        return Cart::class;
    }
}