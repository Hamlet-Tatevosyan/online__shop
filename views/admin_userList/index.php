<?php include ROOT . '/views/admin_header.php'; ?>



<section>
    <br/>
    <div class="container">
        <div class="row">
            <div class="breadcrumbs">
                <ol class="breadcrumb bg-dark">
                    <li class="list-group-item  bg-dark"><a class="btn btn-outline-info text-white" href="/admin">Administrator panel</a></li>
                    <li class="list-group-item bg-dark"><a class="btn btn-outline-info active" href="#">List of Registered</a></li>
                </ol>
            </div>
        </div>
    </div>

    <h4 class="text-center text-white">User List</h4>
    <div class="container">
        <div class="row">
            <br/>
            <table class="table table-bordered table-dark">
                <thead>
                <tr>
                    <th>ID User</th>
                    <th>Name</th>
                    <th>Mail</th>
                    <th>Role</th>
                    <th scope="col">Edit User</th>
                    <th scope="col">Delete User</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($userList as $user): ?>
                    <tr>
                        <td class="text-center">
                            <a class="text-danger">
                                <?php echo $user['id']; ?>
                            </a>
                        </td>
                        <td class="text-center"><?php echo $user['name']; ?></td>
                        <td class="text-center"><?php echo $user['email']; ?></td>
                        <td class="text-center" ><?php echo $user['role']; ?></td>

                        <td class="text-center">
                            <a href="/admin/user/update/<?php echo $user['id']; ?>" title="Edit">
                                <i class="fa fa-pencil-square-o p-3 mb-2 bg-success text-white"></i>
                                <?php Order::getOrderById($user['id']); ?>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="/admin/user/delete/<?php echo $user['id']; ?>"  title="Delete">
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

