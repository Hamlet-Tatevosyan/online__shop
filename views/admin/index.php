<?php include ROOT . '/views/admin_header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Hello Admin!</h5>
                    <p>You have access to such opportunities.</p>

                    <form class="form-signin" action="#" method="post">
                        <div class="form-label-group">
                            <a href="/admin/product" class="btn btn-lg btn-dark btn-block mt-4">
                                Product Management
                            </a>
                            <a href="/admin/category" class="btn btn-lg btn-dark btn-block mt-4">
                                Category Management
                            </a>
                            <a href="/admin/order" class="btn btn-lg btn-dark btn-block mt-4">
                                Order Management
                            </a>
                            <a href="/admin/user" class="btn btn-lg btn-dark btn-block mt-4">
                                List of Registered
                            </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include ROOT . '/views/admin_footer.php'; ?>
