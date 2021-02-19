<?php

class UserController
{


    public function actionLogin()
    {
        $categories = Category::getCategoriesList();

        $check = User::checkLoginState(Db::getConnection());
        if (!$check){
            $email = false;
            $password = false;

            if (isset($_POST['submit'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $errors = false;


                if (!User::checkEmail($email)) {
                    $errors[] = 'Not correct email';
                }
                if (!User::checkPassword($password)) {
                    $errors[] = 'Password not shorter 6';

                }
                if($errors){
                    $errors[] = 'Incorrect login details';

                } else {
                    $user = User::checkUserData($email, $password);


                    if ($user){
                        if ($user['role'] == 'admin') {
//                        User::auth(($user['id']));
                            header("Location: /admin");

                        } else {
//                        User::auth(($user['id']));
                            header("Location: /");

                        }
                    }else {
                        $errors[] = 'Incorrect username and/or password';
                    }

                }

            }

        }

        require_once(ROOT . '/views/user/login.php');
        return true;
    }

    public function actionLogout()
    {


        unset($_SESSION["id"]);
        User::deleteCookie();

        header("Location: /admin");
    }


    public function actionRegister ()
    {
        $categories = Category::getCategoriesList();

        require_once 'template/PHPMailer/src/PHPMailer.php';
        require_once 'template/PHPMailer/src/SMTP.php';
        require_once 'template/PHPMailer/src/Exception.php';
        $result = false;
        $email = false;
        $password = false;
        $userName = false;
        $phone = false;


        if (isset($_POST['submit'])) {

            $email_user = $_POST['email'];
            $password = $_POST['password'];
            $repPassword = $_POST['passwordrep'];
            $userName = $_POST['userName'];
            $phone = $_POST['phone'];
            $verifyCode = rand(100000,999999);


            $errors = false;

            if (!User::checkEmail($email_user)) {
                $errors[] = 'Not correct email';
            }
            if (!User::checkEmailExists($email_user)) {
                $errors[] = 'Errorr Mail';
            }
            if (!User::checkName($userName)) {
                $errors[] = 'Not correct userName';
            }
            if (!User::checkPasswordRep($password,$repPassword)) {
                $errors[] = 'Password not shorter 6';
            }
            if (!User::checkPhone($phone)) {
                $errors[] = 'Not correct Phone';
            }
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            if($errors){
                $errors[] = 'Incorrect login details';

            } else {
                $_SESSION['email'] = $email_user;
                $_SESSION['username'] = $userName;
                $_SESSION['pass'] = $passwordHash;
                $_SESSION['verify'] = $verifyCode;
                $mail = new PHPMailer\PHPMailer\PHPMailer();
                $mail->CharSet = 'utf-8';
                $name = "Ham";
                $phone = "+995571646445";
                $email = "h.tatevosyan@mail.ru";
                $mail->isSMTP();
                $mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'h.tatevosyan@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
                $mail->Password = '096252223ham'; // Ваш пароль от почты с которой будут отправляться письма
                $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;
                $mail->setFrom('h.tatevosyan@mail.ru'); // от кого будет уходить письмо?
                $mail->addAddress($email_user);
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Verification code for Verify Your Email Address';

                $message_body =
                    '
                        <p>For verify your email address, enter this verification code when prompted: <b>'.$verifyCode.'</b>.</p>
                        <p>Sincerely,</p>
                    ';
                $mail->Body = $message_body;

                if($mail->Send())
                {
                    header("Location: /user/email/");
                    exit();
                }
                else
                {
                    $message = $mail->ErrorInfo;
                }
            }
        }
        require_once(ROOT . '/views/user/register.php');
        return true;

    }
    public function actionEmail()
    {
        $ver = false;

        if(isset($_POST['submit_verify'])){
            $ver = $_POST['email_verify'];
            $ver_ses = $_SESSION['verify'];
            $userName = $_SESSION['username'];
            $email_user = $_SESSION['email'];
            $passwordHash = $_SESSION['pass'];
            $errors = false;


            if (!($ver == $ver_ses)){
                $errors[] = 'Not correct verify cod';
            }else{
                $user = User::register($userName,$email_user,$passwordHash);
                if(!$user){
                    header("Location: /");
                }else {

                    User::clear();
                    header("Location: /user/login/?signup=success");
                    exit();
                }

            }
        }

        require_once(ROOT . '/views/user/email.php');
        return true;

    }

}
