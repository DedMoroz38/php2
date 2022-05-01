<?php

namespace app\controllers;


use app\models\entities\Cart;
use app\models\repositories\CartRepository;

class CartController extends Controller
{

    public function actionIndex()
    {
        $session_id = session_id();
        $cart = (new CartRepository)->getCart($session_id);
        echo $this->render('cart',[
            "cart" => $cart
        ]);
    }
    public function actionAdd(){
        $id = $_GET["id"];
        $session_id = session_id();

        $cart = new Cart($session_id, $id);
        (new CartRepository)->save($cart);

        $response = [
            "status" => "ok",
            "count" => (new CartRepository)->getCountWhere("sessionId", session_id())
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }
    public function actionDelete(){
        $id = $_GET["id"];

        $response = [
            "status" => "ok",
            "result" => (new CartRepository)->staticDelete($id),
            "count" => (new CartRepository)->getCountWhere("sessionId", session_id())
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();

    }
}