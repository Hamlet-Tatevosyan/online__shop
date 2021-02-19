<?php include ROOT . '/views/admin_header.php'; ?>



<section>
    <br/>
    <div class="container">
        <div class="row">
            <div class="breadcrumbs">
                <ol class="breadcrumb bg-dark">
                    <li class="list-group-item  bg-dark"><a class="btn btn-outline-info text-white" href="/admin">Administrator panel</a></li>
                    <li class="list-group-item bg-dark"><a class="btn btn-outline-info active" href="#">Order Management</a></li>
                </ol>
            </div>
        </div>
    </div>

    <h4 class="text-center text-white">Order List</h4>
    <div class="container">
        <div class="row">
            <br/>
            <table class="table table-bordered table-dark">
                <thead>
                <tr>
                    <th>ID Order</th>
                    <th>Buyer Name</th>
                    <th>Buyer Phone</th>
                    <th>Date of issue</th>
                    <th>Status</th>
                    <th scope="col">Order View</th>
                    <th scope="col">Edit Product</th>
                    <th scope="col">Delete Product</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($ordersList as $order): ?>
                    <tr>
                        <td class="text-center">
                            <a class="text-danger" href="/admin/order/view/<?php echo $order['id']; ?>">
                                <?php echo $order['id']; ?>
                            </a>
                        </td>
                        <td class="text-center"><?php echo $order['user_name']; ?></td>
                        <td class="text-center"><?php echo $order['user_phone']; ?></td>
                        <td class="text-center"><?php echo $order['date']; ?></td>
                        <td class="text-center" ><?php echo Order::getStatusText($order['status']); ?></td>
                        <td class="text-center" >
                            <a href="/admin/order/view/<?php echo $order['id']; ?>" title="View">
                                <i class="fa fa-eye p-3 mb-2 bg-primary text-white"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="/admin/order/update/<?php echo $order['id']; ?>" title="Edit">
                                <i class="fa fa-pencil-square-o p-3 mb-2 bg-success text-white"></i>
                                <?php Order::getOrderById($order['id']); ?>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="/admin/order/delete/<?php echo $order['id']; ?>"  title="Delete">
                                <i class="fa fa-times p-3 mb-2 bg-danger text-white "></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include ROOT . '/views/admin_footer.php'; ?>

