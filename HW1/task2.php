<?php
class DB {
    protected $tableName;
    protected $andWheres = [];
    protected $where = [];

    public function table($tableName){
        $this->tableName = $tableName;
        return $this;
    }
    public function andWhere($field, $value){
        $this->andWheres[] = [
            'field' => $field,
            'value' => $value
        ];
        return $this;
    }

    public function where($field, $value){
        $this->where[] = [
            $field,
            $value
        ];
        return $this;
    }

    public function getAll(){
        $sql = "SELECT * FROM `$this->tableName`";
        if(!empty($this->where)){
            $sql .= " WHERE " . $this->where[0][0] . " = `" . $this->where[0][1] . "`"; 
        }
        if (!empty($this->andWheres)) {
            foreach ($this->andWheres as $value) {
                $sql .= " AND " . $value['field'] . " = " . $value['value'];
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

