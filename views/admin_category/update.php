<?php include ROOT . '/views/admin_header.php'; ?>
<div  class="container">
    <div class="row">
        <div class="breadcrumbs">
            <ol class="breadcrumb bg-dark">
                <li class="list-group-item  bg-dark"><a class="btn btn-outline-info text-white" href="/admin">Administrator panel</a></li>
                <li class="list-group-item bg-dark"><a class="btn btn-outline-info text-white" href="/admin/category">Category Management</a></li>
                <li class="list-group-item bg-dark"><a class="btn btn-outline-info active" href="#">Update Category</a></li>
            </ol>
        </div>
    </div>
</div>

<section>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Edit Category -> "<?php echo $category['name']; ?>"</h5>
                        <div class="form-signin">
                            <form  action="" method="post" enctype="multipart/form-data">
                                <div class="form-label-group">
                                    <label for="title">Title Category</label>

                                    <input type="text" name="name" id="title"  class="form-control" value="<?php echo $category['name']; ?>">
                                </div>
                                <br>
                                <div class="form-label-group mt-2">
                                    <label for="sort_order">Serial number</label>
                                    <input type="text" name="sort_order"  class="form-control" value="<?php echo  $category['sort_order']; ?>" placeholder="">
                                </div>
                                <br>
                                <div class="form-label-group mt-2">
                                    <label for="thumb">Product Image</label>
                                    <input type="file" name="image" class="form-control btn btn-lg" accept="image/*" id="thumb" />

                                </div>
                                <div class="form-label-group mt-2">
                                    <label for="code">Status</label>
                                    <select name="status">
                                        <option value="1" selected="selected">Is displayed</option>
                                        <option value="0">Hidden</option>
                                    </select>
                                </div>
                                <br>

                                <input type="submit" name="submit" class="btn btn-lg btn-info btn-block mt-4" value="Save">
                                <a href="/admin/category" class="btn btn-lg btn-dark btn-block mt-4">
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

