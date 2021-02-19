<?php include ROOT . '/views/admin_header.php'; ?>

<section>
    <div  class="container">
        <div class="row">
            <div class="breadcrumbs">
                <ol class="breadcrumb bg-dark">
                    <li class="list-group-item  bg-dark"><a class="btn btn-outline-info text-white" href="/admin">Administrator panel</a></li>
                    <li class="list-group-item bg-dark"><a class="btn btn-outline-info text-white" href="/admin/user">List of Registered</a></li>
                    <li class="list-group-item bg-dark"><a class="btn btn-outline-info active" href="#">Delete User</a></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Are you sure you want to delete this User? <?php echo $id; ?></h5>
                        <form class="form-signin" action="#" method="post">
                            <div class="form-label-group">
                                <input type="submit" name="submit" class="btn btn-lg btn-info btn-block mt-4" value="Delete" />
                                <a href="/admin/user" class="btn btn-lg btn-dark btn-block mt-4">
                                    Cancel
                                </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/admin_footer.php'; ?>


