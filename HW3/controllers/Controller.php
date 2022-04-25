<?php 

namespace app\controllers;

abstract class Controller
{
    private $action;
    private $defaultAction = "index";

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

    public function renderTemplate($template, $params = [])
    {
        ob_start();
        extract($params);
        include "../views/" . $template . ".php";
        return ob_get_clean();
    }
}