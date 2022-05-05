<?php
session_start();

use app\engine\{Render, Request};
use \app\engine\App;
//include "../config/config.php";
//include "../engine/Autoload.php";
//spl_autoload_register([new Autoload(), "loadClass"]);
require_once "../vendor/autoload.php";
$config = include "../config/config.php";


try {
    App::call()->run($config);
} catch (PDOException $exception) {
    var_dump($exception->getMessage());
} catch (Exception $exception) {
    var_dump($exception);
}

////////////////////////////////////

//
//$user = User::getOne(1);
//$user->password = "233";
//$user->login = "123@a.com";
//$user->save();

//  var_dump($user);
// $cart = new Cart();
// $cart = $cart->getOne(3);
// $cart->delete();

// $items = new CatalogItems();
// var_dump($items->getOne(1));

