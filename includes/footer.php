<!-- Start Footer -->
<footer class="footer footer-2">
    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">Copyright © 2022 eCommerce CMS by Taofeek Adekunle. All Rights Reserved.</p>
            <div class="social-icons social-icons-color">
                <span class="social-label"><a href="https://github.com/taufiq-cancode/ecommerce_cms">GitHub</a></span>
                    <a href="https://github.com/taufiq-cancode/ecommerce_cms" class="social-icon social-github" title="GitHyb" target="_blank"><i class="icon-github"></i></a>
            </div>
        </div>
    </div>
</footer>        
<!-- End Footer -->
</div><!-- End .page-wrapper in Header.php file -->

<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

<!-- Mobile Menu -->
<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->
    <div class="mobile-menu-container mobile-menu-light">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="search.php" method="post" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="keyword" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" name="search" type="submit"><i class="icon-search"></i></button>
            </form>
            
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="active"> <a href="index.php">Home</a> </li>
                    <li class="">
                        <a href="shop.php" class="sf-with-ul">Shop</a>
                        <ul style="display: none;">
                        <li><a href="shop.php?CATEGORY=Shirts">Shirts</a></li>
                        <li><a href="shop.php?CATEGORY=Pants">Pants</a></li>
                        <li><a href="shop.php?CATEGORY=Jackets">Jackets</a></li>
                        <li><a href="shop.php?CATEGORY=Hats">Hats</a></li>
                        </ul>
                    </li>
                    <li class=""> <a href="contact.php">Contact</a> </li>
               </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
              
                <a href="https://github.com/taufiq-cancode/ecommerce_cms" class="social-icon" target="_blank" title="GitHub"><i class="icon-github"></i></a>
                
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->
 

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/demos/demo-5.js"></script>
</body>
</html>