<?php

namespace app\controllers;

use app\models\Cart;

class CartController extends Controller
{

    public function actionIndex()
    {
        $session_id = session_id();
        $cart = Cart::getCart($session_id);
        echo $this->render('cart',[
            "cart" => $cart
        ]);
    }
    public function actionAdd(){
        $id = $_GET["id"];
        $session_id = session_id();

        $cart = new Cart($session_id, $id);
        $cart->save();

        $response = [
            "status" => "ok",
            "count" => Cart::getCountWhere("sessionId", session_id())
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }
    public function actionDelete(){
        $id = $_GET["id"];

        $response = [
            "status" => "ok",
            "result" => Cart::staticDelete($id),
            "count" => Cart::getCountWhere("sessionId", session_id())
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();

    }
}