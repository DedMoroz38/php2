<?php 

namespace app\controllers;
use app\engine\Render;
use app\interfaces\IRender;

abstract class Controller
{
    private $action;
    private $defaultAction = "index";

    public function __construct(IRender $render)
    {
        $this->render = $render;
    }


    public function runAction($action)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)){
            $this->$method();
        } else {
            die("Action {$method}() do not exist!");
        }
    }

    public function render($template, $params = [])
    {
        return $this->renderTemplate('layouts/main', [
            'menu' => $this->renderTemplate('menu', $params),
            'content' => $this->renderTemplate($template, $params)
        ]);
    }
    public function renderTemplate($template, $params)
    {
         return $this->render->renderTemplate($template, $params);
    }

}