<?php include ROOT . '/views/header.php'; ?>

<section>
    <div class="container m-t-235">
        <div class="row justify-content-center">
            <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 ">
                    <h5 class="m-text20 p-b-24">
                        User account
                    </h5>
                    <h4 class="p-b-20" >
                        Hello,  <?php echo $user['name'];?>!
                    </h4>


                    <div class="size15 trans-0-4">
                        <!-- Button -->
                        <a href="/cabinet/edit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                            Edit data
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php include ROOT . '/views/footer.php'; ?>