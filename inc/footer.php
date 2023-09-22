<!-- Start of LiveChat (www.livechat.com) code -->
<script>
    window.__lc = window.__lc || {};
    window.__lc.license = 15849234;
    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="https://www.livechat.com/chat-with/15849234/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
<!-- End of LiveChat code -->


<footer>
    <div class="bg-dark text-white">
        <div class="container py-4">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-4 col-sm-6 mb-2">
                    <img src="public/img/logo/logo-footer.png" width="80%">
                    <h5 class="mt-2 text-capitalize"><?php echo $site_about ?></h5>
                    <p class="m-0 p-0 mb-2"><i class="bi bi-envelope me-1"></i><?php echo $c_email ?></p>
                    <p class="m-0 p-0"><i class="bi bi-geo-alt-fill me-1"></i><?php echo $c_address ?></p>
                </div>
                <div class="col-6 col-lg-3 col-md-4 col-sm-6 mb-2">
                    <h5 class="card-subtitle text-orange fw-bold mb-4">Links</h5>
                    <a href="index.php" class="text-decoration-none text-white d-block mb-2"><i class="bi bi-arrow-right-short me-1"></i>Index</a>
                    <a href="shop.php" class="text-decoration-none text-white d-block mb-2"><i class="bi bi-arrow-right-short me-1"></i>Shop</a>
                    <a href="about-us.php" class="text-decoration-none text-white d-block mb-2"><i class="bi bi-arrow-right-short me-1"></i>About Us</a>
                    <a href="contact-us.php" class="text-decoration-none text-white d-block mb-2"><i class="bi bi-arrow-right-short me-1"></i>Contact Us</a>
                    <a href="terms-conditions.php" class="text-decoration-none text-white d-block mb-2"><i class="bi bi-arrow-right-short me-1"></i>Terms & Conditions</a>
                    <a href="tracking.php" class="text-decoration-none text-white d-block mb-2"><i class="bi bi-arrow-right-short me-1"></i>Track Order</a>
                </div>
                <div class="col-6 col-lg-3 col-md-4 col-sm-6 mb-2">
                    <h5 class="card-subtitle text-orange fw-bold mb-4">Follow Us</h5>
                    <i class="bi bi-facebook text-primary me-1"></i><a href="<?php echo $c_fb ?>" class="text-decoration-none text-white" target="_blank">Facebook</a>
                    <hr>
                    <i class="bi bi-instagram text-danger me-1"></i><a href="<?php echo $c_insta ?>" class="text-decoration-none text-white" target="_blank">Instagram</a>
                    <hr>
                    <i class="bi bi-twitter text-info me-1"></i><a href="<?php echo $c_tw ?>" class="text-decoration-none text-white" target="_blank">Twitter</a>
                    <hr>
                </div>
                <div class="col-6 col-lg-3 col-md-4 col-sm-6 mb-2">
                    <iframe src="<?php echo $c_iframe ?>" width="100%" height="100%" style="border:0; filter: grayscale(100%) invert(92%) contrast(83%);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="bg-orange text-center text-white fw-bold py-2">
            &#169; <script>var year = new Date();document.write(year.getFullYear())</script> electronic gala all right reserved
        </div>
    </div>
</footer>

<!-- JQuery 3.6.4 -->
<script src="public/js/jquery.min.js"></script>
<!-- Bootstrap v5.2.1 -->
<script src="public/js/bootstrap.bundle.min.js"></script>
<!-- Custom js -->
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    window.onload = function () {
        $("#loader").addClass("d-none");
    }
</script>