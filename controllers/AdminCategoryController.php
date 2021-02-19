<?php


class AdminCategoryController extends AdminBase
{


    public function actionIndex()
    {
        self::checkAdmin();

        $categoriesList = Category::getCategoriesListAdmin();

        require_once(ROOT . '/views/admin_category/index.php');
        return true;
    }


    public function actionCreate()
    {
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];
            $img_preview = $_FILES['image']['name'];


            $errors = false;

            if ($img_preview == ''){
                $errors[] = 'Images empty';
            }
            if (!isset($name) || empty($name)) {
                $errors[] = 'Fill in the fields';
            }


            if ($errors == false) {
                $id = Category::createCategory($name, $sortOrder, $status,$img_preview);

                if ($id) {
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/category/{$_FILES['image']['name']}");


                    }
                }
                header("Location: /admin/category");
            }
        }

        require_once(ROOT . '/views/admin_category/create.php');
        return true;
    }

    public function actionUpdate($id)
    {
        self::checkAdmin();

        $category = Category::getCategoryById($id);

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];

            if ($_FILES['image']['name'] == '') {
                $img_preview = $category['img_preview'];
;
            } else {
                $img_preview = $_FILES['image']['name'];

            }

            if (Category::updateCategoryById($id, $name, $sortOrder, $status,$img_preview)){
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/category/{$_FILES['image']['name']}");
                }
            }
            header("Location: /admin/category");
        }

        require_once(ROOT . '/views/admin_category/update.php');
        return true;
    }

    public function actionDelete($id)
    {
        self::checkAdmin();
        $category = Category::getCategoryById($id);

        if (isset($_POST['submit'])) {
            if (Category::deleteCategoryById($id)){
                   unlink($_SERVER['DOCUMENT_ROOT'] .'/upload/images/category/'.$category['img_preview'] );
           }

            header("Location: /admin/category");
        }

        require_once(ROOT . '/views/admin_category/delete.php');
        return true;
    }

}
