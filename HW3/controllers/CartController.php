<?php

namespace app\controllers;


use app\engine\App;
use app\models\entities\Cart;
use app\models\repositories\CartRepository;

class CartController extends Controller
{

    public function actionIndex()
    {
        $session_id = session_id();
        $cart = App::call()->cartRepository->getCart($session_id);
        echo $this->render('cart',[
            "cart" => $cart,
            "isAdmin" => App::call()->userRepository->isAdmin(),
            "orders" => App::call()->orderRepository->getAll()
        ]);
    }
    public function actionAdd(){
        $id = $_GET["id"];
        $session_id = session_id();
        $cart = new Cart($session_id, $id);
        App::call()->cartRepository->save($cart);
        $response = [
            "status" => "ok",
            "count" => App::call()->cartRepository->getCountWhere("sessionId", session_id())
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }
    public function actionDelete(){
        $id = $_GET["id"];

        $response = [
            "status" => "ok",
            "result" => App::call()->cartRepository->staticDelete($id),
            "count" => App::call()->cartRepository->getCountWhere("sessionId", session_id())
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();

    }
}