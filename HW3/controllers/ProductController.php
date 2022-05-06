<?php 

namespace app\controllers;

use app\engine\App;
use app\models\repositories\CatalogItemsRepository;

class ProductController extends Controller
{
    protected function actionCatalog()
    {
        $page = $_GET['page'] ?? 1;
        $catalog = App::call()->catalogItemsRepository->getLimit(2, $page * 2 - 2);
        echo $this->render('product/catalog', [
            "catalog" => $catalog,
            'page' => ++$page
        ]);
    }
    protected function actionProduct()
    {
        $id = $_GET["id"];
        $product = App::call()->catalogItemsRepository->getOne($id);
        echo $this->render('product/product', [
            "product" => $product
        ]);
    }
}