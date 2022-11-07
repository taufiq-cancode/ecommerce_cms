<?php
  session_start();
  $title = "Shop - eCommerce CMS";
  include 'includes/header.php';
?>   

<main class="main">
    <!-- Start Breadcrumb -->
    <div class="page-header text-center" style="background-image: url('assets/images/background/breadcrumb-bg.jpg')">
        <div class="container">
        <h1 class="page-title" style="color:white">Shop<span  style="color:white">Our Products</span></h1>
        </div>
    </div>
            
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </div>
    </nav>
    <!-- End Breadcrumb -->

    <div class="page-content">
        <div class="container">		
            <div class="products">
                <div class="row">
                    
                    <!-- Start Fetching All Products -->
                    <?php 
                    $db=new mysqli("localhost","root","","ecommerce");
                    if ($db->connect_error){
                        die("Connection Failed: " . $db->connect_error);
                    }
                                    
                    if(isset($_GET['CATEGORY'])){
                        $sql="SELECT * FROM products WHERE category='$_GET[CATEGORY]' ORDER BY id DESC LIMIT 20";
                        }else{
                        $sql="SELECT * FROM products ORDER BY id DESC LIMIT 20";    
                    }  
                    $prod_query = $db->query($sql);

                    if (mysqli_num_rows($prod_query) < 1){
                        echo "<div class='alert alert-warning' style='width:100%; margin:20px; text-align:center'> No available products in this category </div>";
                    }
                    ?>
                                        
                    <?php 
                        while($row = mysqli_fetch_assoc($prod_query)){
                    ?>         
                    
                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                        <!-- Start Product Include -->
                        <?php include 'includes/product.php'; ?>
                        <!-- Start Product Include -->
                    </div>
                                
                    <?php } ?>
                    <!-- End Fetching All Products -->

                </div>
            </div>
        </div>        
        <?php include 'includes/categories.php'; ?>
    </div>
</main>
<?php include 'includes/footer.php'; ?>