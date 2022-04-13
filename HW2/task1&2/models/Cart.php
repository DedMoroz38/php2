<?php
namespace app\models;

use app\engine\DB;

class Cart extends Model 
{
    public $id;

    public function getTableName(){
        return "cart";
    }
 }