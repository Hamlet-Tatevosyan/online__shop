<?php

class CatalogController
{

    public function actionIndex()
    {


        $categories = Category::getCategoriesList();

        $latestProducts = Product::getLatestProducts(12);

        require_once(ROOT . '/views/catalog/index.php');
        return true;
    }


    public function actionCategory($categoryId, $page = 1)
    {
        if(isset($_POST['submit_range']))
        {
            $price1 = $_POST['amount1'];
            $price2 = $_POST['amount2'];


        }
        $categoryProducts = Product::getProductsListByCategory($categoryId,$page);

        $categories = Category::getCategoriesList();

        $total = Product::getTotalProductsInCategory($categoryId);

        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/category.php');
        return true;
    }

}
