<?php
include "../engine/Autoload.php";
session_start();

use app\models\{Cart, User, CatalogItems, Orders};
use app\engine\{DB,Render, Request};
use app\interfaces\IModel;
include "../config/config.php";


spl_autoload_register([new Autoload(), "loadClass"]);
require_once "../vendor/autoload.php";



$request = new Request();

$controllerName = $request->getControllerName() ?: 'index';
$actionName = $request->getActionName();



 $controllerClass = CONTROLLER_NAMESPACE. ucfirst($controllerName) . "Controller";

 if(class_exists($controllerClass)){
     $controller = new $controllerClass(new Render());
     $controller->runAction($actionName);
 } else {
     die("No such class");
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

