
</div>

<div class="btn-back-to-top bg0-hov" id="myBtn">
		<a id="scrollUp" class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</a>
</div>

<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
    <div class="flex-w p-b-90">
        <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 p-b-30">
                GET IN TOUCH
            </h4>

            <div>
                <p class="s-text7 w-size27">
                    Any questions?  call us on (+0) 00 111 111
                </p>

                <div class="flex-m p-t-30">
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
                </div>
            </div>
        </div>

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                <a href="/catalog/"  class="s-text12 p-b-30">Categories</a>
            </h4>

            <ul>
                <?php foreach ($categories as $categoryItem): ?>

                <li class="p-b-9">
                    <a href="/category/<?php echo $categoryItem['id'];?>" class="s-text7">
                        <?php echo $categoryItem['name']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                Links
            </h4>

            <ul>
                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Search
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        About Us
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Contact Us
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Returns
                    </a>
                </li>
            </ul>
        </div>

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                Help
            </h4>

            <ul>
                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Track Order
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Returns
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Shipping
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        FAQs
                    </a>
                </li>
            </ul>
        </div>

        <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 p-b-30">
                Newsletter
            </h4>

            <form>
                <div class="effect1 w-size9">
                    <input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
                    <span class="effect1-line"></span>
                </div>

                <div class="w-size2 p-t-20">
                    <!-- Button -->
                    <button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                        Subscribe
                    </button>
                </div>

            </form>
        </div>
    </div>

    <div class="t-center p-l-15 p-r-15">
        <a href="#">
            <img class="h-size2" src="/template/images/icons/paypal.png" alt="IMG-PAYPAL">
        </a>

        <a href="#">
            <img class="h-size2" src="/template/images/icons/visa.png" alt="IMG-VISA">
        </a>

        <a href="#">
            <img class="h-size2" src="/template/images/icons/mastercard.png" alt="IMG-MASTERCARD">
        </a>

        <a href="#">
            <img class="h-size2" src="/template/images/icons/express.png" alt="IMG-EXPRESS">
        </a>

        <a href="#">
            <img class="h-size2" src="/template/images/icons/discover.png" alt="IMG-DISCOVER">
        </a>

        <div class="t-center s-text8 p-t-20">
            Copyright © 2020 .
        </div>
    </div>
</footer>

<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
</div>

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>

<script type="text/javascript" src="/template/vendor/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/template/vendor/jqueryui/jquery-ui.js"></script>
<!--<script src="/template/plugins/Isotope/isotope.pkgd.min.js"></script>-->
<script type="text/javascript" src="/template/vendor/animsition/js/animsition.min.js"></script>
<script type="text/javascript" src="/template/vendor/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="/template/vendor/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/template/vendor/select2/select2.min.js"></script>
<script type="text/javascript">
    $(".selection-1").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
</script>
<script type="text/javascript" src="/template/vendor/slick/slick.min.js"></script>
<script type="text/javascript" src="/template/js/slick-custom.js"></script>
<script type="text/javascript" src="/template/vendor/countdowntime/countdowntime.js"></script>
<!--==================================te=============================================================-->
<script type="text/javascript" src="/template/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="/template/vendor/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#limiter").change(function(){
            let limiter = $(this).val();
            let dataString = limiter;


        });
    });
</script>
<script>
    $(document).ready(function(){

        $("#limiter").change(function (){
            let sel = $(this).val();

            $.post("/catalog/category/"+sel, {}, function (data) {
                $("#limiter").html(data);
            });
            return false;
        })
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            var nameProduct = $(this).attr("data-name");

            swal(nameProduct, "is added to cart !", "success");

            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });

        $(".cart-minus").click(function () {
            var id = $(this).attr("data-id");
            location.reload(true);

            $.post("/cart/delAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
        $(".cart-plus").click(function () {
            var id = $(this).attr("data-id");
            location.reload(true);

            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>
<script>
    function SHPassword(e)
    {
        let chkbox = e.checked;
        if (chkbox)
        {
            document.getElementById("labelPwd").type = "text";
            document.getElementById("labelPwdRepeat").type = "text";
            document.getElementById("showhidepwd").textContent="Hide";
        }
        else
        {
            document.getElementById("labelPwd").type = "password";
            document.getElementById("labelPwdRepeat").type = "password";
            document.getElementById("showhidepwd").textContent="Show";
        }
    }
</script>

<script type="text/javascript">
    /*$('.block2-btn-addcart').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to cart !", "success");
        });
    });*/

    $('.block2-btn-addwishlist').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");
        });
    });
</script>

<script type="text/javascript">

    $(function() {
        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 10000,
            values: [ 0, 1000 ],
            slide: function( event, ui ) {
                $( "#amount" ).html( "$ " + ui.values[ 0 ] + " - $ " + ui.values[ 1 ] );
                $( "#amount1" ).val(ui.values[ 0 ]);
                $( "#amount2" ).val(ui.values[ 1 ]);
            }
        });
        $( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
            " - $" + $( "#slider-range" ).slider( "values", 1 ) );
    });
</script>
<script>
    $(document).ready(function (){
        function filter_data(){
            $('.filter_data').html('<div id="loading" style=""</div>>');
            let action = 'fetch_data';
            let min = $('#min').val();
            let max = $('#max').val();
            $.ajax({
                url:'/category/MyajaxCall',
                type:'POST',
                data:{action:action,min:min,max:max}
                success:function (data){
                    $('.filter_data').html(data);
                }
            })
        }
    })
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
<script src="/template/js/map-custom.js"></script>
<script src="/template/js/main.js"></script>

</body>
</html>