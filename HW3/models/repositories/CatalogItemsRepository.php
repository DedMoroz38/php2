<?php

namespace app\models\repositories;

use app\models\entities\CatalogItems;
use app\models\Repository;

class CatalogItemsRepository extends Repository
{
    public function getTableName(){
        return "catalogItems";
    }
    public function getEntityName(){
        return CatalogItems::class;
    }
}