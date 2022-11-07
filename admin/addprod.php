<?php
  session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Products - eCommerce CMS</title>
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
                            <img src="assets/images/logo.png" alt="eCommerce CMS Logo" width="150" height="25">
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li>
                                    <a href="index.php" >Home</a>
                                </li>
                                 <li>
                                    <a href="about.php" >About</a>
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
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                        
                       <!-- php $count = count($_SESSION['shopping_cart']);	?> -->
                       <!-- php $count = count($_SESSION['shopping_cart']);	?> -->db

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
                                                <a href="product.php"><?php echo $r['name']; ?></a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty"><?php echo $r['qty']; ?></span>
                                                x N<?php echo number_format($r['price']); ?>
                                            </span>
                                        </div><!-- End .product-cart-details -->

                                        <figure class="product-image-container">
                                            <a class="product-image">
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

                                 <div class="dropdown-cart-total">
                                    <span>Total</span>
                                    <span class="cart-total-price">N<?php echo number_format($totalall); ?></span>
                                </div>
                                <!-- End .dropdown-cart-total -->

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
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container-fluid">
                    <h1 class="page-title">Admin Dashboard</h1>
                </div><!-- End .container-fluid -->
            </div><!-- End .page-header -->
                             
            <div class="page-content">
                <div class="container">
                    
                    <?php
	
	$db=mysqli_connect("localhost","root","","ecommerce");
	if(isset($_POST['submit'])){
	
    $errors = array();
    $success = array();
    
        $uploadDir = 'assets/images/products/';
        $allowTypes = array('jpg','png','jpeg','gif');
    
        if(!empty(array_filter($_FILES['imgs']['name']))){
            foreach($_FILES['imgs']['name'] as $key=>$val){
                $filename = basename($_FILES['imgs']['name'][$key]);
                $targetFile = $uploadDir.$filename;
                if(move_uploaded_file($_FILES["imgs"]["tmp_name"][$key], $targetFile)){
                    $success[] = "Uploaded $filename";
                    $insertQrySplit[] = "$filename";
                }
                else {
                    $errors[] = "Something went wrong- File - $filename";
                }
            }
    
            //Inserting to database
            if(!empty($insertQrySplit)) {
                $query = implode(" | ", $insertQrySplit);
            }
        }
        else {
            $errors[] = "No File Selected";
        }
    
    
    
    
	$name = $_POST['name'];
	$descrip = $_POST['descrip'];
	$price = $_POST['price'];
	$size = $_POST['size'];
	$color = $_POST['color'];
	$category = $_POST['category'];
	$quantity = $_POST['quantity'];
    $s = "";
    $siz = "";
    foreach($size as $s){  
      $siz .= $s." , ";  
    }
	
	

		$sql_u = "SELECT * FROM products WHERE name='$name'";
		$res_u = mysqli_query($db, $sql_u);

		if (mysqli_num_rows($res_u) > 0) {
		echo "<br><br><br><div style='margin: 0 20px' class='alert alert-danger' role='alert'> Product Already exists </div>";	
		 }else{
		 $sql_i = "INSERT INTO products (name, price, category, descrip, quantity, size, color, img) VALUES ('$name','$price','$category','$descrip', '$quantity', '$siz','$color','$query')";
	if (mysqli_query($db, $sql_i)){
		echo "<br><br><br><div style='margin: 0 20px' class='alert alert-success' role='alert'> Product Added Successfully </div><br><br><br>";
	}else{
		echo mysqli_error($db);
	}
		 }


	$db->close();
	}

error_reporting(E_ALL);
ini_set("display_errors", 1);
	?>
                    
                	<div class="touch-container row justify-content-center">
                		<div class="col-md-9 col-lg-7">
                			<div class="text-center">
                			    <br>
                			</div><!-- End .text-center -->

                			<form action="addprod.php" method="post" enctype="multipart/form-data" class="contact-form mb-2">
                                <label for="csubject" class="sr-only">Name</label>
        						<input type="text" name="name" class="form-control" id="csubject" placeholder="Name">

                                <label for="csubject" class="sr-only">Price</label>
        						<input type="text" name="price" class="form-control" id="csubject" placeholder="Price">
        						
        						<label for="csubject" class="sr-only">Category</label>
        						<select class="form-control" name="category">
        						    <option value="">Select Category</option>
        						    <option value="Pants">Pants </option>
        						    <option value="  Shirts">  Shirts</option>
                                    <option value="  Jackets">  Jackets</option>
        						    <option value="Hoodies">Hoodies/Sweatshirt</option>
        						    <option value="Shirts">Shirts</option>
        						    <option value="Jackets">Jackets</option>
        						    <option value="  Hats">  Hats</option>
        						    <option value="2 Piece">2 pieces</option>
        						</select>
        						
        						 <label for="csubject" class="sr-only">Colours</label>
        						<input type="text" name="color" class="form-control" id="csubject" placeholder="Colours">
        						
        						<label for="csubject" class="sr-only">Availability</label>
        						<input type="number" name="quantity" class="form-control" id="csubject" placeholder="Availability">
        						
        						<label>Select Sizes</label>
        					    <div class="form-check">
                                  <div class="col">
                                      <input class="form-check-input" name="size[]" type="checkbox" value="Small">
                                      <label class="form-check-label" for="flexCheckDefault">
                                        Small
                                      </label>
                                  </div>
                                  
                                  <div class="col">
                                  <input class="form-check-input" name="size[]" type="checkbox" value="Medium">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Medium
                                  </label>
                                  </div>
                                  
                                  <div class="col">
                                  <input class="form-check-input" name="size[]" type="checkbox" value="Large">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Large
                                  </label>
                                  </div>
                                  
                                  <div class="col">
                                  <input class="form-check-input" name="size[]" type="checkbox" value="Extra Large">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Extra Large
                                  </label>
                                  </div>
                                  
                                  <div class="col">
                                  <input class="form-check-input" name="size[]" type="checkbox" value="Extra Xtra Large">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Extra Xtra Large
                                  </label>
                                  </div>
                                  
                                </div>

        					
                                <label for="cmessage" class="sr-only">Description</label>
                				<textarea class="form-control" cols="30" name="descrip" rows="4" id="cmessage" required placeholder="Description"></textarea>
								
								<label for="csubject" class="sr-only">Select Images</label>
        						<input type="file" name="imgs[]" class="form-control" id="csubject" multiple>
								
								<div class="text-center">
	                				<input type="submit" name="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
	                				
                				</div><!-- End .text-center -->
                			</form><!-- End .contact-form -->
                		</div><!-- End .col-md-9 col-lg-7 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
                </main><!-- End .main -->

     </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
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
                    <li class=""> <a href="about.php">About</a> </li>
                    <li class=""> <a href="shop.php">Shop</a> </li>
                    <li class=""> <a href="category.php">Categories</a> </li>
                    <li class=""> <a href="contact.php">Contact</a> </li>
               </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
              
                <a href="https://www.instagram.com/ff_culture/" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper --> </div><!-- End .mobile-menu-container -->


    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>