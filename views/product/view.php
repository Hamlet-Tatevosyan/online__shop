<?php require_once ROOT . "/views/header.php"?>
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
    <a href="/" class="s-text16">
        Home
        <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
    </a>

    <a href="/category/<?php echo $getCategory['id'];?>" class="s-text16">
        <?= $getCategory['name']?>
        <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
    </a>


    <span class="s-text17">
			<?= $product['name']?>
		</span>
</div>
<div class="container bgwhite p-t-35 p-b-80">
    <div class="flex-w flex-sb">


        <div class="w-size13 p-t-30 respon5">
            <div class="wrap-slick3 flex-sb flex-w">
                <div class="wrap-slick3-dots"></div>

                <div class="slick3">
                    <?php foreach ($images as $img => $val): ?>
                    <div class="item-slick3" data-thumb="<?= '/upload/images/'.$val['images_preview']; ?>">
                            <div class="wrap-pic-w">
                            <img class="pro_img" src="<?= '/upload/images/'.$val['images_preview']; ?>" alt="IMG-PRODUCT">
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>

            </div>
        </div>
        <div class="w-size14 p-t-30 respon5">
            <h4 class="proname product-detail-name m-text16 p-b-13" data-id = "<?php echo $product['name'];?>">
                <?php echo $product['name']; ?>
            </h4>
            <span class="m-text17">
					$ <?php echo $product['price']; ?>
				</span>
            <?php if ($product['quantity']):?>
            <p class="s-text8 p-t-10">
                <span class="s-text20 m-r-35 fs-25">Availability: <span class="text-black">Available</span></span>
            </p>
            <?php else:?>
            <div class="p-b-25 p-t-15">
                <span class="s-text8 m-r-35 fs-25">Availability: Import</span>
                <span class="s-text8 m-r-35">Import։  <span class="text-danger">7-14 days</span></span>
            </div>

            <?php endif;?>
            <div class="p-t-33 p-b-60">
                <!--<div class="flex-m flex-w">
                    <div class="s-text15 w-size15 t-center">
                        Color
                    </div>

                    <div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
                        <select class="selection-2" name="color">
                            <option>Choose an option</option>
                            <option>Gray</option>
                            <option>Red</option>
                            <option>Black</option>
                            <option>Blue</option>
                        </select>
                    </div>
                </div>-->
                <form action="#" method="post">
                    <div class="flex-r-m flex-w p-t-10">
                        <div class="w-size16 flex-m flex-w">
                            <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                                <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                </button>

                                <input  class="size8 m-text18 t-center num-product" type="number" name="qnt_product" value="1">


                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>

                            <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                                <!-- Button -->
                                <?php if ($product['quantity']):?>
                                <a href="#"  class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 add-to-cart" data-id="<?php echo $product['id']; ?>" data-name = "<?php echo $product['name']; ?>">
                                    Add to Cart
                                </a>
                                <?php else:?>
<!--                                    <input type="submit" name="submit_order" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" value="To order">-->
                                <a href="/cart/order/<?php echo $product['id']; ?>"  class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 to-order" >
                                    To Order
                                </a>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
            </div>
            </form>

            <div class="p-b-45">
                <span class="s-text8 m-r-35">Code Product: </b> <?php echo $product['code']; ?></span>
                <span class="s-text8">Brand: </b> <?php echo $product['brand']; ?></span><br>
                <?php if ($product['quantity']):?>
                <span class="s-text8 ">count: </b> <?php echo $product['quantity']; ?></span>
                <?php else:?>
                <span class="s-text8 text-danger">count: </b> <?php echo $product['quantity']; ?></span>
                <?php endif;?>
            </div>

            <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
                <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                    Description
                    <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                    <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                </h5>

                <div class="dropdown-content dis-none p-t-15 p-b-23">
                    <p class="s-text8">
                        <?php echo $product['description']; ?>
                    </p>
                </div>
            </div>

            <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                    Additional information
                    <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                    <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                </h5>

                <div class="dropdown-content dis-none p-t-15 p-b-23">
                    <p class="s-text8">
                        <?php echo $product['description']; ?>
                    </p>
                </div>
            </div>

            <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                    Reviews (0)
                    <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                    <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                </h5>

                <div class="dropdown-content dis-none p-t-15 p-b-23">
                    <p class="s-text8">
                        <?php echo $product['description']; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once ROOT . "/views/footer.php"?>

