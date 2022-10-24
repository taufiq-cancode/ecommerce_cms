<?php
  session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>eCommerce CMS</title>
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


.banner-content {
    left: 48px;
    padding-top: 10px;
}
.product-price {
    margin-top: 0.5rem;
    margin-bottom: .5rem;
    font-size: 1.4rem;
    font-weight: 500;
    letter-spacing: 0;
    color: #333;
    flex-direction: column;
    align-items: flex-start;
}
.menu.sf-arrows .sf-with-ul::after {
    font-family: 'molla';
    content: '\f110';
    position: absolute;
    right: 0;
    top: 50%;
    display: none;
    font-size: 1rem;
    line-height: 1;
    margin-top: -.5rem;
}   

.header-9 .sticky-header.fixed {
    background-color: #777777e8;
}
.header-left, .header-center, .header-right {
    display: flex;
    align-items: center;
    padding: 16px 0 15px 0;
}
@media screen and (min-width: 992px){
.sticky-header.fixed .logo {
    margin-top: 10px;
    margin-bottom: 0;
}
}
a:hover, .active{
    color: black !important;
}
.menu li:hover > a, .menu li.show > a, .menu li.active > a {
    color: #000000;
}
.cart-dropdown .cart-count {
    background-color: #000000;
}
</style>
<body>
    <div class="page-wrapper">
        <header class="header header-9">
            <div class="sticky-wrapper"><div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>
                        
                        <a href="index.php" class="logo">
                            <h3 style="color: white;">eCommerce</h3>
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-right">
                       <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="active"><a href="index.php" class="sf-with-ul">Home</a></li>
                                <li class="">
                                    <a href="shop.php" class="sf-with-ul">Shop</a>
                                    <ul style="display: none;">
                                    <li><a href="shop.php?CATEGORY=Shirts">Shirts</a></li>
                                    <li><a href="shop.php?CATEGORY=Pants">Pants</a></li>
                                    <li><a href="shop.php?CATEGORY=Jackets">Jackets</a></li>
                                    <li><a href="shop.php?CATEGORY=Hats">Hats</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.php" class="sf-with-ul">Contact</a></li>
                             </ul>
                        </nav>
                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="search.php" method="post">
                                <div class="header-search-wrapper">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="keyword" id="q" placeholder="Search product ..." required>
                                    <button class="btn btn-primary" type="submit" name="search"><i class="icon-search"></i></button>
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
                                if (isset($_SESSION['shopping_cart'])){
        						foreach($_SESSION['shopping_cart'] as $key => $r):
        						$totalall = $totalall +  ($r['qty'] * $r['price']);

        						?>
        						<?php
        							endforeach;
                                }
        						?>
                                <div class="dropdown-cart-total">
                                    <span>Total</span>

                                    <span class="cart-total-price">&#8358;<?php echo number_format($totalall); ?></span>
                                </div><!-- End .dropdown-cart-total -->

                                <div class="dropdown-cart-action">
                                    <a href="cart.php" class="btn btn-primary">View Cart</a>
                                </div><!-- End .dropdown-cart-total -->
                            </div><!-- End .dropdown-menu -->
                        </div>
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div></div><!-- End .header-middle -->
        </header>
        <!-- End .header -->

        <main class="main">
            <div class="intro-slider-container mb-0">
                <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{"nav": false, "dots": false}'>
                    <div class="intro-slide" style="background-image: url(assets/images/background/home-bg.jpg);">
                        <div class="container intro-content text-center">
                            <h3 class="intro-subtitle text-white">Welcome to my</h3><!-- End .h3 intro-subtitle --><br>
                            <h1 class="text-white">eCommerce CMS solution</h1><!-- End .intro-title -->
                            <div class="intro-text text-white">Operate your ecommerce store seamlessly</div><!-- End .intro-text -->
                            <a href="shop.php" class="btn btn-primary">Discover NOW</a>
                        </div><!-- End .intro-content -->
                    </div><!-- End .intro-slide -->

                </div><!-- End .intro-slider owl-carousel owl-theme -->

                <span class="slider-loader text-white"></span><!-- End .slider-loader -->
            </div><!-- End .intro-slider-container -->

               <div class="container pt-6 new-arrivals">
                <div class="heading heading-center mb-3">
                    <h2 class="title">New Arrivals</h2><!-- End .title -->

                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="new-all-link" data-toggle="tab" href="#new-all-tab" role="tab" aria-controls="new-all-tab" aria-selected="true">All</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="new-shirt-link" data-toggle="tab" href="#new-shirt-tab" role="tab" aria-controls="new-shirt-tab" aria-selected="false">Shirts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="new-pant-link" data-toggle="tab" href="#new-pant-tab" role="tab" aria-controls="new-pant-tab" aria-selected="false">Pants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="new-sleeve-link" data-toggle="tab" href="#new-sleeve-tab" role="tab" aria-controls="new-sleeve-tab" aria-selected="false">Polo   Jackets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="new-access-link" data-toggle="tab" href="#new-access-tab" role="tab" aria-controls="new-access-tab" aria-selected="false">  Hats</a>
                        </li>
                    </ul>
                </div><!-- End .heading -->

                <div class="tab-content">
                    <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
                        <div class="products">
                            <div class="row justify-content-center">
                                <?php 
                        			$db=new mysqli("localhost","root","","ecommerce");
                        			if ($db->connect_error){
                        				die("Connection Failed: " . $db->connect_error);
                        			}
                        			
                                    $sql="SELECT * FROM products WHERE category != 'Trending' ORDER BY ID DESC LIMIT 20";
                        		
		
                        			$slides = $db->query($sql);
                        			?>
                        			
                        			<?php 
                        				while($row = mysqli_fetch_assoc($slides)){
                        			?>
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <a href="product.php?ID=<?php echo $row['id'];?>">
                                                <?php
                                            $img = $row['img'];
                                            $image = explode(" | ",$img);
                                            ?>
                                                <img src="assets/images/products/<?php echo $image[0];?>" alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action product-action-transparent">
                                                <a href="product.php?ID=<?php echo $row['id'];?>" class="btn-product btn-cart"><span>add to cart</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a><?php echo $row['category'];?></a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.php?ID=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                &#8358;<?php echo number_format($row['price']);?>
                                            </div><!-- End .product-price -->
                                         </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                               <?php
                        			}
                        		?>
                            </div><!-- End .row -->
                        </div><!-- End .products -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane p-0 fade" id="new-shirt-tab" role="tabpanel" aria-labelledby="new-shirt-link">
                        <div class="products">
                            <div class="row justify-content-center">
                                <?php 
                        			$db=new mysqli("localhost","root","","ecommerce");
                        			if ($db->connect_error){
                        				die("Connection Failed: " . $db->connect_error);
                        			}
                        			
                                    $sql="SELECT * FROM products WHERE category='T-shirts' ORDER BY id DESC LIMIT 20";
                        			$slides = $db->query($sql);
                        			?>
                        			
                        			<?php 
                        				while($row = mysqli_fetch_assoc($slides)){
                        			?>
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <a href="product.php?ID=<?php echo $row['id'];?>">
                                                <?php
                                            $img = $row['img'];
                                            $image = explode(" | ",$img);
                                            ?>
                                                <img src="assets/images/products/<?php echo $image[0];?>" alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action product-action-transparent">
                                                <a href="product.php?ID=<?php echo $row['id'];?>" class="btn-product btn-cart"><span>add to cart</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a><?php echo $row['category'];?></a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.php?ID=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                &#8358;<?php echo number_format($row['price']);?>
                                            </div><!-- End .product-price -->
                                         </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                               <?php
                        			}
                        		?>
                            </div><!-- End .row -->
                            </div><!-- End .products -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane p-0 fade" id="new-pant-tab" role="tabpanel" aria-labelledby="new-pant-link">
                        <div class="products">
                            <div class="row justify-content-center">
                   <div class="row justify-content-center">
                                <?php 
                        			$db=new mysqli("localhost","root","","ecommerce");
                        			if ($db->connect_error){
                        				die("Connection Failed: " . $db->connect_error);
                        			}
                                    $sql="SELECT * FROM products WHERE category='Pants' ORDER BY id DESC LIMIT 20";
                        			$slides = $db->query($sql);
                        			?>
                        			
                        			<?php 
                        				while($row = mysqli_fetch_assoc($slides)){
                        			?>
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <a href="product.php?ID=<?php echo $row['id'];?>">
                                                <?php
                                            $img = $row['img'];
                                            $image = explode(" | ",$img);
                                            ?>
                                                <img src="assets/images/products/<?php echo $image[0];?>" alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action product-action-transparent">
                                                <a href="product.php?ID=<?php echo $row['id'];?>" class="btn-product btn-cart"><span>add to cart</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a><?php echo $row['category'];?></a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.php?ID=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                &#8358;<?php echo number_format($row['price']);?>
                                            </div><!-- End .product-price -->
                                         </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                               <?php
                        			}
                        		?>
                            </div><!-- End .row -->           </div><!-- End .row -->
                        </div><!-- End .products -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane p-0 fade" id="new-access-tab" role="tabpanel" aria-labelledby="new-access-link">
                        <div class="products">
                            <div class="row justify-content-center">
                             <div class="row justify-content-center">
                                <?php 
                        			$db=new mysqli("localhost","root","","ecommerce");
                        			if ($db->connect_error){
                        				die("Connection Failed: " . $db->connect_error);
                        			}
                        			
                                    $sql="SELECT * FROM products WHERE category='  Hats' ORDER BY id DESC LIMIT 20";
                        		
                        			$slides = $db->query($sql);
                        			?>
                        			
                        			<?php 
                        				while($row = mysqli_fetch_assoc($slides)){
                        			?>
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <a href="product.php?ID=<?php echo $row['id'];?>">
                                                <?php
                                            $img = $row['img'];
                                            $image = explode(" | ",$img);
                                            ?>
                                                <img src="assets/images/products/<?php echo $image[0];?>" alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action product-action-transparent">
                                                <a href="product.php?ID=<?php echo $row['id'];?>" class="btn-product btn-cart"><span>add to cart</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a><?php echo $row['category'];?></a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.php?ID=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                &#8358;<?php echo number_format($row['price']);?>
                                            </div><!-- End .product-price -->
                                         </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                               <?php
                        			}
                        		?>
                            </div><!-- End .row -->
                            </div><!-- End .row -->
                        </div><!-- End .products -->
                    </div><!-- .End .tab-pane -->
                      <div class="tab-pane p-0 fade" id="new-sleeve-tab" role="tabpanel" aria-labelledby="new-sleeve-link">
                        <div class="products">
                            <div class="row justify-content-center">
                   <div class="row justify-content-center">
                                <?php 
                        			$db=new mysqli("localhost","root","","ecommerce");
                        			if ($db->connect_error){
                        				die("Connection Failed: " . $db->connect_error);
                        			}
                                    $sql="SELECT * FROM products WHERE category='  Jackets' ORDER BY id DESC LIMIT 20";
                        			$slides = $db->query($sql);
                        			?>
                        			
                        			<?php 
                        				while($row = mysqli_fetch_assoc($slides)){
                        			?>
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <a href="product.php?ID=<?php echo $row['id'];?>">
                                                <?php
                                            $img = $row['img'];
                                            $image = explode(" | ",$img);
                                            ?>
                                                <img src="assets/images/products/<?php echo $image[0];?>" alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action product-action-transparent">
                                                <a href="product.php?ID=<?php echo $row['id'];?>" class="btn-product btn-cart"><span>add to cart</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a><?php echo $row['category'];?></a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.php?ID=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                &#8358;<?php echo number_format($row['price']);?>
                                            </div><!-- End .product-price -->
                                         </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                               <?php
                        			}
                        		?>
                            </div><!-- End .row -->           </div><!-- End .row -->
                        </div><!-- End .products -->
                    </div><!-- .End .tab-pane -->
                  
                </div><!-- End .tab-content -->

                <div class="more-container text-center mt-1 mb-3">
                    <a href="shop.php" class="btn btn-outline-primary-2 btn-round btn-more">Load more</a>
                </div><!-- End .more-container -->
            </div><!-- End .container -->

   
<div class="container">
              <div class="heading heading-center mb-3">
                            <h2 class="title">Product Categories</h2><!-- End .title -->
               </div><!-- End .heading -->
          <?php 
                        	$db=new mysqli("localhost","root","","ecommerce");
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
                				<img src="assets/images/categories/shirts.jpg" style="height: 300px;" alt="T-Shirts">
                			</a>

                			<div class="banner-content banner-content-static text-center">
                				<h3 class="banner-title">T-Shirts</h3><!-- End .banner-title -->
                				<h4 class="banner-subtitle"><?php echo $countt; ?> Products</h4><!-- End .banner-subtitle -->
                				<a href="shop.php?CATEGORY=T-shirts" class="banner-link">Shop Now</a>
                			</div><!-- End .banner-content -->
            			</div><!-- End .banner -->

            			<div class="banner banner-cat">
                			<a href="shop.php?CATEGORY=Pants">
                				<img src="assets/images/categories/pants.jpg" style="height: 300px;" alt="Pants">
                			</a>

                			<div class="banner-content banner-content-static text-center">
                				<h3 class="banner-title">Pants</h3><!-- End .banner-title -->
                				<h4 class="banner-subtitle"><?php echo $countp; ?> Products</h4><!-- End .banner-subtitle -->
                				<a href="shop.php?CATEGORY=Pants" class="banner-link">Shop Now</a>
                			</div><!-- End .banner-content -->
            			</div><!-- End .banner -->

            			<div class="banner banner-cat">
                			<a href="shop.php?CATEGORY=  Jackets">
                				<img src="assets/images/categories/jackets.jpg" style="height: 300px;" alt="Jackets">
                			</a>

                			<div class="banner-content banner-content-static text-center">
                				<h3 class="banner-title">Jackets</h3><!-- End .banner-title -->
                				<h4 class="banner-subtitle"><?php echo $counts; ?> Products</h4><!-- End .banner-subtitle -->
                				<a href="shop.php?CATEGORY=  Jackets" class="banner-link">Shop Now</a>
                			</div><!-- End .banner-content -->
            			</div><!-- End .banner -->

            			<div class="banner banner-cat">
                			<a href="shop.php?CATEGORY=  Hats">
                				<img src="assets/images/categories/hats.jpg" style="height: 300px;" alt="Hats">
                			</a>

                			<div class="banner-content banner-content-static text-center">
                				<h3 class="banner-title">Hats</h3><!-- End .banner-title -->
                				<h4 class="banner-subtitle"><?php echo $counta; ?> Products</h4><!-- End .banner-subtitle -->
                				<a href="shop.php?CATEGORY=  Hats" class="banner-link">Shop Now</a>
                			</div><!-- End .banner-content -->
            			</div><!-- End .banner -->

            		
        			</div><!-- End .banners-carousel owl-carousel owl-simple -->


   
</div>

         
     </main><!-- End .main -->

       <footer class="footer footer-2">
        

            <div class="footer-bottom">
                <div class="container">
                    <p class="footer-copyright">Copyright © 2022 eCommerce CMS by Taofeek Adekunle. All Rights Reserved.</p><!-- End .footer-copyright -->
                    <div class="social-icons social-icons-color">
                        <span class="social-label"><a href="https://github.com/taufiq-cancode/ecommerce_cms">GitHub</a></span>
                        <a href="https://github.com/taufiq-cancode/ecommerce_cms" class="social-icon social-github" title="GitHyb" target="_blank"><i class="icon-github"></i></a>
                    </div><!-- End .soial-icons -->
                </div><!-- End .container -->
            </div><!-- End .footer-bottom -->
        </footer>
        
        <!-- End .footer -->
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