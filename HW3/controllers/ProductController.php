<?php 

namespace app\controllers;
use app\models\CatalogItems;

class ProductController extends Controller
{
    protected function actionCatalog()
    {
        $page = $_GET['page'] ?? 0;
        $catalog = CatalogItems::getLimit(2, $page * 2 - 2);
        echo $this->render('product/catalog', [
            "catalog" => $catalog,
            'page' => ++$page
        ]);
    }
    protected function actionProduct()
    {
        $id = $_GET["id"];
        $product = CatalogItems::getOne($id);
        echo $this->render('product/product', [
            "product" => $product
        ]);
    }
}