<?php
  session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Shopping Cart - eCommerce CMS</title>
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
@media screen and (max-width:792px){
    .product-col .product-title{
        display:none;
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
        		<div class="page-header text-center" style="background-image: url('assets/images/background/breadcrumb-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title" style="color:white">Shop<span  style="color:white">Shopping Cart</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="cart">
	                <div class="container">
	                	<div class="row">
	                		<div class="col-lg-9">
 <?php
	$product_ids = array();
	if(isset($_POST['addtocart'])){	
	if(isset($_SESSION['shopping_cart'])){
	$count = count($_SESSION['shopping_cart']);	
	$product_ids = array_column($_SESSION['shopping_cart'], 'id');
	if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
	$_SESSION['shopping_cart'][$count] = array
	(		
	'id' => filter_input(INPUT_GET, 'id'),
	'name' => filter_input(INPUT_POST, 'name'),
	'price' => filter_input(INPUT_POST, 'price'),
	'qty' => filter_input(INPUT_POST, 'qty'),
	'size' => filter_input(INPUT_POST, 'size'),
	'color' => filter_input(INPUT_POST, 'color'),
	'img' => filter_input(INPUT_POST, 'img'),
	);
	echo "<br><br><div style='margin: 20px' class='alert alert-success' role='alert'> Product Added to cart </div>";
	}else{
	echo "<br><br><div style='margin: 20px' class='alert alert-info' role='alert'>Product Already added to cart</div>";		
	}	
	}else{
	$_SESSION['shopping_cart'][0] = array
	(
	'id' => filter_input(INPUT_GET, 'id'),
	'name' => filter_input(INPUT_POST, 'name'),
	'price' => filter_input(INPUT_POST, 'price'),
	'qty' => filter_input(INPUT_POST, 'qty'),
	'size' => filter_input(INPUT_POST, 'size'),
	'color' => filter_input(INPUT_POST, 'color'),
	'img' => filter_input(INPUT_POST, 'img'),
	);
	}
	}
if (filter_input(INPUT_GET, 'action') == 'delete'){
foreach($_SESSION['shopping_cart'] as $key => $r){
if ($r['id'] == filter_input(INPUT_GET, 'id')){
unset($_SESSION['shopping_cart'][$key]);
echo "<br><br><div style='margin: 20px' class='alert alert-warning' role='alert'>Product Removed from cart</div>";		
}
}
$_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}
?>
       
	                			<table class="table table-responsive table-cart">
									<thead>
										<tr>
											<th>Product</th>
											<th style="padding-left: 10px;">Price</th>
											<th>Quantity</th>
											<th>Total</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
									    <?php
					if (!empty($_SESSION['shopping_cart'])){
						
					$total =0;	
					foreach($_SESSION['shopping_cart'] as $key => $r):
						
					?>
										<tr>
										    <?php
									$total =  ($r['qty'] * $r['price']);
									?>
											<td class="product-col">
												<div class="product">
													<figure class="product-media">
														<a>
														  
														    <img src="assets/images/products/<?php echo $r['img']; ?>" alt="Product image">
														</a>
													</figure>
                                                    
													<h3 class="product-title">
														<a><?php echo $r['name']; ?></a><br>
														    <small style="color:black;">
														        Size: <?php echo $r['size']; ?><br>
														    </small> 
													</h3><!-- End .product-title -->
												</div><!-- End .product -->
											</td>
											<td style="padding: 10px;" class="price-col">&#8358;<?php echo number_format($r['price']); ?></td>
											<td class="price-col"><?php echo $r['qty']; ?></td>
											<td class="total-col">&#8358;<?php echo number_format($total); ?></td>
											<td class="remove-col"><a href="cart.php?action=delete&id=<?php echo $r['id']; ?>" class="btn-remove"><i class="icon-close"></i></a></td>
										</tr>
					<?php 
						endforeach;
					}else{
						echo "<br><div style='margin: 0 20px' class='alert alert-danger' role='alert'>Cart is Empty. Add an item to cart</div> <br>";		
					}
					?>	    
									</tbody>
								</table><!-- End .table table-wishlist -->
	                		</div><!-- End .col-lg-9 -->
	                		
	                		<aside  id="cartt" class="col-lg-3">
	                			<div class="summary summary-cart">
	                				<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->
                    <?php
						$totalall=0;
						foreach($_SESSION['shopping_cart'] as $key => $r):
						$totalall = $totalall +  ($r['qty'] * $r['price']);
						
						?>
						<?php
							endforeach;
						?>
						
	                				<table class="table table-summary">
	                					<tbody>
	                						<tr class="summary-subtotal">
	                							<td>Subtotal:</td>
	                							<td>&#8358;<?php echo number_format($totalall);?></td>
	                						</tr><!-- End .summary-subtotal -->

	                						
	                						 <?php
    	                   if(isset($_POST['ship'])){
    	                       $country = $_POST['countrya'];
                               $state = $_POST['state'];
                               $del = $_POST['del'];
                                
                                if ($country == "" && $state =="Nigeria"){
                                     $ship = 4100;
                                   if($del == "pick"){
                                       $ship = $ship - 800;
                                   }     
                                }
                                
                                if ($country == "" && $state =="Ghana"){
                                     $ship = 13700;
                                }
                                
                                if ($country == "" && $state =="United Kingdom"){
                                     $ship = 12300;
                                }
                                
                                if ($country == "" && $state =="USA"){
                                     $ship = 15100;
                                }
                                
                                if ($country == "" && $state =="Canada"){
                                     $ship = 15100;
                                }
                                
                                if ($country == "" && $state =="Germany"){
                                     $ship = 17700;
                                }
                                
                                if ($country == "" && $state =="Italy"){
                                     $ship = 17700;
                                }
                                 if ($country == "Lagos-Island" && $state =="Nigeria"){
                                     $ship = 1000;
                                }
                                if ($country == "Lagos-Mainland" && $state =="Nigeria"){
                                     $ship = 2000;
                                }
                                
                                
                               if ($country == "Abuja" && $state =="Nigeria" || $country == "Port-Hacourt" && $state =="Nigeria" 
                               || $country == "Owerri" && $state =="Nigeria" || $country == "Enugu" && $state =="Nigeria" 
                               || $country == "Minna" && $state =="Nigeria" || $country == "Jos" && $state =="Nigeria"){
                                   $ship = 4100;
                                   if($del == "pick"){
                                       $ship = $ship - 800;
                                   }    
                               }else if ($country == "Awka" && $state =="Nigeria" || $country == "Asana" && $state =="Nigeria" 
                               || $country == "Onitsha" && $state =="Nigeria" || $country == "Abeokuta" && $state =="Nigeria" 
                               || $country == "Ibadan" && $state =="Nigeria" || $country == "Warri" && $state =="Nigeria" ||
                               $country == "Benin" && $state =="Nigeria"){
                                   $ship = 3700;
                                   if($del == "pick"){
                                       $ship = $ship - 800;
                                   }
                             }else if ($country == "Abia" && $state == "Nigeria" || $country == "Adamawa" && $state == "Nigeria" ||
                               $country == "Akwa-Ibom" && $state == "Nigeria" || $country == "Anambra" && $state == "Nigeria" ||
                               $country == "Bauchi" && $state == "Nigeria" || $country == "Bayelsa" && $state == "Nigeria" ||
                               $country == "Benue" && $state == "Nigeria" || $country == "Borno" && $state == "Nigeria" ||
                               $country == "Cross-River" && $state == "Nigeria" || $country == "Delta" && $state == "Nigeria" ||
                               $country == "Ebonyi" && $state == "Nigeria" || $country == "Edo" && $state == "Nigeria" || 
                               $country == "Jigawa" && $state == "Nigeria" || $country == "Kaduna" && $state == "Nigeria" ||
                               $country == "Kano" && $state == "Nigeria" || $country == "Kastina" && $state == "Nigeria" ||
                               $country == "Kebbi" && $state == "Nigeria" || $country == "Kogi" && $state == "Nigeria" ||
                               $country == "Kwara" && $state == "Nigeria" || $country == "Lagos" && $state == "Nigeria" ||
                               $country == "Nasarawa" && $state == "Nigeria" || $country == "Ondo" && $state == "Nigeria" ||
                               $country == "Osun" && $state == "Nigeria" || $country == "Oyo" && $state == "Nigeria" ||
                               $country == "Sokoto" && $state == "Nigeria" || $country == "Taraba" && $state == "Nigeria" ||
                               $country == "Yobe" && $state == "Nigeria" || $country == "Zamfara" && $state == "Nigeria" 
                               ){
                              
                                $ship = 4000;
                                $totalalll=0;
                                $totalalll = $totalall + $ship;
                                 
                              }
                           }
                                            ?>
                           
                            <?php if (isset($ship)) { ?> 
                                    
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                  No Home delivery for your location
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                            
                            <?php } ?>
                                            
	                						<tr style="border:none" class="summary-shipping">
	                							<td>Shipping: </td>
	                							<td>&#8358;<?php if (isset($ship)) { echo number_format($ship); }?></td>
	                						</tr>
                                    </tbody>
	                				</table>
	                					
                                            <form name="myform" action="cart.php#cartt" method="post" id="myForm">
                                             
                                               <div class="pro-details-size-content"> 
                                                <select style="font-size:15px;border: 1px solid navyblue;padding: 10px;margin: 7px 0; width:100%;" name="state" id="countySel" size="1" required>
                                                <option value="" selected="selected">Select Country</option>
                                                </select>
                                                <br>
                                                <select style="font-size:15px;border: 1px solid navyblue;padding: 10px;margin: 7px 0; width:100%;" name="countrya" id="stateSel" size="1" >
                                                <option value="" selected="selected">Select State</option>
                                                </select>
                                                
                                                <select name="district" style="display:none" id="districtSel" size="1">
                                                <option value="" style="display:none" type="hidden" selected="selected">Please select State first</option>
                                                </select><br>  
                                                
	                								<div class="custom-control custom-radio">
														<input type="radio" style="height:20px" value="home" name="del" required id="standart-shipping" class="custom-control-input">
														<label class="custom-control-label" for="standart-shipping">Home Delivery:</label>
													</div><!-- End .custom-control -->

	                								<div class="custom-control custom-radio">
														<input type="radio" style="height:20px" value="pick" name="del" required id="express-shipping" class="custom-control-input">
														<label class="custom-control-label" for="express-shipping">Pick Up:</label>
													</div><!-- End .custom-control -->
	                						<button name="ship" type="submit" class="btn btn-outline-primary-2 btn-order btn-block">CALCULATE</button>
                                                
                                            </form>
                                            <table class="table table-summary">
	                				        <tbody>
                                            <?php
    	                   if(isset($_POST['ship'])){
                                $totalalll = $totalall + $ship;
                                   ?>
	                						<tr class="summary-total">
	                							<td>Total: </td>
	                							<td>&#8358;<?php echo number_format($totalalll);?></td>
	                						</tr>
	                						<?php
	                						}
	                						?>
	                						<!-- End .summary-total -->
	                					</tbody>
	                				</table><!-- End .table table-summary -->
                                <?php
    	                   if(isset($_POST['ship'])){
                                   ?>
                                   <br>
	                				<a href="checkout.php?ship=<?php echo $ship; ?>" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
	                					<?php
	                						}
	                						?>
	                			</div><!-- End .summary -->

		            			<a href="shop.php" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
	                		</aside><!-- End .col-lg-3 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .cart -->
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
                                    <li><b>Email:</b> info@ffculture.ng </li>
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
<script>
    var stateObject = {
"Nigeria": { 
"Lagos-Island": [""],
"Lagos-Mainland": [""],
"Abuja": [""],
"Benin": [""],
"Awka": [""],
"Asana": [""],
"Onitsha": [""],
"Abeokuta": [""],
"Ibadan": [""],
"Warri": [""],
"Port-Hacourt": [""],
"Owerri": [""],
"Enugu": [""],
"Minna": [""],
"Jos": [""],
"Abia": [""],
"Adamawa": [""],
"Akwa-Ibom": [""],
"Anambra": [""],
"Bauchi": [""],
"Bayelsa": [""],
"Benue": [""],
"Borno": [""],
"Cross-River": [""],
"Delta": [""],
"Edo": [""],
"Jigawa": [""],
"Kaduna": [""],
"Kano": [""],
"Kastina": [""],
"Gombe": [""],
"Kebbi": [""],
"Kogi": [""],
"Kwara": [""],
"Lagos": [""],
"Nasarawa": [""],
"Ondo": [""],
"Osun": [""],
"Oyo": [""],
"Sokoto": [""],
"Taraba": [""],
"Yobe": [""],
"Zamfara": [""],
},
"Ghana": { 
},
"United Kingdom": { 
},
"USA": { 
},
"Canada": { 
},
"Germany": { 
},
"Italy": { 
},
}
window.onload = function () {
var countySel = document.getElementById("countySel"),
stateSel = document.getElementById("stateSel"),
districtSel = document.getElementById("districtSel");
for (var country in stateObject) {
countySel.options[countySel.options.length] = new Option(country, country);
}
countySel.onchange = function () {
stateSel.length = 1; // remove all options bar first
districtSel.length = 1; // remove all options bar first
if (this.selectedIndex < 1) return; // done 
for (var state in stateObject[this.value]) {
stateSel.options[stateSel.options.length] = new Option(state, state);
}
}
countySel.onchange(); // reset in case page is reloaded
stateSel.onchange = function () {
districtSel.length = 1; // remove all options bar first
if (this.selectedIndex < 1) return; // done 
var district = stateObject[countySel.value][this.value];
for (var i = 0; i < district.length; i++) {
districtSel.options[districtSel.options.length] = new Option(district[i], district[i]);
}
}
}
</script>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>