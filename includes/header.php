<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> <?php echo $title; ?></title>
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
                            <li><a href="index.php" >Home</a></li>
                            <li>
                                <a href="shop.php" class="sf-with-ul">Shop</a>
                                <ul style="display: none;">
                                    <li><a href="shop.php?CATEGORY=Shirts">Shirts</a></li>
                                    <li><a href="shop.php?CATEGORY=Pants">Pants</a></li>
                                    <li><a href="shop.php?CATEGORY=Jackets">Jackets</a></li>
                                    <li><a href="shop.php?CATEGORY=Hats">Hats</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.php">Contact </a></li>
                        </ul>
                    </nav>
                </div>
                <div class="header-right">
                    <div class="header-search">
                        <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                        <form action="search.php" method="post">
                            <div class="header-search-wrapper">
                                <label for="q" class="sr-only">Search</label>
                                <input type="search" class="form-control" name="keyword" id="q" placeholder="Search product..." required>
                                <button class="btn btn-primary" type="submit" name="search"></button>
                            </div>
                        </form>
                        </div>
                        
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
                                  
                                    <!-- Start Fetching and Displaying Cart Items -->                                
                                    <?php
                					if (!empty($_SESSION['shopping_cart'])){
                					foreach($_SESSION['shopping_cart'] as $key => $r):
                					?>
                					
                                    <!-- Start Displaying Cart Product -->
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="#"><?php echo $r['name']; ?></a>
                                            </h4>
                                            <span class="cart-product-info">
                                                <span class="cart-product-qty"><?php echo $r['qty']; ?></span>
                                                x &#8358;<?php echo number_format($r['price']); ?>
                                            </span>
                                        </div>
                                        <figure class="product-image-container">
                                            <a href="product.php" class="product-image">
                                                <img src="assets/images/products/<?php echo $r['img']; ?>" alt="product">
                                            </a>
                                        </figure>
                                    </div>
                                    <!-- End Displaying Cart Product -->

                                    <?php 
                						endforeach;
                					}else{
                						echo "<br><div style='margin: 0 5px' class='alert alert-info' role='alert'>Cart is Empty. Add an item to cart</div> <br>";		
                					}
                					?>	
                                    <!-- Start Fetching and Displaying Cart Items -->

                                    
                                </div>
                                <!-- Start Calculating Cart Total -->
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
                                <!-- End Calculating Cart Total -->

                                <!-- Start Display Cart Total -->
                                <div class="dropdown-cart-total">
                                    <span>Total</span>
                                    <span class="cart-total-price">&#8358;<?php echo number_format($totalall); ?></span>
                                </div>
                                <!-- Start Display Cart Total -->

                                <div class="dropdown-cart-action">
                                    <a href="cart.php" class="btn btn-primary">View Cart</a>
                                </div>
                            </div>
                        </div>
                  </div>
                </div>
            </div>
        </header>