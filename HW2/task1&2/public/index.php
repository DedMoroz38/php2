<?php

include "../engine/Autoload.php";

use app\models\{Cart, User};
use app\engine\DB;
use app\interfaces\IModel; 
 

spl_autoload_register([new Autoload(), "loadClass"]);



$DB = new DB();
$user = new User($DB);
$cart = new Cart($DB);

var_dump($user->getOne(6) . "<br>");
var_dump($cart->getAll());