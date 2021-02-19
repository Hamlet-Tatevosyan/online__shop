<?php require_once ROOT . "/views/header.php"?>
<div class="breadcumb_area bg-img p-t-235 p-b-100" style="background-image: url(/upload/bg_img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Checkout</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="checkout_area section-padding-80 m-t-50">
    <div class="container">
        <div class="row">
            <?php if ($result): ?>

                <h5 class="card-title text-center text-success">Order is processed. We will call you back.</h5>

            <?php else: ?>

            <div class="col-12 col-md-6">
                <div class="checkout_details_area mt-50 clearfix">


                    <div class="cart-page-heading m-b-30">
                        <h5>Billing Address</h5>
                    </div>

                    <form action="#" method="post">
                        <div class="row">
                            <?php if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li> - <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <label for="street_address">Full Name <span>*</span></label>
                            <div class="col-12 mb-3 bo12">
                                <input type="text" name="userName" class="form-control mb-3" id="street_address" value="<?php echo $userName; ?>">
                            </div>
                            <label for="postcode">Addres <span>*</span></label>
                            <div class="col-12 mb-3 bo12">
                                <input type="text" class="form-control" id="postcode" value="">
                            </div>
                            <label for="state bo12">Comment on the order <span>*</span></label>
                            <div class="col-12 mb-3 bo12">
                                <input type="text" name="userComment" class="form-control" id="state" value="<?php echo $userComment; ?>">
                            </div>
                            <label for="phone_number">Phone No <span>*</span></label>
                            <div class="col-12 mb-3 bo12">
                                <input type="text" class="form-control" name="userPhone" id="phone_number" min="0" value="<?php echo $userPhone; ?>">
                            </div>
                            <label for="email_address">Email Address <span>*</span></label>
                            <div class="col-12 mb-4 bo12">
                                <input type="text" name="email" class="form-control" id="email_address" value="<?php echo $userEmail; ?>">
                            </div>
                            <p class="text-center">
                                <a href="/" class="btn btn-danger py-3 px-4 m-r-5">Back to shopping </a>
                            </p>
                            <p class="text-center">
                                <input type="submit" name="submit" class="btn btn-primary py-3 px-4" value="Checkout"/>
                            </p>
                        </div>

                    </form>

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                <div class="order-details-confirmation">

                    <div class="cart-page-heading">
                        <h5>Your Order</h5>
                        <p>The Details </p>
                    </div>
                    <table class="table table-bordered table-dark">
                        <thead>
                        <tr>
                            <td>Product</td>
                            <td>Total</td>
                        </tr>
                        <tr>
                            <td>Selected Products</td>
                            <td><?php echo $totalQuantity; ?></td>
                        </tr>
                        <tr>
                            <td>Subtotal</td>
                            <td>$<?php echo $totalPrice; ?></td>
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <td>Free</td>
                        </tr>
                        <tr>
                            <td><b>Total</b></td>
                            <td>$<?php echo $totalPrice; ?></td>
                        </tr>

                        </thead>
                    </table>
                </div>
            </div>


            <?php endif;?>


        </div>
    </div>
</div>

<?php require_once ROOT . "/views/footer.php"?>
