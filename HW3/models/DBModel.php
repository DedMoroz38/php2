<?php
namespace app\models;

use app\engine\DB;


abstract class DBModel extends Model
{
    public function insert(){
        $variables = [];
        $params = [];
        foreach($this->props as $key => $value){
            $variables[] = $key;
            $params[":" . $key] = $this->$key;
        }
        $variables = implode(", ", $variables);
        $values = implode(', ', array_keys($params));
        $tableName = static::getTableName();

        $sql = "INSERT INTO `$tableName` ($variables) VALUES ($values)";
        DB::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
        return $this;

    }

    public function update(){
        $variables = [];
        $params = [];
        foreach($this->props as $key => $value){
            if(!$value) continue;


            $params[":" . $key] = $this->$key;
            $variables[] = "`$key`" . " = :" . "$key";

            $this->props[$key] = false;
        }
        $variables = implode(", ", $variables);

        $tableName = static::getTableName();

        $sql = "UPDATE `$tableName` SET $variables WHERE `id` = $this->id";
        DB::getInstance()->execute($sql, $params);
        return $this;
    }

    public function save(){
        if(is_null($this->id)){
            $this->insert();
        } else {
            $this->update();
        }
    }

    public function delete(){
        $sql = "DELETE FROM `{$this->getTableName()}` WHERE `id` = :id";
        return DB::getInstance()->execute($sql, ['id' => $this->id]);
    }
    public static function getOne(int $id){
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE `id` = :id";
        return DB::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }
    public static function getAll(){
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return DB::getInstance()->queryAll($sql);
    }
    public static function getLimit($limit, $offset){
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` LIMIT $limit OFFSET $offset";
        return DB::getInstance()->queryAll($sql);
    }
    public abstract static function getTableName();
}