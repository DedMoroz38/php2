<?php

namespace app\controllers;
use app\models\repositories\UserRepository;

class AuthController extends Controller
{
    public function actionLogin(){
        $login = $_POST['login'];
        $password = $_POST['password'];
        if ((new UserRepository())->Auth($login, $password)){
            header("Location: /");
            die();
        } else {
            die("Wrong login or password");
        }
    }
    public function actionLogout(){
        session_regenerate_id();
        session_destroy();
        header("Location: /");
        die();
    }
}