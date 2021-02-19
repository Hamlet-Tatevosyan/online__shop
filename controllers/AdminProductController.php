<?php


class AdminProductController extends AdminBase
{


    public function actionIndex()
    {
        self::checkAdmin();

        $productsList = Product::getProductsList();

        require_once(ROOT . '/views/admin_product/index.php');
        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();

        $categoriesList = Category::getCategoriesListAdmin();

        if (isset($_POST['submit'])) {

            $count = count($_FILES['files']['name']);

            /*if ($_FILES['image']['name'] == '') {
                $options['preview'] = "noimage.png";

            } else {

                $options['preview'] =  $_FILES['image']['name'];

            }*/

            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['quantity'] = $_POST['quantity'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            $errors = false;

            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Type the title';
            }

            if ($errors == false) {
                $id = Product::createProduct($options);


                if ($id) {
                    for ($i = 0; $i < $count; $i++){

                        if ($_FILES['files']['name'][$i] == ''){
                            $filename = 'noimage.png';
                        }else{
                            $filename = $_FILES['files']['name'][$i];
                        }
                        Product::createProductImage($filename,$id);
                        if (is_uploaded_file($_FILES["files"]["tmp_name"][$i])) {
                            move_uploaded_file($_FILES["files"]["tmp_name"][$i], $_SERVER['DOCUMENT_ROOT'] .'/upload/images/'.$id.$filename);
                        }
                    }
                }
                header("Location: /admin/product");
            }
        }

        require_once(ROOT . '/views/admin_product/create.php');
        return true;
    }

    public function actionUpdate($id)
    {
        self::checkAdmin();
        $categoriesList = Category::getCategoriesListAdmin();
        $product = Product::getProductById($id);
        $img = Product::getImage($id);

        if (isset($_POST['submit'])) {

            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['discount'] = $_POST['discount'];
            $options['quantity'] = $_POST['quantity'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];


            $count = count($_FILES['files']['name']);
            $images = $_FILES['files']['name'];



            for ($i = 0; $i < $count; $i++){
                if ($_FILES['files']['name'][$i] == ''){
                    for ($j = 0;$j < count($img); $j++){
                        $filename = $img[$j]['images_preview'];
                        Product::updateProductImage($filename,$id);
                    }

                }else{
                    $filename = $_FILES['files']['name'][$i];
                    Product::updateProductImage($filename,$id);
                }
//                Product::updateProductImage($filename,$id);
                Product::updateProductById($id,$options);
                if (is_uploaded_file($_FILES["files"]["tmp_name"][$i])) {
                    move_uploaded_file($_FILES["files"]["tmp_name"][$i], $_SERVER['DOCUMENT_ROOT'] .'/upload/images/'.$id.$filename);
                }
            }
            header("Location: /admin/product");
        }

        require_once(ROOT . '/views/admin_product/update.php');
        return true;
    }
    public function actionDelete($id)
    {
        self::checkAdmin();
        $product = Product::getProductById($id);
        $img = Product::getImage($id);
        $count = count($img);

        if (isset($_POST['submit'])) {
            if(Product::deleteProductById($id) && Product::deleteProductImages($id)){
                for ($i = 0; $i < $count; $i++) {
                    if ($img[$i]['images_preview'] == "noimage.png") {
                        header("Location: /admin/product");

                    } else {
                        unlink($_SERVER['DOCUMENT_ROOT'] . '/upload/images/' .$id. $img[$i]['images_preview']);
                    }
                }
            }


            /*if (Product::deleteProductById($id)){
               if ($img[0]['images_preview'] == "noimage.png"){
                   header("Location: /admin/product");
               }else{
                   unlink($_SERVER['DOCUMENT_ROOT'] .'/upload/images/'.$product['preview'] );

               }
           }*/
            header("Location: /admin/product");
        }

        require_once(ROOT . '/views/admin_product/delete.php');
        return true;
    }

}
