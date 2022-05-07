<?php 

namespace app\controllers;

class IndexController extends Controller
{
    protected function actionIndex()
    {
        echo $this->render("index");
    }
}