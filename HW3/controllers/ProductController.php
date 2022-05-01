<?php 

namespace app\controllers;

use app\models\repositories\CatalogItemsRepository;

class ProductController extends Controller
{
    protected function actionCatalog()
    {
        $page = $_GET['page'] ?? 1;
        $catalog = (new CatalogItemsRepository())->getLimit(2, $page * 2 - 2);
        echo $this->render('product/catalog', [
            "catalog" => $catalog,
            'page' => ++$page
        ]);
    }
    protected function actionProduct()
    {
        $id = $_GET["id"];
        $product = (new CatalogItemsRepository())->getOne($id);
        echo $this->render('product/product', [
            "product" => $product
        ]);
    }
}