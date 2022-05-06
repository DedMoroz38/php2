<?php
namespace app\models;

use app\engine\DB;
use app\interfaces\IRepository;
use app\engine\App;


abstract class Repository implements IRepository
{
    protected abstract function getTableName();
    protected abstract function getEntityName();

    public function insert(Model $entity){
        $variables = [];
        $params = [];
        foreach($entity->props as $key => $value){
            $variables[] = $key;
            $params[":" . $key] = $entity->$key;
        }
        $variables = implode(", ", $variables);
        $values = implode(', ', array_keys($params));
        $tableName = $this->getTableName();

        $sql = "INSERT INTO `$tableName` ($variables) VALUES ($values)";
        App::call()->db->execute($sql, $params);
        $entity->id = App::call()->db->lastInsertId();
        return $this;
    }

    public function update(Model $entity){
        $variables = [];
        $params = [];
        foreach($entity->props as $key => $value){
            if(!$value) continue;


            $params[":" . $key] = $entity->$key;
            $variables[] = "`$key`" . " = :" . "$key";

            $entity->props[$key] = false;
        }
        $variables = implode(", ", $variables);

        $tableName = $this->getTableName();

        $sql = "UPDATE `$tableName` SET $variables WHERE `id` = $entity->id";
        App::call()->db->execute($sql, $params);
        return $this;
    }

    public function save(Model $entity){
        if(is_null($entity->id)){
            $this->insert($entity);
        } else {
            $this->update($entity);
        }
    }
    public function getWhere($name, $value){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE `{$name}` = :value";
        return App::call()->db->queryOneObject($sql, ['value' => $value], $this->getEntityName());
    }

    public function getCountWhere($name, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT count(id) as count FROM {$tableName} WHERE {$name} = :value";
        return App::call()->db->queryOne($sql, ['value' => $value])['count'];
    }

    public function staticDelete($id){
        $tableName = $this->getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE `id` = :id";
        return App::call()->db->execute($sql, ['id' => $id]);
    }

    public function delete(Model $entity){
        $sql = "DELETE FROM `{$this->getTableName()}` WHERE `id` = :id";
        return App::call()->db->execute($sql, ['id' => $entity->id]);
    }
    public function getOne(int $id){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE `id` = :id";
        return App::call()->db->queryOneObject($sql, ['id' => $id], $this->getEntityName());
    }
    public function getAll(){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return App::call()->db->queryAll($sql);
    }
    public function getLimit($limit, $offset){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` LIMIT $limit OFFSET $offset";
        return App::call()->db->queryAll($sql);
    }
}