<?php include ROOT . '/views/admin_header.php'; ?>

<section>
    <div  class="container">
        <div class="row">
            <div class="breadcrumbs">
                <ol class="breadcrumb bg-dark">
                    <li class="list-group-item  bg-dark"><a class="btn btn-outline-info text-white" href="/admin">Administrator panel</a></li>
                    <li class="list-group-item bg-dark"><a class="btn btn-outline-info text-white" href="/admin/order">Order Management</a></li>
                    <li class="list-group-item bg-dark"><a class="btn btn-outline-info active" href="#">Update Order</a></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Edit Order -> # "<?php echo $id; ?>"</h5>
                        <div class="form-signin">
                            <form  action="" method="post" enctype="multipart/form-data">
                                <div class="form-label-group">
                                    <label for="userName">Customer Name</label>

                                    <input type="text" name="userName"  class="form-control" value="<?php echo $order['user_name']; ?>">
                                </div>
                                <br>
                                <div class="form-label-group mt-2">
                                    <label for="userPhone">Customer Phone</label>
                                    <input type="text" name="userPhone"  class="form-control" value="<?php echo $order['user_phone']; ?>" placeholder="">
                                </div>
                                <br>
                                <div class="form-label-group mt-2">
                                    <label for="userComment">Customer Comment</label>
                                    <input type="text" class="form-control" name="userComment" placeholder="" value="<?php echo $order['user_comment']; ?>">
                                </div>
                                <br>
                                <div class="form-label-group mt-2">
                                    <label for="date">Order Date</label>
                                    <input type="text" class="form-control" name="date" placeholder="" value="<?php echo $order['date']; ?>">
                                </div>
                                <br>
                                <div class="form-label-group mt-2">
                                    <label for="code">Status</label>
                                    <select name="status">
                                        <option value="1" <?php if ($order['status'] == 1) echo ' selected="selected"'; ?>>New Order</option>
                                        <option value="2" <?php if ($order['status'] == 2) echo ' selected="selected"'; ?>>In processing</option>
                                        <option value="3" <?php if ($order['status'] == 3) echo ' selected="selected"'; ?>>Is delivered</option>
                                        <option value="4" <?php if ($order['status'] == 4) echo ' selected="selected"'; ?>>Closed</option>
                                    </select>
                                </div>
                                <br>
                                <br>

                                <input type="submit" name="submit" class="btn btn-lg btn-info btn-block mt-4" value="Save">
                                <a href="/admin/order" class="btn btn-lg btn-dark btn-block mt-4">
                                    Cancel
                                </a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/admin_footer.php'; ?>

