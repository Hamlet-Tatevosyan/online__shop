<?php


class SiteController
{


    public function actionIndex()
    {
        $categories = Category::getCategoriesList();

        $latestProducts = Product::getLatestProducts(12);
        $sliderProducts = Product::getRecommendedProducts();

        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    public function actionContact()
    {
        $categories = Category::getCategoriesList();
        $userEmail = false;
        $userText = false;
        $result = false;

        /*if (isset($_POST['submit'])) {
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];

            $errors = false;

            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }

            if ($errors == false) {
                $adminEmail = 'htatevosyan98@gmail.com';
                $message = "Текст: {$userText}. От {$userEmail}";
//                $message = wordwrap($message, 70, "\r\n");
                $subject = 'Message';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }*/

        require_once(ROOT . '/views/site/contact.php');
        return true;
    }

    public function actionAbout()
    {
        $categories = Category::getCategoriesList();

        require_once(ROOT . '/views/site/about.php');
        return true;
    }

}
