<?php include ROOT . '/views/admin_header.php'; ?>

<section>

    <br/>
    <div class="container">
        <div class="row">
            <div class="breadcrumbs">
                <ol class="breadcrumb bg-dark">
                    <li class="list-group-item  bg-dark"><a class="btn btn-outline-info text-white" href="/admin">Administrator panel</a></li>
                    <li class="list-group-item bg-dark"><a class="btn btn-outline-info text-white " href="/admin/order">Order Management</a></li>
                    <li class="list-group-item bg-dark"><a class="btn btn-outline-info active" href="#">Order View</a></li>
                </ol>
            </div>
        </div>
    </div>
    <h4 class="text-center text-white">View Order #<?php echo $order['id'];?></h4>
    <div class="container">
        <div class="row">
            <br/>
            <table class="table table-bordered table-dark">
                <thead>
                <tr>
                    <td>Order number</td>
                    <td><?php echo $order['id']; ?></td>
                </tr>
                <tr>
                    <td>Customer name</td>
                    <td><?php echo $order['user_name']; ?></td>
                </tr>
                <tr>
                    <td>Customer Phone</td>
                    <td><?php echo $order['user_phone']; ?></td>
                </tr>
                <tr>
                    <td>Customer Comment</td>
                    <td><?php echo $order['user_comment']; ?></td>
                </tr>
                <?php if ($order['user_id'] != 0): ?>
                    <tr>
                        <td>ID Customer</td>
                        <td><?php echo $order['user_id']; ?></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td><b>Order status</b></td>
                    <td><?php echo Order::getStatusText($order['status']); ?></td>
                </tr>
                <tr>
                    <td><b>Order date</b></td>
                    <td><?php echo $order['date']; ?></td>
                </tr>
                </thead>
            </table>
            <br/>
            <h4 class="text-center text-white">Products in order</h4>

            <table class="table table-bordered table-dark">
                <thead>
                <tr>
                    <th class="text-center" scope="col">ID Product</th>
                    <th class="text-center" scope="col">Product Image</th>
                    <th class="text-center" scope="col">Name Product</th>
                    <th class="text-center" scope="col">Price Product</th>
                    <th class="text-center" scope="col">Quantity</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td class="text-center"><?php echo $product['id']; ?></td>
                        <td class="image-prod">
                            <a href="/product/<?php echo $product['id'];?>">
                                <?php
                                $pro = Product::getImage($product['id']);
                                ?>
                                <!--<div class="img" style="background-image:url(<?/*= $product['preview']; */?>);"></div>-->
                                <img src="/upload/images/<?= $pro[0]['images_preview']; ?>" style="width:100px" class="w3-margin-top">

                            </a>
                        </td>
                        <td class="text-center"><?php echo $product['name']; ?></td>
                        <td class="text-center">$ <?php echo $product['price']; ?></td>
                        <td class="text-center"><?php echo $productsQuantity[$product['id']]; ?></td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
            <a href="/admin/order/" class="btn btn-default back">
                <button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Back</button>
            </a>

        </div>
    </div>

</section>
<?php include ROOT . '/views/admin_footer.php'; ?>
