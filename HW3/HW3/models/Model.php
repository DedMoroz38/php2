<?php
namespace app\models;

use app\engine\DB;
use app\interfaces\IModel;


abstract class Model implements IModel
{
    public function insert(){
        $variables = '';
        $values = '';
        $params = [];
        foreach($this as $key => $value){
            if ($key === "id"){
                continue;
            } else {
                $params[$key] = $value;
                $variables .= "`$key`";
                $values .= ":$key";
                if (end($this) == $value) {
                    continue;
                } else {
                    $variables .= ", ";
                    $values .= ", ";
                }
            }
        }
        

        $sql = "INSERT INTO `{$this->getTableName()}` ($variables) VALUES ($values)";
        DB::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
        return $this;

    }
    public function delete(){
        $sql = "DELETE FROM `{$this->getTableName()}` WHERE `id` = :id";
        return DB::getInstance()->execute($sql, ['id' => $this->id]);
    }
    public function getOne(int $id){
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `id` = :id";
        return DB::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }
    public function getAll(){
        $sql = "SELECT * FROM `{$this->getTableName()}`";
        return DB::getInstance()->queryAll($sql);
    }
    public abstract function getTableName();
}