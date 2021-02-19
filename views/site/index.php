<?php require_once ROOT . "/views/header.php"?>

<section class="slide1">
    <div class="wrap-slick1">
        <div class="slick1">
            <div class="item-slick1 item1-slick1" style="background-image: url(/template/images/road-1072823__340.jpg);">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-true m-b-15" data-appear="fadeInDown">
							ElSHop 2020
						</span>

                    <h2 class="caption2-slide1 xl-text1 t-center animated visible-true m-b-37" data-appear="fadeInUp">
                        New
                    </h2>

                    <div class="wrap-btn-slide1 w-size1 animated visible-true" data-appear="zoomIn">
                        <!-- Button -->
                        <a href="/catalog" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>

            <div class="item-slick1 item2-slick1" style="object-fit:contain;background-image: url(/template/images/road-1072823__340.jpg);">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
							ElSHop 2020
						</span>

                    <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
                        New
                    </h2>

                    <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
                        <!-- Button -->
                        <a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>

            <div class="item-slick1 item3-slick1" style="background-image: url(/template/images/road-1072823__340.jpg">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
							ElSHop 2020
						</span>

                    <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
                        New
                    </h2>

                    <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
                        <!-- Button -->
                        <a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="banner bgwhite p-t-40 p-b-40">
    <div class="container">
        <div class="row">
            <?php foreach ($categories as $categoryItem): ?>

            <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                <!-- block1 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img class="cat_img" src="/upload/images/category/<?= $categoryItem['img_preview']; ?>" alt="IMG-BENNER">

                    <div class="block1-wrapbtn w-size2">
                        <!-- Button -->
                        <a href="/category/<?php echo $categoryItem['id'];?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                            <?php echo $categoryItem['name']; ?>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php if (User::isGuest()): ?>
            <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                <div class="block2-content sizefull ab-t-l flex-col-c-m">
                    <h4 class="m-text4 t-center w-size3 p-b-8">
                        Sign up & get 20% off
                    </h4>
                    <p class="t-center w-size4">
                        Be the frist to know about the latest fashion news and get exclu-sive offers
                    </p>
                    <div class="w-size2 p-t-25">
                        <a href="/user/login/" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                            Sign Up
                        </a>
                    </div>
                </div>
            </div>
            <?php endif; ?>

        </div>
</section>

<div class="new-products">
    <section class="newproduct bgwhite p-t-45 p-b-105">
        <div class="container">
            <div class="sec-title p-b-60">
                <h3 class="m-text5 t-center">
                    Featured Products
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">
                    <?php foreach ($latestProducts as $product): ?>
                    <div class="item-slick2 p-l-15 p-r-15" ">

                        <div class="block2">
                            <?php if ($product['is_new']): ?>

                            <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                <?php else: ?>
                                <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale" ">
                                    <?php endif;?>
                                        <?php
                                        //var_dump($product['id']);
                                        $pro = Product::getImage($product['id']);
                                        //var_dump($pro[0]['images_preview']);

                                        ?>
                                    <img class="product_image" src="/upload/images/<?= $pro[0]['images_preview']; ?>" alt="IMG-PRODUCT" style="max-width: 100vw !important; ">
                                    <div class="block2-overlay trans-0-4">
                                        <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                            <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                            <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                        </a>


                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <?php if ($product['quantity']):?>
                                            <a href="#" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 add-to-cart" data-id="<?php echo $product['id']; ?>" data-name = "<?php echo $product['name']; ?>">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to Cart
                                            </a>
                                            <?php else:?>
                                                <a href="/product/<?php echo $product['id']; ?>/" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 add-to-cart" >
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Order
                                                </a>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <a href="/product/<?php echo $product['id']; ?>/" class="block2-name dis-block s-text3 p-b-8">
                                        <?php echo $product['name']; ?>
                                    </a>
                                    <?php if ($product['discount'] == 0): ?>
                                    <span class="block2-price m-text6 p-r-5">
									    $<?php echo $product['price']; ?>
                                    </span>
                                    <?php else:?>

                                    <span class="block2-oldprice m-text7 p-r-5">
									    $<?php echo $product['price'] ; ?>
								    </span>
                                        <span class="block2-price m-text6 p-r-5">
									    $<?php echo  $product['price'] - ($product['price']* $product['discount']) / 100; ?>
                                    </span>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php require_once ROOT . "/views/footer.php"?>
