<?php include ROOT . '/views/header.php'; ?>
    <div class="p-t-235 hero-wrap hero-bread" style="background-image: url('/template/img/bg_6.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Collection Products</h1>
                </div>
            </div>
        </div>
    </div>



    <section class="bgwhite p-t-55 p-b-65">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                    <div class="leftbar p-r-20 p-r-0-sm">
                        <!--  -->
                        <h4 class="m-text14 p-b-7">
                            <a href="/catalog/">Categories</a>
                        </h4>

                        <ul class="p-b-54">
                        <?php foreach ($categories as $categoryItem): ?>
                            <li class="p-t-4">
                                <a href="/category/<?php echo $categoryItem['id'];?>" class="s-text13 active1">
                                    <?php echo $categoryItem['name']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>


                        </ul>


                        <!--  -->
                        <h4 class="m-text14 p-b-32">
                            Filters
                        </h4>

                        <div class="filter-price p-t-22 p-b-50 bo3">
                            <div class="m-text15 p-b-17">
                                <p>
                                    Price Range:<p id="amount"></p>
                                </p>
                            </div>
                            <div id="slider-range"></div>
                            <form method="post" action="">
                                <div class="flex-sb-m flex-w p-t-16">
                                    <div id="slider-range"></div>
                                    <div class="s-text3 p-t-10 p-b-10">
                                        <input type="hidden" id="amount1" name="amount1">
                                        <input type="hidden" id="amount2" name="amount2">
                                    </div>
                                    <div class="w-size11">
                                        <input class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4" type="submit" name="submit_range" value="Filter">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="list-group">
                            <h3>Brand</h3>
                            <input type="hidden" id="max" value="0"/>
                            <input type="hidden" id="min" value="10500"/>
                            <p id="price_show">1000-10500</p>
                            <div id="price_range"></div>

                        </div>
                        <div class="row filter_data">

                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">


                    <!-- Product -->
                    <div class="row">
                    <?php foreach ($categoryProducts as $product): ?>
                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                    <?php
                                    //var_dump($product['id']);
                                    $pro = Product::getImage($product['id']);
                                    //var_dump($pro[0]['images_preview']);

                                    ?>
                                    <img style="min-height: 230px;height: 230px;object-fit: contain" src="/upload/images/<?= $pro[0]['images_preview']; ?>" alt="IMG-PRODUCT">

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
                                                <a href="#" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Order
                                                </a>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <a href="/product/<?php echo $product['id']; ?>" class="block2-name dis-block s-text3 p-b-5">
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

                    <!-- Pagination -->
                        <?php echo $pagination->get(); ?>

                </div>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/footer.php'; ?>