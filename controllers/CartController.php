<?php


class CartController
{

    /**
     * @param integer $id <p>id</p>
     */
    public function actionAdd($id)
    {
        Cart::addProduct($id);

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }


    public function actionAddAjax($id)
    {
        echo Cart::addProduct($id);
        return true;
    }
    public function actionDelAjax($id)
    {
        echo Cart::delProduct($id);
        return true;
    }


    public function actionDelete($id)
    {
        Cart::deleteProduct($id);

        header("Location: /cart");
    }
    public function actionIndex()
    {
        $categories = Category::getCategoriesList();

        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);

            $products = Product::getProdustsByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }
        require_once(ROOT . '/views/cart/index.php');
        return true;
    }



    public function actionCheckout()
    {
        $productsInCart = Cart::getProducts();

        if ($productsInCart == false) {
            header("Location: /");
        }

        $categories = Category::getCategoriesList();

        $productsIds = array_keys($productsInCart);
        $products = Product::getProdustsByIds($productsIds);

        $totalPrice = Cart::getTotalPrice($products);

        $totalQuantity = Cart::countItems();

        $userName = false;
        $userPhone = false;
        $userComment = false;
        $userEmail = false;

        $result = false;
        if (!User::isGuest()) {
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $userName = $user['name'];
        } else {
            $userId = false;
        }

        if (isset($_POST['submit'])) {
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];
            $userEmail = $_POST['email'];

            $errors = false;

            if (!User::checkName($userName)) {
                $errors[] = 'Wrong name';
            }
            if (!User::checkPhone($userPhone)) {
                $errors[] = 'Wrong phone';
            }
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Invalid Email';
            }


            if ($errors == false) {
                $result = Order::save($userName, $userPhone, $userEmail ,$userComment, $userId, $productsInCart);
                for ($i = 0; $i < count($productsIds); $i++){
                    /*echo $productsIds[$i];
                    echo $productsInCart[$productsIds[$i]];*/

                    /*
                     @ndhanur qanakic hanum e patveri qanaki chapov

                    */
                    $QntProduct = Order::productQty($productsIds[$i],$productsInCart[$productsIds[$i]]);

                }

                if ($result) {
                    require_once 'template/PHPMailer/src/PHPMailer.php';
                    require_once 'template/PHPMailer/src/SMTP.php';
                    require_once 'template/PHPMailer/src/Exception.php';
                    $mail = new PHPMailer\PHPMailer\PHPMailer();
                    $mail->CharSet = 'utf-8';
                    $name = "Ham";
                    $phone = "+dsxc";
                    $email = "h.tatevosyan@mail.ru";
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'h.tatevosyan@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
                    $mail->Password = '096252223ham'; // Ваш пароль от почты с которой будут отправляться письма
                    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 465;
                    $mail->setFrom('h.tatevosyan@mail.ru'); // от кого будет уходить письмо?
                    $mail->addAddress('htatevosyan98@gmail.com');
                    $mail->isHTML(true);                                  // Set email format to HTML

                    $mail->Subject = 'Заявка с тестового сайта';
                    $mail->Body    = '' .$name . ' оставил заявку, его телефон ' .$phone. '<br>Почта этого пользователя: ' .$email;
                    $mail->AltBody = '';

                    if(!$mail->send()) {
                        echo 'Error';
                    } else {
                        header('location: thank-you.html');
                    }

                    Cart::clear();
                }
            }
        }
        require_once(ROOT . '/views/cart/checkout.php');
        return true;
    }
}
