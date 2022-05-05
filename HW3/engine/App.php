<?php

namespace app\engine;

use app\models\repositories\CartRepository;
use app\models\repositories\CatalogItemsRepository;
use app\models\repositories\OrderRepository;
use app\models\repositories\UserRepository;
use app\traits\TSingletone;

/**
 * Class App
 * @property Request $request
 * @property CartRepository $cartRepository
 * @property UserRepository $userRepository
 * @property CatalogItemsRepository $catalogItemsRepository
 * @property OrderRepository $orderRepository
 * @property Db $db
 */
class App
{
    use TSingletone;

    public $config;
    private $components;
    private $controller;
    private $action;

    public function run($config)
    {
        $this->config = $config;
        $this->components = new Storage();
        $this->runController();
    }

    protected function runController() {
        $this->controller = $this->request->getControllerName() ?: 'index';
        $this->action = $this->request->getActionName();
        $controllerClass = $this->config['controllers_namespaces'] . ucfirst($this->controller) . "Controller";
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass(new Render());
            $controller->runAction($this->action);
        } else {
            echo "404";
        }
    }

    public function createComponent($name)
    {
        if (isset($this->config['components'][$name])) {
            $params = $this->config['components'][$name];
            $class = $params['class'];
            if (class_exists($class)) {
                unset($params['class']);

                $reflection = new \ReflectionClass($class);
                return $reflection->newInstanceArgs($params);
            } else {
                Die("Нет класса компонента, $class");
            }
        } else {
            Die("Нет такого компонента, $name");
        }
    }

    /**
     * @return static
     */
    public static function call()
    {
        return static::getInstance();
    }

    public function __get($name)
    {
        return $this->components->get($name);
    }
}