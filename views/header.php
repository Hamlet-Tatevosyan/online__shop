<!DOCTYPE html>
<html lang="en">
<title>Electronics</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/upload/bg_img/online-shopping.png" rel="icon" type="image/x-icon">

<link rel="stylesheet" type="text/css" href="/template/vendor/bootstrap/css/bootstrap.min.css">
<!--<link rel="stylesheet" type="text/css" href="/template/fonts/font-awesome-4.7.0/css/font-awesome.min.css">-->
<link rel="stylesheet" type="text/css" href="/template/fonts/fontawesome-free-5.15.1-web/css/all.min.css">
<link rel="stylesheet" type="text/css" href="/template/fonts/themify/themify-icons.css">
<link rel="stylesheet" type="text/css" href="/template/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="/template/fonts/elegant-font/html-css/style.css">
<link rel="stylesheet" type="text/css" href="/template/vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="/template/vendor/css-hamburgers/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="/template/vendor/animsition/css/animsition.min.css">
<link rel="stylesheet" type="text/css" href="/template/vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="/template/vendor/daterangepicker/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="/template/vendor/slick/slick.css">
<link rel="stylesheet" type="text/css" href="/template/vendor/jqueryui/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="/template/vendor/lightbox2/css/lightbox.min.css">
<link rel="stylesheet" type="text/css" href="/template/css/util.css">
<link rel="stylesheet" type="text/css" href="/template/css/main.css">



<body>
<header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">
        <div class="topbar">
            <div class="topbar-social">
                <a href="#" class="topbar-social-item fa fa-facebook"></a>
                <a href="#" class="topbar-social-item fa fa-instagram"></a>
                <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
            </div>

            <span class="topbar-child1">
					Free shipping
				</span>

            <div class="topbar-child2">
					<span class="topbar-email">
						@gmail.com
					</span>

                <div class="topbar-language rs1-select2">
                    <select class="selection-1" name="time">
                        <option>USD</option>
                        <option>EUR</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="wrap_header">
            <!-- Logo -->
            <a href="/" class="logo">
                <img src="/template/images/icons/logo.png" alt="IMG-LOGO">
            </a>

            <!-- Menu -->
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li>
                            <a id="bg" href="/">Home</a>
                        </li>

                        <li>
                            <a href="/">Shop</a>
                        </li>

                        <li class="">
                            <a href="/catalog">Categories</a>
                        </li>

                        <li>
                            <a href="cart/">Cart</a>
                        </li>


                        <li>
                            <a href="/about">About</a>
                        </li>

                        <li>
                            <a href="/contact/">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">

                <!--<a href="/admin" class="header-wrapicon1 dis-block">

                    <img src="/template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                </a>-->
                <li class="nav-item dropdown">
                    <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
                <img src="/template/images/icons/icon-header-01.png" alt="...">
                <i></i>
              </span>
                    </a>
                    <?php if (!User::isGuest()): ?>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="/cabinet/" ><i class="fas fa-user"></i> Profile</a>
                            <a class="dropdown-item" href="#" ><i class="fas fa-cog"></i> Settings</a>
                            <a class="dropdown-item" href="/user/logout" ><i class="fas fa-sign-out-alt"></i> Logout</a>
                            <?php if (AdminBase::checkAdmin() == 'admin/index.php'):  ?>
                                <a class="dropdown-item" href="/admin" ><i class="fas fa-user-lock"></i>Admin</a>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="/user/login/ " ><i class="fas fa-sign-in-alt"></i> Sign in</a>
                            <a class="dropdown-item" href="/user/register/" ><i class="fa fa-user-plus"></i>Register</a>
                        </div>
                    <?php endif; ?>
                </li>


                <a href="/cart/">
                    <img src="/template/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                     <span id="checkout_items" class="header-icons-noti">
                         <span id="cart-count"><?php echo Cart::countItems(); ?>
                         </span>
                     </span>
                </a>

            </div>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
        <!-- Logo moblie -->
        <a href="/" class="logo-mobile">
            <img src="/template/images/icons/logo.png" alt="IMG-LOGO">
        </a>

        <!-- Button show menu -->
        <div class="btn-show-menu">
            <!-- Header Icon mobile -->
            <div class="header-icons-mobile">
                <!--<a href="#" class="header-wrapicon1 dis-block">
                    <img src="/template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                </a>-->
                <li class="nav-item dropdown">
                    <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
                        <span class="avatar avatar-online">
                            <img src="/template/images/icons/icon-header-01.png" alt="...">
                        </span>
                    </a>
                    <?php if (!User::isGuest()): ?>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="/cabinet/" ><i class="fas fa-user"></i> Profile</a>
                        <a class="dropdown-item" href="#" ><i class="fas fa-cog"></i> Settings</a>
                        <a class="dropdown-item" href="/user/logout" ><i class="fas fa-sign-out-alt"></i> Logout</a>
                        <?php if (AdminBase::checkAdmin() == 'admin/index.php'):  ?>
                            <a class="dropdown-item" href="/admin" ><i class="fas fa-user-lock"></i>Admin</a>
                        <?php endif; ?>
                    </div>
                    <?php else: ?>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="/user/login/" ><i class="fas fa-sign-in-alt"></i> Sign in</a>
                        <a class="dropdown-item" href="/user/register/" ><i class="fa fa-user-plus"></i>Register</a>
                    </div>
                    <?php endif; ?>

                </li>

                <span class="linedivide2"></span>

                <a href="/cart">
                    <div class="header-wrapicon2">
                        <img src="/template/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
<!--                        <span id="cart-count" class="header-icons-noti">--><?php //echo Cart::countItems(); ?><!--</span>-->
                        <span id="checkout_items" class="header-icons-noti">
                         <span id="cart-count"><?php echo Cart::countItems(); ?>
                         </span>
                     </span>
                    </div>
                </a>
            </div>

            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="wrap-side-menu" >
        <nav class="side-menu">
            <ul class="main-menu">
                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping
						</span>
                </li>

                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                    <div class="topbar-child2-mobile">
							<span class="topbar-email">
								@gmail.com
							</span>

                        <div class="topbar-language rs1-select2">
                            <select class="selection-1" name="time">
                                <option>USD</option>
                                <option>EUR</option>
                            </select>
                        </div>
                    </div>
                </li>

                <li class="item-topbar-mobile p-l-10">
                    <div class="topbar-social-mobile">
                        <a href="#" class="topbar-social-item fa fa-facebook"></a>
                        <a href="#" class="topbar-social-item fa fa-instagram"></a>
                        <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                        <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                        <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                    </div>
                </li>

                <li class="item-menu-mobile">
                    <a href="/">Home</a>

                </li>

                <li class="item-menu-mobile">
                    <a href="#">Shop</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="/catalog">Categories</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="/cart">Cart</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="/about">About</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="/contact">Contact</a>
                </li>
            </ul>
        </nav>
    </div>
</header>


