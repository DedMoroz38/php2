<?php
class DB {
    protected $tableName;
    protected $wheres = [];

    public function table($tableName){
        $this->tableName = $tableName;
        return $this;
    }
    

    public function where($field, $value){
        $this->wheres[] = [
            'field' => $field,
            'value' => $value
        ];
        return $this;
    }

    public function andWhere($field, $value){
        return $this->where($field, $value);
    }

    public function getAll(){
        $sql = "SELECT * FROM `$this->tableName`";      
        $sql .= " WHERE ";

        if(!empty($this->wheres)){
            foreach ($this->wheres as $value) {
                $sql .= $value["field"] . " = " . $value["value"];
                if ($value != end($this->wheres)) $sql .= " AND ";
            }
        }

        return $sql . "<br>";
    }

    public function getOne($id){
        return "SELECT * FROM $this->tableName WHERE id = `$id`;<br>";
    } 
}

$db = new DB();

echo $db->table("product")->where('name', 'Alex')->getAll();
echo $db->table("product")->where('name', 'Alex')->andWhere('session', 123)->andWhere('id', 5)->getAll();

