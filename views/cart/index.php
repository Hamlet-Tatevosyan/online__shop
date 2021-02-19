<?php require_once ROOT . "/views/header.php"?>
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(/template/images/cart.jpg);">
    <h2 class="l-text2 t-center">
        Cart
    </h2>
</section>
<section class="cart bgwhite p-t-70 p-b-100">
    <div class="container">
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">
                <table class="table-shopping-cart">
                        <?php if ($productsInCart): ?>
                        <tr class="text-center">
                            <th class="column-0"></th>
                            <th class="column-1"></th>
                            <th class="column-2">Product</th>
                            <th class="column-3">Price</th>
                            <th class="column-4 p-l-70">Quantity</th>
                            <th class="column-5">Total</th>
                        </tr>
                            <?php foreach ($products as $product): ?>

						<tr class="table-row">
							<td class="column-1">
                               <a href="/cart/delete/<?php echo $product['id'];?>">
                                   <i class="fas fa-times"></i>
                               </a>
                            </td>

                            <td>
                            <a href="/product/<?php echo $product['id'];?>">
								<div class="cart-img-product b-rad-4 o-f-hidden">
                                    <?php
                                    $pro = Product::getImage($product['id']);
                                    ?>
									<img src="/upload/images/<?= $pro[0]['images_preview']; ?>" alt="IMG-PRODUCT">
								</div>
                            </a>
							</td>
							<a href="/product/<?php echo $product['id'];?>">
								<td class="column-2"><?php echo $product['name'];?></td>
							</a>
							<td >
                               $ <span class="price">
                                    <?php echo $product['price'];?>
                                </span>

                            </td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
                                    <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2 cart-minus" data-id = "<?php echo $product['id'];?>">
                                        <i class="fs-12 fa fa-minus" ></i>
                                    </button>

                                    <input class="size8 m-text18 t-center num-product qty" type="number" name="num-product1" value="<?php echo $productsInCart[$product['id']];?>">

                                    <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2 cart-plus" data-id = "<?php echo $product['id'];?>">
                                        <i class="fs-12 fa fa-plus" ></i>
                                    </button>
<!--                                    <input type="number" class="form-control itemQty"  value="--><?php //echo $productsInCart[$product['id']];?><!--" min="1" data-id = "--><?php //echo $product['id'];?><!--" >-->
								</div>
							</td>
							<td id="price_update" class="column-5" >$<?php echo $productsInCart[$product['id']] * $product['price'];?></td>
						</tr>
                        <?php endforeach; ?>
                </table>
            </div>
        </div>
        <?php if (!User::isGuest()): ?>
            <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                <h5 class="m-text20 p-b-24">
                    Cart Totals
                </h5>

                <!--  -->
                <div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

                    <span class="m-text21 w-size20 w-full-sm">
						$<?php echo $totalPrice;?>
					</span>
                </div>

                <!--  -->
                <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Delivery:
					</span>
                    <span class="m-text21 w-size20 w-full-sm">
						$0.00
					</span>

                </div>

                <!--  -->
                <div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

                    <span class="m-text21 w-size20 w-full-sm">
						$<?php echo $totalPrice;?>
					</span>
                </div>

                <div class="size15 trans-0-4">
                    <!-- Button -->
                    <a href="/cart/checkout/" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        Proceed to Checkout
                    </a>
                </div>
            </div>

        <?php else: ?>
            <div class="row justify-content-center">
                <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                        <h5 class="m-text20 p-b-24 text-danger text-lg-center">
                            Please sign in
                        </h5>
                        <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                            <span class="m-text21 w-size20 w-full-sm m-auto">
                                <a href="/user/login" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                    Sign in
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif;?>
    </div>
    <?php else: ?>
    <div class="row justify-content-center">
        <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
            <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 ">
                <h5 class="m-text20 p-b-24">
                    Cart is empty
                </h5>

                <!--  -->
                <div class="flex-w flex-sb-m p-b-12">
                        <span class="s-text18 w-size19 w-full-sm">
                            Subtotal:
                        </span>

                    <span class="m-text21 w-size20 w-full-sm">
                            $0.00
                        </span>
                </div>

                <!--  -->
                <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                        <span class="s-text18 w-size19 w-full-sm">
                            Delivery:
                        </span>
                    <span class="m-text21 w-size20 w-full-sm">
                            $0.00
                        </span>

                </div>

                <!--  -->
                <div class="flex-w flex-sb-m p-t-26 p-b-30">
                        <span class="m-text22 w-size19 w-full-sm">
                            Total:
                        </span>

                    <span class="m-text21 w-size20 w-full-sm">
                            $0.00
                        </span>
                </div>

                <div class="size15 trans-0-4">
                    <!-- Button -->
                    <a href="/" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php endif; ?>
</section>
<?php require_once ROOT . "/views/footer.php"?>
