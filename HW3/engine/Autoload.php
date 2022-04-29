<?php 

class Autoload
{
    public function loadClass($className)
    {
        $fileName = str_replace("app\\", "../", $className);
        $fileName = str_replace("\\", "/", $fileName);
        include $fileName . ".php";
    }
}
