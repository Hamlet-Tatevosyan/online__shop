<?php require_once ROOT . "/views/header.php"?>

    <div class="p-t-235">
        <div class="container w-25">
        <?php if ($result): ?>
            <p>Are you registered!</p>
        <?php else: ?>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <main class="container mt-4">
                <form class="form-signup" action="" method="post">
                    <div class="text-center mb-4">
                        <h3 class="text-center text-black">Sign Up</h3>
                    </div>
                    <label for="username" class="text-black">Username:</label><br>
                    <div class="bo12">
                        <input type="text" id="labelUserName" name="userName" class="form-control " placeholder="Username"
                               value="<?php echo $userName; ?>">
                    </div>
                    <label for="labelEmail" class="text-black">E-mail:</label><br>

                    <div class="bo12">
                        <input type="text" id="labelEmail" name="email" class="form-control" placeholder="E-mail"
                               value="<?php echo $email; ?>">
                    </div>
                    <label for="labelPhone" class="text-black">Phone:</label><br>

                    <div class="bo12">
                        <input type="text" id="labelPhone" name="phone" class="form-control" placeholder="Phone" value="<?php echo $phone; ?>">
                    </div>
                    <label for="password" class="text-black">Password:</label><br>
                    <div class="bo12 m-b-10">
                        <input type="password" id="labelPwd" name="password" class="form-control" placeholder="Password">
                    </div>

                    <input  type="checkbox" onchange="SHPassword(this);"><span id="showhidepwd">Show</span>
                    <br>
                    <label for="Repeat-password" class="text-black">Repeat Password:</label><br>

                    <div class="bo12">
                        <input type="password" id="labelPwdRepeat" name="passwordrep" class="form-control mb-2" placeholder="Repeat password">
                    </div>
                    <div class="p-t-15 p-b-15">
                        <input type="submit" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4 " name="submit" value="SignUp">
                    </div>
                </form>
            </main>
        <?php endif; ?>


        </div>
    </div>

<?php require_once ROOT . "/views/footer.php"?>