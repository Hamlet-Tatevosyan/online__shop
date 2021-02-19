<?php

/**
 * Контроллер ProductController
 * Товар
 */
class ProductController
{

    /**
     * @param integer $productId <p>id</p>
     */
    public function actionView($productId)
    {


        $categories = Category::getCategoriesList();
        $images = Product::getImage($productId);
        $product = Product::getProductById($productId);
        $productDate = Product::getDate($productId);
        $getCategory = Category::getCategoryById($product['category_id']);
//        die($productDate.date("Y/m/d"));


        require_once(ROOT . '/views/product/view.php');
        return true;
    }
   /* public  function rangePrice()
    {
      if (isset($_POST['range']))  {

      }
    }*/

}
