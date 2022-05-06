<?php

namespace app\controllers;

use app\engine\App;
use app\models\entities\Orders;

class OrderController extends Controller
{
    public function actionAdd(){
        $address = $_POST["address"];
        $city = $_POST["city"];
        $zip = $_POST["zip"];
        $session_id = session_id();
        $userLogin = $_SESSION["login"];

        if(App::call()->userRepository->isAuth()){
            $order = new Orders($userLogin, $address, $city, $zip, $session_id);
            App::call()->orderRepository->insert($order);
            header("Location: /cart");
            die();
        } else {
            die("Not logined");
        }

    }
}