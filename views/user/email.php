<?php require_once ROOT . "/views/header.php"?>

<div class="p-t-235">
    <div class="container w-25">
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
                        <h3 class="text-center text-info">Email Verify</h3>
                    </div>
                    <div class="form-group">
                        <label for="email_verify" class="text-info">Code:</label><br>
                        <input type="number" id="email_verify" name="email_verify" class="form-control" placeholder="email_verify">
                    </div>
                    <div class="p-t-15 p-b-15">
                        <input type="submit" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4" name="submit_verify" value="Verify">

                    </div>
                </form>
            </main>



    </div>
</div>

<?php require_once ROOT . "/views/footer.php"?>
