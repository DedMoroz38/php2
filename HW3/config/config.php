<?php
namespace app\constants;

define("CONTROLLER_NAMESPACE", 'app\\controllers\\');
define("VIEWS_DIR", '../views/');

use app\engine\Db;
use app\engine\Request;
use app\models\repositories\CartRepository;
use app\models\repositories\UserRepository;
use app\models\repositories\CatalogItemsRepository;
use app\models\repositories\OrderRepository;


return [
    'root' => dirname(__DIR__),
    'controllers_namespaces' => 'app\\controllers\\',
    'product_per_page' => 2,
    'views_dir' => dirname(__DIR__) . "/views/",
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => 'root',
            'database' => 'Gallery',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        'cartRepository' => [
            'class' => CartRepository::class
        ],
        'orderRepository' => [
            'class' => OrderRepository::class
        ],
        'catalogItemsRepository' => [
            'class' => CatalogItemsRepository::class
        ],
        'userRepository' => [
            'class' => UserRepository::class
        ],
//        'session' => [
//            'class' => Session::class
//        ]
    ]
];