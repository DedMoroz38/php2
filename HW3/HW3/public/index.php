<?php

include "../engine/Autoload.php";

use app\models\{Cart, User, CatalogItems, Orders};
use app\engine\DB;
use app\interfaces\IModel; 
 

spl_autoload_register([new Autoload(), "loadClass"]);




// $user = new User("ma@gmail.com", "whatr3evr", "eff32fr34g5g/f4f");
$cart = new Cart();
$cart = $cart->getOne(3);
$cart->delete();

