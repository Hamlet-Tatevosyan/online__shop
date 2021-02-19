<?php include ROOT . '/views/admin_header.php'; ?>

<section>
    <div  class="container">
        <div class="row">
            <div class="breadcrumbs">
                <ol class="breadcrumb bg-dark">
                    <li class="list-group-item  bg-dark"><a class="btn btn-outline-info text-white" href="/admin">Administrator panel</a></li>
                    <li class="list-group-item bg-dark"><a class="btn btn-outline-info text-white" href="/admin/user">List of Registered</a></li>
                    <li class="list-group-item bg-dark"><a class="btn btn-outline-info active" href="#">Update User</a></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Edit User -> # "<?php echo $id; ?>"</h5>
                        <div class="form-signin">
                            <form  action="" method="post" enctype="multipart/form-data">
                                <div class="form-label-group">
                                    <label for="userName">Name</label>
                                    <h4><?php echo $user['name']; ?></h4>
                                </div>
                                <br>
                                <div class="form-label-group mt-2">
                                    <label for="userPhone">User Mail</label>
                                    <h4><?php echo $user['email']; ?></h4>
                                </div>
                                <br>
                                <br>
                                <div class="form-label-group mt-2">
                                    <label for="code">User Role</label>
                                    <select name="role">
                                        <option value="admin" <?php if ($user['role'] == 'admin') echo ' selected="selected"'; ?>>Admin</option>
                                        <option value="user" <?php if ($user['role'] == 'user') echo ' selected="selected"'; ?>>User</option>
                                    </select>
                                </div>
                                <br>
                                <br>

                                <input type="submit" name="submit" class="btn btn-lg btn-info btn-block mt-4" value="Save">
                                <a href="/admin/user" class="btn btn-lg btn-dark btn-block mt-4">
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


