<?php
namespace app\models;


class CatalogItems extends DBModel 
{
    protected $id;
    protected $name;
    protected $image;
    protected $description;
    protected $price;

    protected $props = [
        'name' => false,
        'image' => false,
        'description' => false,
        'price' => false
    ];

    public function __construct($name = null, $image = null, $description = null, $price = null)
    {
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
        $this->price = $price;
    }

    public static function getTableName(){
        return "catalogItems";
    }
 }