<?php


class Product
{

    const SHOW_BY_DEFAULT = 6;

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $db = Db::getConnection();
        $min = 0;
        $max = 200000;

        /*$sql = 'SELECT id, name, price, is_new,preview FROM product '
                . 'WHERE  status = "1" ORDER BY id DESC '
                . 'LIMIT :count';*/
        $sql = "SELECT id, name, price,discount,quantity, is_new,preview FROM product WHERE  status = '1' ORDER BY id DESC LIMIT :count";

        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['discount'] = $row['discount'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $productsList[$i]['preview'] = $row['preview'];
            $productsList[$i]['quantity'] = $row['quantity'];
            $i++;
        }
        return $productsList;
    }


    public static function getProductsListByCategory($categoryId,$min= 0,$max = 150, $page = 1)
    {

        $limit = Product::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();

        $sql = "SELECT id, name, price,discount, is_new,preview,quantity FROM product "
                . "WHERE price >= $min and price <= $max and status = 1 AND category_id = :category_id "
                . "ORDER BY id ASC LIMIT :limit OFFSET :offset";

        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        $result->execute();

        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['discount'] = $row['discount'];
            $products[$i]['is_new'] = $row['is_new'];
            $products[$i]['preview'] = $row['preview'];
            $products[$i]['quantity'] = $row['quantity'];
            $i++;
        }
        return $products;
    }


    public static function getProductById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM product WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();
        return $result->fetch();
    }
    public static function getDate($id)
    {
        $db = Db::getConnection();

        $sql ="SELECT DAY(product_date) AS day FROM product WHERE status = '1' AND id IN ($id)";

        $result = $db->query($sql);


        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['day'];


    }

    public static function getTotalProductsInCategory($categoryId)
    {
        $db = Db::getConnection();

        $sql = 'SELECT count(id) AS count FROM product WHERE status="1" AND category_id = :category_id';

        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);

        $result->execute();

        $row = $result->fetch();
        return $row['count'];
    }

    public static function getProdustsByIds($idsArray)
    {
        $db = Db::getConnection();

        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

        $result = $db->query($sql);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['quantity'] = $row['quantity'];
            $products[$i]['preview'] = $row['preview'];
            $i++;
        }
        return $products;
    }

    public static function getRecommendedProducts()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT id, name, price, is_new FROM product '
                . 'WHERE status = "1" AND is_recommended = "1" '
                . 'ORDER BY id DESC');
        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $productsList;
    }

    public static function getProductsList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT id, name, price,quantity, code,preview FROM product ORDER BY id ASC');
        $productsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['code'] = $row['code'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['quantity'] = $row['quantity'];
            $productsList[$i]['preview'] = $row['preview'];
            $i++;
        }
        return $productsList;
    }
    public static function getProductImagesList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT images_preview FROM product_images ORDER BY id ASC');
        $productsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['code'] = $row['code'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['quantity'] = $row['quantity'];
            $productsList[$i]['preview'] = $row['preview'];
            $i++;
        }
        return $productsList;

    }

    public static function deleteProductById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM product WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updateProductById($id, $options)
    {
        $db = Db::getConnection();

        $stmt = "UPDATE product
            SET 
                name = :name, 
                code = :code, 
                price = :price, 
                discount = :discount, 
                quantity = :quantity,
                category_id = :category_id, 
                brand = :brand, 
                availability = :availability, 
                description = :description, 
                is_new = :is_new, 
                is_recommended = :is_recommended, 
                status = :status
                /*preview = :preview*/
            WHERE id = :id";

        $result = $db->prepare($stmt);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':discount', $options['discount'], PDO::PARAM_STR);
        $result->bindParam(':quantity', $options['quantity'], PDO::PARAM_INT);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
//        $result->bindParam(':preview', $options['preview'], PDO::PARAM_STR);
        $result->execute();
        return $result->execute();
    }

    public static function createProduct($options)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO product '
                . '(name, code, price, quantity, category_id, brand, availability,'
                . 'description, is_new, is_recommended, status)'
                . 'VALUES '
                . '(:name, :code, :price, :quantity, :category_id, :brand, :availability,'
                . ':description, :is_new, :is_recommended, :status)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':quantity', $options['quantity'], PDO::PARAM_INT);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
//        $result->bindParam(':preview', $options['preview'], PDO::PARAM_STR);

        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }


    public static function getAvailabilityText($availability)
    {
        switch ($availability) {
            case '1':
                return 'В наличии';
                break;
            case '0':
                return 'Под заказ';
                break;
        }
    }
    public static function createProductImage($images_preview,$id){

        $db = Db::getConnection();
        $sql = 'INSERT INTO product_images'
            .'(images_preview,product_id)'
            .'VALUES'
            .'(:images_preview,:id)';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':images_preview', $images_preview, PDO::PARAM_STR);

            if ($result->execute()) {
                return $db->lastInsertId();
            }
            return 0;

    }
    public static function updateProductImage($images_preview,$id){
//        var_dump($images_preview);
//        echo $images_preview;
//        die();

        $db = Db::getConnection();
        $stmt = "UPDATE product_images
            SET 
                images_preview = :images_preview
            WHERE product_id = :id";
        $result = $db->prepare($stmt);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':images_preview', $images_preview, PDO::PARAM_STR);

        $result->execute();
        return $result->execute();

    }
    public static function deleteProductImages($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM product_images WHERE product_id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }


    /*public static function getImage($id)
    {
        $noImage = 'noimage.png';

        $path = '/upload/images/';

        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            return $pathToProductImage;
        }

        return $path . $noImage;
    }*/
    public static function getImage($product_id){
        $db = Db::getConnection();

        $sql = 'SELECT * FROM product_images WHERE product_id = :product_id';
        $result = $db->prepare($sql);
        $result->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();
        return $result->fetchAll();

    }

}
