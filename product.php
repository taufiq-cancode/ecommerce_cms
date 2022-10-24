<?php
  session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Product - eCommerce CMS</title>
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
@media screen and (max-width: 792px){
.product-details-action .btn-cart {
    padding: 2rem 2.5rem;
    max-width: 198px;
    color: #11202f;
    border: 0.1rem solid #464f5b;
}
}

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
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Product Details</a></li>
                    </ol>

                  
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
<?php 
if(isset($_GET['ID'])){

$conn = new mysqli("localhost","root","","ecommerce");
$sql = "SELECT * FROM products WHERE id ='$_GET[ID]' ";
$result = mysqli_query($conn, $sql) or die("Error");
$row = mysqli_fetch_array($result);	
}else{
	echo "Unknown Error";
}
?>
  
            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                        <?php
                            $img = $row['img'];
                            $image = explode(" | ",$img);
                        ?>
                                  
                                       <div class="row">
                                        <figure class="product-main-image">
                                            <img id="product-zoom" src="assets/images/products/<?php echo $image[0];?>" data-zoom-image="assets/images/products/<?php echo $image[0];?>" alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                            <a class="product-gallery-item active" href="#" data-image="assets/images/products/<?php echo $image[0];?>" data-zoom-image="assets/images/products/<?php echo $image[0];?>">
                                                <img src="assets/images/products/<?php echo $image[0];?>" alt="product side">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="assets/images/products/<?php echo $image[1];?>" data-zoom-image="assets/images/products/<?php echo $image[1];?>">
                                                <img src="assets/images/products/<?php echo $image[1];?>" alt="product cross">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="assets/images/products/<?php echo $image[2];?>" data-zoom-image="assets/images/products/<?php echo $image[2];?>">
                                                <img src="assets/images/products/<?php echo $image[2];?>" alt="product with model">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="assets/images/products/<?php echo $image[3];?>" data-zoom-image="assets/images/products/<?php echo $image[3];?>">
                                                <img src="assets/images/products/<?php echo $image[3];?>" alt="product back">
                                            </a>
                                        </div><!-- End .product-image-gallery -->
                                    </div><!-- End .row -->
                                    
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title"><?php echo $row['name'];?></h1><!-- End .product-title -->

                                    <div class="product-price">
                                       &#8358;<?php echo number_format($row['price']);?>
                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                        <p><?php echo $row['descrip'];?></p>
                                    </div><!-- End .product-content -->

                                    <div class="details-filter-row details-row-size">
                                        <p>Color: <?php echo $row['color'];?></p>
                                    </div><!-- End .details-filter-row -->


                                <form method="post" action="cart.php?action=add&id=<?php echo $row['id']; ?>" enctype="multipart/form-data">
                                    <div class="details-filter-row details-row-size">
                                        <label for="size">Size:</label>
                                        <div class="select-custom">
                                           <select required name="size" style="font-size:15px;border: 1px solid navyblue; padding:10px; width:100%;">
                                            <option value="">Select Size</option>
                                            
                                            <?php
                                            $size = $row['size'];
                                            $si = explode(" , ",$size);
                                            
                                            foreach($si as $siz){ ?>
                                            
                                            <option value='<?php echo $siz; ?>'><?php echo $siz; ?></option>
                                            
                                            <?php   
                                               }
                                            ?>    
                                           </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .details-filter-row -->

                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Qty:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" name="qty" id="qty" class="form-control" value="1" min="1" max="100" step="1" data-decimals="0" required>
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->
                                    <input type="hidden" name="name"  value="<?php echo $row['name']; ?>">
                    					<input type="hidden" name="price"  value="<?php echo $row['price'];?>">
                    					<input type="hidden" name="img" value="<?php echo $image[0];?>">
                                    <div class="product-details-action">
                                        <button name="addtocart"  class="btn-product btn-cart">Add To Cart</button>
                                    </div><!-- End .product-details-action -->
                                </div><!-- End .product-details -->
                                </form>
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                      </div><!-- End .container -->
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