<?php

class CabinetController
{

    public function actionIndex()
    {
        $userId = User::checkLogged();
        $categories = Category::getCategoriesList();

        $user = User::getUserById($userId);

        require_once(ROOT . '/views/cabinet/index.php');
        return true;
    }


    public function actionEdit()
    {
        $userId = User::checkLogged();
        $categories = Category::getCategoriesList();

        $user = User::getUserById($userId);

        $name = $user['name'];



        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $old_password = $_POST['old_password'];
            $user_password = $user['password'];
            $password = $_POST['password'];
            $repPassword = $_POST['passwordrep'];


            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'The name must not be shorter than 2 characters';
            }
            if (!password_verify($old_password,$user_password)) {
                $errors[] = 'Old Password does not match';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Password must not be shorter than 6 characters';
            }
            if (!User::checkPasswordRep($password,$repPassword)) {
                $errors[] = 'Repeated password is incorrect';
            }


            if ($errors == false) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $result = User::edit($userId, $name, $passwordHash);
            }
        }

        require_once(ROOT . '/views/cabinet/edit.php');
        return true;
    }

}
