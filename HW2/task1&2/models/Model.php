<?php
namespace app\models;

use app\engine\DB;
use app\interfaces\IModel;


abstract class Model implements IModel
{
    protected $db;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    public function getOne(int $id){
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `id` = $id";
        return $this->db->queryOne($sql);
    }
    public function getAll(){
        $sql = "SELECT * FROM `{$this->getTableName()}`";
        return $this->db->queryAll($sql);
    }
    public abstract function getTableName();
}