<?php


class Category
{

    public static function getCategoriesList()
    {

        $db = Db::getConnection();

        $result = $db->query('SELECT id, name,img_preview FROM category WHERE status = "1" ORDER BY sort_order, name ASC');
        $i = 0;
        $categoryList = array();
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['img_preview'] = $row['img_preview'];
            $i++;
        }
        return $categoryList;
    }


    public static function getCategoriesListAdmin()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT id, name, sort_order, status,img_preview FROM category ORDER BY sort_order ASC');

        $categoryList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $categoryList[$i]['img_preview'] = $row['img_preview'];
            $i++;
        }
        return $categoryList;
    }

    public static function deleteCategoryById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM category WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }


    public static function updateCategoryById($id, $name, $sortOrder, $status,$img)
    {
        $db = Db::getConnection();

        $sql = "UPDATE category
            SET 
                name = :name, 
                sort_order = :sort_order, 
                status = :status,
                img_preview = :img
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':img', $img, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function getCategoryById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM category WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        return $result->fetch();
    }

    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Is displayed';
                break;
            case '0':
                return 'Hidden';
                break;
        }
    }

    public static function createCategory($name, $sortOrder, $status,$img_preview)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO category (name, sort_order, status,img_preview) '
                . 'VALUES (:name, :sort_order, :status, :img_preview)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':img_preview', $img_preview, PDO::PARAM_STR);
        return $result->execute();
    }

}
