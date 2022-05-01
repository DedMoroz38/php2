<?php

class RepositoryTest extends PHPUnit\Framework\TestCase
{
    public function testRepositoryGetOne(){
        $repositoryChild = new \app\models\repositories\CatalogItemsRepository();
        $this->assertEquals("Hoodie", $repositoryChild->getOne(1)->name);
    }
}