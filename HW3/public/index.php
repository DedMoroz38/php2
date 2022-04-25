<?php

include "../engine/Autoload.php";

use app\models\{Cart, User, CatalogItems, Orders};
use app\engine\DB;
use app\interfaces\IModel; 
include "../config/config.php";


spl_autoload_register([new Autoload(), "loadClass"]);



$controllerName = $_GET["c"] ?: "index";
$actionName = $_GET["a"];

$controllerClass = CONTROLLER_NAMESPACE. ucfirst($controllerName) . "Controller";


if(class_exists($controllerClass)){
    $controller = new $controllerClass();
    $controller->runAction($actionName);
} else {
    die("No such class");
}


// $user = new User("ma@gmail.com", "whatr3evr", "eff32fr34g5g/f4f");
//  var_dump($user);
// $cart = new Cart();
// $cart = $cart->getOne(3);
// $cart->delete();

// $items = new CatalogItems();
// var_dump($items->getOne(1));

