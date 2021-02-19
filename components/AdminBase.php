<?php

abstract class AdminBase
{

    public static function checkAdmin()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);



        if ($user['role'] == 'admin') {
            return 'admin/index.php';
        }else {
            return "site/index.php";
        }

    }

}