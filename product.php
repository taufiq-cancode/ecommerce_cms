<?php
session_start();
   
if(isset($_GET['ID'])){

$conn = new mysqli("localhost","root","","ecommerce");
$sql = "SELECT * FROM products WHERE id ='$_GET[ID]' ";
$result = mysqli_query($conn, $sql) or die("Error");
$row = mysqli_fetch_array($result);	
}else{
	echo "Unknown Error";
}

$title = $row['name'];  
include 'includes/header.php';
?>

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

<?php include 'includes/footer.php'; ?>