<?php require_once ROOT . "/views/header.php" ?>


<?php if (User::isGuest()): ?>
    <div class="p-t-235">
        <div class="container w-25 p-b-20">
            <form class="form-signin" action="" method="post">
                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>


                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                <label for="inputEmail" class="sr-only">Email address</label>
                <div class="bo12">
                    <input name="email" type="text" id="inputEmail" class="form-control" placeholder="Email address" value="<?php echo $email; ?>">
                </div>
                <br>
                <label for="inputPassword" class="sr-only">Password</label>
                <div class="bo12">
                    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password">
                </div>
                <br>

                <input type="submit" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4" name="submit" value="Login">

            </form>
        </div>
    </div>
<?php else: ?>
    <?php
header("Location: index.php");
    ?>

<?php endif; ?>
<?php require_once ROOT . "/views/footer.php"?>
