<?php
namespace app\models;

use app\engine\DB;
use app\interfaces\IRepository;


abstract class Model
{
    protected $props = [];

    public function __set($name, $value)
    {
        $this->props[$name] = true;
        $this->$name = $value;
    }
    public function __get($name)
    {
        return $this->$name;
    }

    public function __isset($name)
    {
        return ($this->$name);
    }

}