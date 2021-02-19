<?php include ROOT . '/views/header.php'; ?>
    <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(/template/images/bg.jpg);">
        <h2 class="l-text2 t-center">

        </h2>
        <p class="m-text13 t-center">
             Collection 2020
        </p>
    </section>




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

                        <div class="filter-price p-t-22 p-b-50 bo3">

                            <div class="flex-sb-m flex-w p-t-16">

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">

                    <div class="flex-sb-m flex-w p-b-35">
                        <span class="s-text8 p-t-5 p-b-5">
							Showing

                                <select id="limiter"  class="limiter-options" name="limiter">
                                    <option  value="12" selected="selected">
                                        12
                                    </option>
                                    <option  value="24">
                                        24
                                    </option>
                                    <option  value="32">
                                        32
                                    </option>
                                    <option  value="46">
                                        46
                                    </option>
                                </select>
                            <div id="show"></div>
						</span>
                    </div>

                    <!-- Product -->
                    <div class="row">
                        <?php foreach ($latestProducts as $product): ?>
                            <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                        <?php
                                        //var_dump($product['id']);
                                        $pro = Product::getImage($product['id']);
                                        //var_dump($pro[0]['images_preview']);

                                        ?>
                                        <img style="width:100%;height: 250px" src="/upload/images/<?= $pro[0]['images_preview']; ?>" alt="IMG-PRODUCT">

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

                </div>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/footer.php'; ?>