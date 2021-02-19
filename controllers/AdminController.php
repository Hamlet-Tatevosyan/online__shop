<?php


class AdminController extends AdminBase
{
    public function actionIndex()
    {
//        self::checkAdmin();
//        die(self::checkAdmin());

        require_once ROOT . '/views/'.self::checkAdmin();
    }
    public function actionUser()
    {
        self::checkAdmin();
        $userList = User::getUserList();
        require_once(ROOT . '/views/admin_userList/index.php');
        return true;

    }

    public function actionUpdate($id)
    {
        self::checkAdmin();
        $user = User::getUserById($id);

        if (isset($_POST['submit'])) {
            $userRole = $_POST['role'];

            User::updateUserById($id, $userRole);

            header("Location: /admin/user/");
        }
        require_once(ROOT . '/views/admin_userList/update.php');
        return true;
    }
    public function actionDelete($id)
    {
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            User::deleteUserById($id);

            header("Location: /admin/user");
        }

        require_once(ROOT . '/views/admin_userList/delete.php');
        return true;
    }
}