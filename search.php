<?php
  session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Shop eCommerce CMS</title>
    <meta name="keywords" content="eCommerce CMS">
    <meta name="description" content="eCommerce CMS ecommerce fashion website">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/favicon.png">
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <link rel="manifest" href="assets/images/icons/site.webmanifest">
    <link rel="mask-icon" href="assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="assets/images/icons/favicon.png">
    <meta name="apple-mobile-web-app-title" content="eCommerce CMS">
    <meta name="application-name" content="eCommerce CMS">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/skins/skin-demo-5.css">
    <link rel="stylesheet" href="assets/css/demos/demo-5.css">
    <link rel="stylesheet" href="assets/css/custom.css">

</head>
<style>

.mobile-menu-container {
    position: fixed;
    left: -280px;
    top: 0;
    bottom: 0;
    z-index: 1001;
    background-color: #141e29;
    width: 100%;
    max-width: 280px;
    overflow-y: scroll;
    box-shadow: 0.1rem 0 0.6rem 0 rgb(51 51 51 / 50%);
    will-change: transform;
    visibility: hidden;
    font-size: 1.2rem;
    line-height: 1.5;
    transition: all 0.4s ease;
}
.mobile-menu li.open > a, .mobile-menu li.active > a {
    color: skyblue;
}
.btn-primary {
    color: #fff;
    background-color: skyblue;
    border-color: skyblue;
    box-shadow: none;
}
    .product-title {
    font-size: 1.4rem;
    font-weight: 400;
    letter-spacing: 0;
     font-size: 1.5rem;
}
.product-price {
    margin-top: 0.5rem;
    margin-bottom: 0.5rem;
    font-size: 1.4rem;
    letter-spacing: 0;
    font-weight: 500;
    color: #333;
    flex-direction: column;
    align-items: flex-start;
}
</style>
<body>
    <div class="page-wrapper">
    <header class="header">
            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>
                        <a href="index.php" class="logo">
                            <h3 style="color: black;">eCommerce</h3>
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li>
                                    <a href="index.php" >Home</a>
                                </li>
                                 <li>
                                    <a href="shop.php" >Shop</a>
                                </li>
                                  
                                 <li>
                                    <a href="contact.php">Contact </a>
                                </li>
                                 </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                            <form action="search.php" method="post">
                                <div class="header-search-wrapper">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="keyword" id="q" placeholder="Search product..." required>
                                     <button class="btn btn-primary" type="submit" name="search"></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                        
                        <?php 
                      if (isset($_SESSION['shopping_cart'])){
                        $count = count($_SESSION['shopping_cart']);	
                      }else{
                        $count = 0;
                      }
                      ?>

                           <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="icon-shopping-cart"></i>
                                <span class="cart-count"><?php echo $count; ?></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products">
                                  
                                    <?php
                					if (!empty($_SESSION['shopping_cart'])){
                					foreach($_SESSION['shopping_cart'] as $key => $r):
                					?>
                					
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="#"><?php echo $r['name']; ?></a>
                                            </h4>
                                            <span class="cart-product-info">
                                                <span class="cart-product-qty"><?php echo $r['qty']; ?></span>
                                                x &#8358;<?php echo number_format($r['price']); ?>
                                            </span>
                                        </div><!-- End .product-cart-details -->

                                        <figure class="product-image-container">
                                            <a href="product.php" class="product-image">
                                                <img src="assets/images/products/<?php echo $r['img']; ?>" alt="product">
                                            </a>
                                        </figure>
                                        
                                    </div>
                                     <?php 
                						endforeach;
                					}else{
                						echo "<br><div style='margin: 0 5px' class='alert alert-info' role='alert'>Cart is Empty. Add an item to cart</div> <br>";		
                					}
                					?>	
                                    <!-- End .product -->
                                </div><!-- End .cart-product -->
                                <?php
        						$totalall=0;
        						foreach($_SESSION['shopping_cart'] as $key => $r):
        						$totalall = $totalall +  ($r['qty'] * $r['price']);
        						?>
        						<?php
        							endforeach;
        						?>
                                <div class="dropdown-cart-total">
                                    <span>Total</span>

                                    <span class="cart-total-price">&#8358;<?php echo number_format($totalall); ?></span>
                                </div><!-- End .dropdown-cart-total -->

                                <div class="dropdown-cart-action">
                                    <a href="cart.php" class="btn btn-primary">View Cart</a>
                                </div><!-- End .dropdown-cart-total -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                  </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/about/4.jpg')">
        		<div class="container">
        			<h1 class="page-title" style="color:white">Shop eCommerce CMS<span  style="color:white">Our Products</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
        		
                    <div class="products">
                        <div class="row">
                                	<?php
	   $db=mysqli_connect("localhost","ffcultur_admin","ff_7030_culture","ffcultur_db");
	   if(isset($_POST['search'])){
	       $keyword = $_POST['keyword'];
	        $query = "SELECT * FROM `products` WHERE CONCAT(`name`, `category`, `descrip`, `size`, `color`) LIKE '%".$keyword."%'";
            $search_result = filterTable($query);
	   }else{
	      $query = "SELECT * FROM products";
	      $search_result = filterTable($query);
	   }
	   
	   function filterTable($query){
	       $db=mysqli_connect("localhost","ffcultur_admin","ff_7030_culture","ffcultur_db");
	       $filter_Result = mysqli_query($db, $query);
	       return $filter_Result;
	   }
	?>
	 
	
	        <?php 
				while($row = mysqli_fetch_assoc($search_result)){
			?>
                            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                <div class="product">
                                    <figure class="product-media">
                                        <?php
                                            $img = $row['img'];
                                            $image = explode(" | ",$img);
                                            ?>
                                        <a href="product.php?ID=<?php echo $row['id'];?>">
                                            <img src="assets/images/products/<?php echo $image[0];?>" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action action-icon-top">
                                            <a href="product.php?ID=<?php echo $row['id'];?>" class="btn-product btn-cart"><span>add to cart</span></a>
                                           
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                      
                                        <h2 class="product-title"><a href="product.php?ID=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></h2><!-- End .product-title -->
                                        <div class="product-price">
                                            &#8358;<?php echo number_format($row['price']);?>
                                        </div><!-- End .product-price -->
                                       
                                       
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                            
                             <?php
                        			}
                        		?>
                            
                         </div><!-- End .row -->

                        </div><!-- End .products -->

                  </div><!-- End .container -->
                  
                  <div class="container">
              <div class="heading heading-center mb-3">
                            <h2 class="title">Product Categories</h2><!-- End .title -->
               </div><!-- End .heading -->
          <?php 
                        	$db=new mysqli("localhost","ffcultur_admin","ff_7030_culture","ffcultur_db");
                        	if ($db->connect_error){
                        		die("Connection Failed: " . $db->connect_error);
                        	}
                        	$sqlp="SELECT * FROM products WHERE category='Pants'";
                        	$resp = $db->query($sqlp);
                        	$countp=mysqli_num_rows($resp);
                        	
                        	$sqls="SELECT * FROM products WHERE category='  Jackets'";
                        	$ress = $db->query($sqls);
                        	$counts=mysqli_num_rows($ress);
                        	
                        	$sqlt="SELECT * FROM products WHERE category='T-shirts'";
                        	$rest = $db->query($sqlt);
                        	$countt=mysqli_num_rows($rest);
                        	
                        	$sqla="SELECT * FROM products WHERE category='  Hats'";
                        	$resa = $db->query($sqla);
                        	$counta=mysqli_num_rows($resa);
                        	
                        
                        ?>    
                   
     <div class="owl-carousel owl-simple" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
            			<div class="banner banner-cat">
                			<a href="shop.php?CATEGORY=T-shirts">
                				<img src="assets/images/tsh.jpg" alt="FF T-Shirt">
                			</a>

                			<div class="banner-content banner-content-static text-center">
                				<h3 class="banner-title">T-Shirts</h3><!-- End .banner-title -->
                				<h4 class="banner-subtitle"><?php echo $countt; ?> Products</h4><!-- End .banner-subtitle -->
                				<a href="shop.php?CATEGORY=T-shirts" class="banner-link">Shop Now</a>
                			</div><!-- End .banner-content -->
            			</div><!-- End .banner -->

            			<div class="banner banner-cat">
                			<a href="shop.php?CATEGORY=Pants">
                				<img src="assets/images/pant.jpg" alt="FF Pants">
                			</a>

                			<div class="banner-content banner-content-static text-center">
                				<h3 class="banner-title">Pants</h3><!-- End .banner-title -->
                				<h4 class="banner-subtitle"><?php echo $countp; ?> Products</h4><!-- End .banner-subtitle -->
                				<a href="shop.php?CATEGORY=Pants" class="banner-link">Shop Now</a>
                			</div><!-- End .banner-content -->
            			</div><!-- End .banner -->

            			<div class="banner banner-cat">
                			<a href="shop.php?CATEGORY=  Jackets">
                				<img src="assets/images/slv.jpg" alt="Family First   Jackets">
                			</a>

                			<div class="banner-content banner-content-static text-center">
                				<h3 class="banner-title">  Jackets</h3><!-- End .banner-title -->
                				<h4 class="banner-subtitle"><?php echo $counts; ?> Products</h4><!-- End .banner-subtitle -->
                				<a href="shop.php?CATEGORY=  Jackets" class="banner-link">Shop Now</a>
                			</div><!-- End .banner-content -->
            			</div><!-- End .banner -->

            			<div class="banner banner-cat">
                			<a href="shop.php?CATEGORY=  Hats">
                				<img src="assets/images/cap.jpg" alt="Family First Caps">
                			</a>

                			<div class="banner-content banner-content-static text-center">
                				<h3 class="banner-title">  Hats</h3><!-- End .banner-title -->
                				<h4 class="banner-subtitle"><?php echo $counta; ?> Products</h4><!-- End .banner-subtitle -->
                				<a href="shop.php?CATEGORY=  Hats" class="banner-link">Shop Now</a>
                			</div><!-- End .banner-content -->
            			</div><!-- End .banner -->

            		
        			</div><!-- End .banners-carousel owl-carousel owl-simple -->


   
</div>

            </div><!-- End .page-content -->
        </main><!-- End .main -->

   
        <footer class="footer">
        	<div class="footer-middle border-0">
	            <div class="container">
	            	<div class="row">
	          <div class="col-sm-6 ">
                            <div class="widget widget-about">
                                <h3 style="color: white">eCommerce</h3>
                                <p>eCommerce CMS (FAMILY FIRST CULTURE) is a clothing brand which portrays the importance of having a family through fashion and clothing. we are focused on showing the world how blessed we are having a family in good and bad times regardless of the cultural and social differences through fashion.</p>
                                     <div class="social-icons">
                                     <a href="https://www.instagram.com/ff_culture/" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                                  </div><!-- End .soial-icons -->
                                                            </div><!-- End .widget about-widget -->
                        </div><!-- End .col-sm-12 col-lg-3 -->

                        <div class="col-sm-3">
                            <div class="widget">
                                <h4 class="widget-title">Links</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="about.html">About eCommerce CMS</a></li>
                                    <li><a href="shop.php">Shop</a></li>
                                    <li><a href="contact.php">Contact us</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-4 col-lg-3 -->

                        <div class="col-sm-3">
                            <div class="widget">
                                <h4 class="widget-title">Contact</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><b>Phone Number:</b> +234 905 580 7624</li>
                                    <li><b>Email:</b> info@ecommerce.ng </li>
                                    <li><b>Shop Address:</b>  GRA Benin City Nigeria. </li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-64 col-lg-3 -->
                  
	            	
	            	</div><!-- End .row -->
	            </div><!-- End .container -->
	        </div><!-- End .footer-middle -->

	        <div class="footer-bottom">
	        	<div class="container">
	        		<p class="footer-copyright">Copyright © 2021 eCommerce CMS. All Rights Reserved.</p><!-- End .footer-copyright -->
	        	
	        	</div><!-- End .container -->
	        </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
     </div><!-- End .page-wrapper -->
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
 </body>

</html>