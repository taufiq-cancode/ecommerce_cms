<?php
  session_start();
  include 'includes/header-home.php';
?>
<main class="main">
    <!-- Start Hero Section -->
    <div class="intro-slider-container mb-0">
        <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{"nav": false, "dots": false}'>
            <div class="intro-slide" style="background-image: url(assets/images/background/home-bg.jpg);">
                <div class="container intro-content text-center">
                    <h3 class="intro-subtitle text-white">Welcome to my</h3><br>
                    <h1 class="text-white">eCommerce CMS solution</h1>
                    <div class="intro-text text-white">Operate your ecommerce store seamlessly</div>
                    <a href="shop.php" class="btn btn-primary">Discover NOW</a>
                </div>
            </div>
        </div>
        <span class="slider-loader text-white"></span>
    </div>
    <!-- End Hero Section-->

    <!-- Start New Arrivals Section -->
    <div class="container pt-6 new-arrivals">
        <div class="heading heading-center mb-3">
            <h2 class="title">New Arrivals</h2>
            <!-- Start Navigation Tabs -->
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
                    <a class="nav-link" id="new-sleeve-link" data-toggle="tab" href="#new-jackets-tab" role="tab" aria-controls="new-jackets-tab" aria-selected="false">Jackets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="new-access-link" data-toggle="tab" href="#new-hats-tab" role="tab" aria-controls="new-hats-tab" aria-selected="false">  Hats</a>
                </li>        
            </ul>
            <!-- End Navigation Tabs -->
        </div>
        <!-- Start Tab Content -->
        <div class="tab-content">
            <!-- Start Tab Pane -->
            <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
                <div class="products">
                    <div class="row justify-content-center">

                        <!-- Start Fetch and Display Product From Database-->
                        <?php 
                        $db=new mysqli("localhost","root","","ecommerce");

                        if ($db->connect_error){
                            die("Connection Failed: " . $db->connect_error);
                        }
                                                            
                        $sql="SELECT * FROM products WHERE category != 'Trending' ORDER BY ID DESC LIMIT 20";
                        $prod_query = $db->query($sql);

                        if (mysqli_num_rows($prod_query) < 1){
                            echo "<div class='alert alert-warning'> No available products in this category </div>";
                        }
                        while($row = mysqli_fetch_assoc($prod_query)){
                            
                        ?>
                            <div class="col-6 col-md-4 col-lg-3">
                                <!-- Start Include Product Component-->
                                <?php include 'includes/product.php'; ?> 
                                <!--End Include Product Component-->
                            </div>
                        <?php
                        }
                        
                        ?>
                        <!-- End Fetch and Display Product From Database-->
                    </div>
                </div>
            </div>
            <!-- End Tab Pane -->

            <!-- Start Tab Pane -->
            <div class="tab-pane p-0 fade" id="new-shirt-tab" role="tabpanel" aria-labelledby="new-shirt-link">
                <div class="products">
                    <div class="row justify-content-center">

                        <!-- Start Fetch and Display Product From Database-->
                        <?php 
                        $db=new mysqli("localhost","root","","ecommerce");

                        if ($db->connect_error){
                            die("Connection Failed: " . $db->connect_error);
                        }
                                                            
                        $sql="SELECT * FROM products WHERE category = '  Shirts' ORDER BY ID DESC LIMIT 20";
                        $prod_query = $db->query($sql);

                        if (mysqli_num_rows($prod_query) < 0){
                            echo "<div class='alert alert-warning'> No available products in this category </div>";
                        }

                        while($row = mysqli_fetch_assoc($prod_query)){
                        ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <!-- Start Include Product Component-->
                            <?php include 'includes/product.php'; ?> 
                            <!--End Include Product Component-->
                        </div>
                        <?php
                        }
                        ?>
                        <!-- End Fetch and Display Product From Database-->
                    </div>
                </div>
            </div>
            <!-- End Tab Pane -->

            <!-- Start Tab Pane -->
            <div class="tab-pane p-0 fade" id="new-pant-tab" role="tabpanel" aria-labelledby="new-pant-link">
                <div class="products">
                    <div class="row justify-content-center">

                        <!-- Start Fetch and Display Product From Database-->
                        <?php 
                        $db=new mysqli("localhost","root","","ecommerce");

                        if ($db->connect_error){
                            die("Connection Failed: " . $db->connect_error);
                        }
                                                            
                        $sql="SELECT * FROM products WHERE category = 'Pant' ORDER BY ID DESC LIMIT 20";
                        $prod_query = $db->query($sql);

                        if (mysqli_num_rows($prod_query) < 1){
                            echo "<div class='alert alert-warning'> No available products in this category </div>";
                        }

                        while($row = mysqli_fetch_assoc($prod_query)){
                        ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <!-- Start Include Product Component-->
                            <?php include 'includes/product.php'; ?> 
                            <!--End Include Product Component-->
                        </div>
                        <?php
                        }
                        ?>
                        <!-- End Fetch and Display Product From Database-->
                    </div>
                </div>
            </div>
            <!-- End Tab Pane -->

            <!-- Start Tab Pane -->
            <div class="tab-pane p-0 fade" id="new-hats-tab" role="tabpanel" aria-labelledby="new-hats-link">
                <div class="products">
                    <div class="row justify-content-center">

                        <!-- Start Fetch and Display Product From Database-->
                        <?php 
                        $db=new mysqli("localhost","root","","ecommerce");

                        if ($db->connect_error){
                            die("Connection Failed: " . $db->connect_error);
                        }
                                                            
                        $sql="SELECT * FROM products WHERE category='Hats' ORDER BY id DESC LIMIT 20";
                        $prod_query = $db->query($sql);

                        if (mysqli_num_rows($prod_query) < 1){
                            echo "<div class='alert alert-warning'> No available products in this category </div>";
                        }

                        while($row = mysqli_fetch_assoc($prod_query)){
                        ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <!-- Start Include Product Component-->
                            <?php include 'includes/product.php'; ?> 
                            <!--End Include Product Component-->
                        </div>
                        <?php
                        }
                        ?>
                        <!-- End Fetch and Display Product From Database-->
                    </div>
                </div>
            </div>
            <!-- End Tab Pane -->

            <!-- Start Tab Pane -->
            <div class="tab-pane p-0 fade" id="new-jackets-tab" role="tabpanel" aria-labelledby="new-jackets-link">
                <div class="products">
                    <div class="row justify-content-center">

                        <!-- Start Fetch and Display Product From Database-->
                        <?php 
                        $db=new mysqli("localhost","root","","ecommerce");

                        if ($db->connect_error){
                            die("Connection Failed: " . $db->connect_error);
                        }
                                                            
                        $sql="SELECT * FROM products WHERE category='Jackets' ORDER BY id DESC LIMIT 20";
                        $prod_query = $db->query($sql);

                        if (mysqli_num_rows($prod_query) < 1){
                            echo "<div class='alert alert-warning'> No available products in this category </div>";
                        }

                        while($row = mysqli_fetch_assoc($prod_query)){
                        ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <!-- Start Include Product Component-->
                            <?php include 'includes/product.php'; ?> 
                            <!--End Include Product Component-->
                        </div>
                        <?php
                        }
                        ?>
                        <!-- End Fetch and Display Product From Database-->
                    </div>
                </div>
            </div>
            <!-- End Tab Pane --> 
        </div>
        <!-- End Tab Content -->

        <div class="more-container text-center mt-1 mb-3">
                    <a href="shop.php" class="btn btn-outline-primary-2 btn-round btn-more">Load more</a>
        </div>
    </div><!-- End New Arrivals Section  -->

    <!-- Start Categories Section-->
    <?php include 'includes/categories.php';?>                    
    <!-- End Categories Section-->
       
</main>
<!-- End Main -->

<?php include 'includes/footer.php'; ?>