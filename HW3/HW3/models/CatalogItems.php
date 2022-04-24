<?php
namespace app\models;


class CatalogItems extends Model 
{
    public $id;
    public $name;
    public $image;
    public $description;
    public $price;

    public function __construct($name = null, $image = null, $description = null, $price = null)
    {
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
        $this->price = $price;
    }

    public function getTableName(){
        return "catalogItems";
    }
 }