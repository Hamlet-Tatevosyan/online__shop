<?php include ROOT . '/views/header.php'; ?>

    <section>
    <div class="container m-t-235">
        <div class="row justify-content-center">
            <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38">
                    <?php if ($result): ?>
                        <p>Data edited!</p>
                    <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li class="text-danger"> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <form class="form-signin" action="#" method="post">

                        <h1 class="h3 mb-3 font-weight-normal text-danger">Data editing</h1>
                        <label  class="sr-only">Name:</label>
                        <input name="name" type="text" class="form-control" placeholder="Name" value="<?php echo $name; ?>">
                        <br>
                        <label  class="sr-only">Old Password:</label>
                        <input name="old_password" type="password" class="form-control" placeholder="Old Password">
                        <br>
                        <label  class="sr-only">New Password:</label>
                        <input name="password" type="password" class="form-control" placeholder="New Password">
                        <br>
                        <label  class="sr-only">Repeat New Password:</label>
                        <input name="passwordrep" type="password" class="form-control" placeholder="Repeat New Password">
                        <br>
                        <div class="size15 trans-0-4">
                            <input type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-" name="submit" value="Save">
                        </div>
                    </form>
                    <?php endif; ?>


                </div>
            </div>
        </div>
    </div>
</section>
<?php include ROOT . '/views/footer.php'; ?>
