<?php
namespace app\models;

use app\engine\DB;


abstract class DBModel extends Model
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
        

        $sql = "INSERT INTO `{static::getTableName()}` ($variables) VALUES ($values)";
        DB::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
        return $this;

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