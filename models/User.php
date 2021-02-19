<?php


class User
{
    public static function clear(){
        if (isset($_SESSION['email']) &&
            isset($_SESSION['username']) &&
            isset($_SESSION['pass']) &&
            isset($_SESSION['verify']))
        {
            unset($_SESSION['email']);
            unset($_SESSION['username']);
            unset($_SESSION['pass']);
            unset($_SESSION['verify']);
        }
    }


    public static function register($name, $email, $password)
    {
        $db = Db::getConnection();
        $checkEmail = self::checkEmailExists($email);

        if($checkEmail){
            $sql = 'INSERT INTO user (name, email, password) '
            . 'VALUES (:name, :email, :password)';

            $result = $db->prepare($sql);
            $result->bindParam(':name', $name, PDO::PARAM_STR);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->bindParam(':password', $password, PDO::PARAM_STR);
            return $result->execute();
        }else {
            return false;
        }

    }



    public static function edit($id, $name, $password)
    {
        $db = Db::getConnection();

        $sql = "UPDATE user 
            SET name = :name, password = :password 
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }


    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        $password_verify = password_verify($password, $user["password"]);

        if ($password_verify == true){
            if ($user) {
                self::createRecord($user['id'],$user['email']);
                return $user;
            }
            return false;
        }

    }

    public static function checkLoginState($connection){
        if (isset($_COOKIE["id"]) && isset($_COOKIE["token"]) && isset($_COOKIE["serial"])) {
            $userid = $_COOKIE["id"];
            $token = $_COOKIE["token"];
            $serial = $_COOKIE["serial"];

            $sql =
                '
                SELECT *
                FROM sessions
                WHERE session_user_id = :userid
                AND session_token = :token
                AND session_serial = :serial';
            $result = $connection->prepare($sql);
            $result->bindParam(':userid', $userid, PDO::PARAM_INT);
            $result->bindParam(':token', $token, PDO::PARAM_STR);
            $result->bindParam(':serial', $serial, PDO::PARAM_STR);
            $count = $result->execute();
            if ($count) {
                $row = $result->fetch();
                if (
                    $row["session_user_id"] == $_COOKIE["id"] &&
                    $row["session_token"] == $_COOKIE["token"] &&
                    $row["session_serial"] == $_COOKIE["serial"]
                )
                {
                    if (
                        $row["session_user_id"] == $_SESSION["id"] &&
                        $row["session_token"] == $_SESSION["token"] &&
                        $row["session_serial"] == $_SESSION["serial"]
                    )
                    {
                        return true;
                    }
                    else {
                        self::createSession(
                            $_COOKIE['user'], $_COOKIE['id'],
                            $_COOKIE['token'], $_COOKIE['serial']
                        );
                        return true;
                    }
                }
            }

        } else {
            return false;
        }
    }


    public static function auth($userId)
    {
        $_SESSION['id'] = $userId;
    }

    public static function checkLogged()
    {
        if (isset($_COOKIE['id'])) {
            return $_COOKIE['id'];
        }

        header("Location: /user/login");
    }

    public static function isGuest()
    {
        if (isset($_COOKIE['id'])) {
            return false;
        }
        return true;
    }

    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }


    public static function checkPhone($phone)
    {
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }


    public static function checkPasswordRep($password,$repPassword)
    {
        $checkPassword = preg_match("/^[a-z0-9_-]{3,16}$/", $password);

        if ($checkPassword && $password === $repPassword) {
            return true;
        }
        return false;
    }
    public static function checkPassword($password)
    {
        $checkPassword = preg_match("/^[a-z0-9_-]{3,16}$/", $password);

        if ($checkPassword) {
            return true;
        }
        return false;
    }


    public static function checkEmail($email)
    {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }


    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn() > 0){
            return false;

        }else{
            return true;

        }
    }

    public static function getUserById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }
    public static function updateUserById($id,$userRole)
    {

        $db = Db::getConnection();

        $sql = "UPDATE user
            SET  
                role = :role
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':role', $userRole, PDO::PARAM_STR);
        return $result->execute();
    }
    public static function deleteUserById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM user WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }


    public  static function  createRecord($user_id, $user_username) {
//        die($user_id.$user_username);
        $connection = Db::getConnection();

        $query = 'DELETE FROM sessions WHERE session_user_id = :user_id';
        $result = $connection->prepare($query);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->execute();

        $token = self::createString(30);
        $serial = self::createString(30);

        self::createSession($user_username, $user_id, $token, $serial);
        self::createCookie($user_username, $user_id, $token, $serial);
        $query = 'INSERT INTO sessions (session_user_id, session_token, session_serial)'
                .'VALUES (:user_id, :token, :serial)';
        $result = $connection->prepare($query);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->bindParam(':token', $token, PDO::PARAM_STR);
        $result->bindParam(':serial', $serial, PDO::PARAM_STR);
        return $result->execute();


    }
    public static function createCookie($user_username, $user_id, $token, $serial) {
        setcookie('user', $user_username, time() + (86400) * 30, "/");
        setcookie('id', $user_id, time() + (86400) * 30, "/");
        setcookie('token', $token, time() + (86400) * 30, "/");
        setcookie('serial', $serial, time() + (86400) * 30, "/");
    }

    public static function deleteCookie() {
        setcookie('user', '', time() - 1, "/");
        setcookie('id', '', time() - 1, "/");
        setcookie('token', '', time() - 1, "/");
        setcookie('serial', '', time() - 1, "/");
    }

    public static function createSession($user_username, $user_id, $token, $serial) {
        $_SESSION["user"] = $user_username;
        $_SESSION["id"] = $user_id;
        $_SESSION["token"] = $token;
        $_SESSION["serial"] = $serial;
    }

    public static function createString($len) {
        $string = "1qay2wsx3edc4rfv5tgb6zhn7ujm8ik9olpAQWSXEDCVFRTGBNHYZUJMKILOP";

        return substr(str_shuffle($string), 0, $len);
    }
    public static function getUserList()
    {

        $db = Db::getConnection();
        $userId = $_SESSION['id'];

        $result = $db->query("SELECT id, name, email,role  FROM user where id <> '$userId'");
        $userList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $userList[$i]['id'] = $row['id'];
            $userList[$i]['name'] = $row['name'];
            $userList[$i]['email'] = $row['email'];
            $userList[$i]['role'] = $row['role'];
            $i++;
        }
        return $userList;
    }

}
