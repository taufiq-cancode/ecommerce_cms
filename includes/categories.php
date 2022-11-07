<div class="container">
        <div class="heading heading-center mb-3">
            <h2 class="title">Product Categories</h2>
        </div>
            <!-- Start Fetching Product Category Details -->
            <?php 
                $db=new mysqli("localhost","root","","ecommerce");
                if ($db->connect_error){
                    die("Connection Failed: " . $db->connect_error);
                }
                $sqlp="SELECT * FROM products WHERE category='Pants'";
                $resp = $db->query($sqlp);
                $countp=mysqli_num_rows($resp);
                
                $sqls="SELECT * FROM products WHERE category='Jackets'";
                $ress = $db->query($sqls);
                $counts=mysqli_num_rows($ress);
                
                $sqlt="SELECT * FROM products WHERE category='  Shirts'";
                $rest = $db->query($sqlt);
                $countt=mysqli_num_rows($rest);
                
                $sqla="SELECT * FROM products WHERE category='Hats'";
                $resa = $db->query($sqla);
                $counta=mysqli_num_rows($resa);            	
            ?>
            <!-- End Fetching Product Category Details -->    
                   
        <!-- Start Displaying Categories Banners -->    
        <div class="row">            
            <!-- Start Each Category -->
            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
            <div class="banner banner-cat">
                <a href="shop.php?CATEGORY=  Shirts">
                    <img src="assets/images/categories/shirts.jpg" style="height: 300px;" alt="  Shirts">
                </a>

                <div class="banner-content banner-content-static text-center">
                	<h3 class="banner-title">  Shirts</h3>
                	<h4 class="banner-subtitle"><?php echo $countt; ?> Products</h4>
                	<a href="shop.php?CATEGORY=  Shirts" class="banner-link">Shop Now</a>
                </div>
            </div>
            </div>
            <!-- End Each Category --> 	

            <!-- Start Each Category -->  
            <div class="col-6 col-md-4 col-lg-4 col-xl-3">  
            <div class="banner banner-cat">
                <a href="shop.php?CATEGORY=Pants">
                    <img src="assets/images/categories/pants.jpg" style="height: 300px;" alt="Pants">
                </a>
                
                <div class="banner-content banner-content-static text-center">
                    <h3 class="banner-title">Pants</h3>
                	<h4 class="banner-subtitle"><?php echo $countp; ?> Products</h4>
                	<a href="shop.php?CATEGORY=Pants" class="banner-link">Shop Now</a>
                </div>
            </div>
            </div>
            <!-- End Each Category -->

            <!-- Start Each Category -->
            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
            <div class="banner banner-cat">
                <a href="shop.php?CATEGORY=  Jackets">
                	<img src="assets/images/categories/jackets.jpg" style="height: 300px;" alt="Jackets">
                </a>

                <div class="banner-content banner-content-static text-center">
                	<h3 class="banner-title">Jackets</h3>
                    <h4 class="banner-subtitle"><?php echo $counts; ?> Products</h4>
                	<a href="shop.php?CATEGORY=  Jackets" class="banner-link">Shop Now</a>
                </div>
            </div>
            </div>
            <!-- End Each Category -->

            <!-- Start Each Category -->
            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
            <div class="banner banner-cat">
                <a href="shop.php?CATEGORY=  Hats">
                	<img src="assets/images/categories/hats.jpg" style="height: 300px;" alt="Hats">
                </a>

                <div class="banner-content banner-content-static text-center">
                	<h3 class="banner-title">Hats</h3>
                	<h4 class="banner-subtitle"><?php echo $counta; ?> Products</h4>
                	<a href="shop.php?CATEGORY=  Hats" class="banner-link">Shop Now</a>
                </div>
            </div>
            </div>
            <!-- End Each Category -->

        </div>
        <!-- End Displaying Categories Banners -->   
    </div>