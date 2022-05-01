<?php
namespace app\engine;

use app\traits\TSingletone;

class DB 
{
    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => 'root',
        'database' => 'Gallery',
        'charset' => 'utf8'
    ];
    private $connection = null;

    use TSingletone;

    private function getConnection()
    {
        global $connection;
        if(is_null($connection)){
            $this->connection = new \PDO($this->prepareDsnString(),
            $this->config['login'],
            $this->config["password"]
            );
        }
        return $this->connection;
    }

    public function lastInsertId()
    {
        return $this->getConnection()->lastInsertId();
    }

    private function prepareDsnString()
    {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config["driver"],
            $this->config["host"],
            $this->config['database'],
            $this->config["charset"],
        );
        $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    }
    public function queryOneObject($sql, $params, $class)
    {
        $STH = $this->query($sql, $params);
        $STH->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        $obj = $STH->fetch();
        if (!$obj){
            throw new \Exception("Product is not found", 404);
        }
        return $obj;
    }

    private function query($sql, $params){
        $STH = $this->getConnection()->prepare($sql);
        $STH->execute($params);
        return $STH;
    }

    public function queryOne($sql, $params = [])
    {
        $result = $this->query($sql, $params)->fetch();
        $result =  $this->query($sql, $params)->rowCount();
        if (!$result){
            throw new \Exception("There was an error!!!", 404);
        }
        return $result;
    }
    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }
    public function execute($sql, $params = [])
    {
        $result =  $this->query($sql, $params)->rowCount();
        if (!$result){
            throw new \Exception("There was an error!", 404);
        }
        return $result;
    }


}