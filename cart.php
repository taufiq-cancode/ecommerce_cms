<?php
  session_start();
  $title = "Shopping Cart - eCommerce CMS";
  include 'includes/header.php';
?>
<main class="main">
    <!-- Start Breadcrumb -->
	<div class="page-header text-center" style="background-image: url('assets/images/background/breadcrumb-bg.jpg')">
		<div class="container">
    		<h1 class="page-title" style="color:white">Shop<span  style="color:white">Shopping Cart</span></h1>
		</div>
    </div>
    
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div>
    </nav>
    <!-- End Breadcrumb -->

    <div class="page-content">
        <div class="cart">
	        <div class="container">
	           	<div class="row">
	           		<div class="col-lg-9">
                        <!-- Start Includes Cart Session -->
                        <?php include 'includes/cart-session.php' ?>
                        <!-- End Includes Cart Session --> 
                    
                        <!-- Start Cart Table -->
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
                                <!-- Start Display Cart Product -->    
                                <?php
                                    if (!empty($_SESSION['shopping_cart'])){
                                    $total =0;	
                                    foreach($_SESSION['shopping_cart'] as $key => $r):
                                ?>
								<tr>
								<?php $total =  ($r['qty'] * $r['price']); ?>
								<!-- Start Product -->
                                <td class="product-col">
									<div class="product">
										<figure class="product-media">
										    <a><img src="assets/images/products/<?php echo $r['img']; ?>" alt="Product image"></a>
										</figure>
                                        <h3 class="product-title">
											<a><?php echo $r['name']; ?></a><br>
											<small style="color:black;">Size: <?php echo $r['size']; ?><br></small> 
										</h3><!-- End .product-title -->
									</div>
                                </td>
                                <!-- End Product -->
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
                            <!-- End Display Cart Product -->    
							</tbody>
						</table>
                        <!-- End Cart Table -->
	                </div>
                  
	                
                    <!-- Start Cart Summary -->
	                <aside class="col-lg-3" id="cartt">
	                	<div class="summary summary-cart">
	                		<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->
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
						
	                		<table class="table table-summary">
	                    		<tbody>
	                				<tr class="summary-subtotal">
	                					<td>Subtotal:</td>
	                					<td>&#8358;<?php echo number_format($totalall);?></td>
	                				</tr><!-- End .summary-subtotal -->					
                                <?php include 'includes/shipping.php'; ?>
                           
                            <?php if (isset($_POST['country'])){
                                if($_POST['country'] != 'Nigeria'){
                            ?>        
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    No Home delivery for your location
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                            <?php    
                                }
                            }  
                            ?> 
	                				<tr style="border:none" class="summary-shipping">
	                					<td>Shipping: </td>
	                					<td>&#8358;<?php if (isset($ship)) { echo number_format($ship); }?></td>
	                				</tr>
                                </tbody>
	                		</table>
                            <form name="myform" action="cart.php#cartt" method="post" id="myForm">
                                <div class="pro-details-size-content"> 
                                    <select style="font-size:15px;border: 1px solid navyblue;padding: 10px;margin: 7px 0; width:100%;" name="country" id="countySel" size="1" required>
                                        <option value="" selected="selected">Select Country</option>
                                    </select>
                                    <br>
                                    <select style="font-size:15px;border: 1px solid navyblue;padding: 10px;margin: 7px 0; width:100%;" name="state" id="stateSel" size="1" >
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
                                </tbody>
	                		</table>

                                <?php if(isset($_POST['ship'])){ ?>
                                   <br>
	                				<a href="checkout.php?ship=<?php echo $ship; ?>" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
	                			<?php } ?>

	                			</div>

		            			<a href="shop.php" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
	                </aside>
                    <!-- End Cart Summary -->
	            </div>
	        </div>
        </div>
    </div>
</main>
          
<?php include 'includes/footer.php'; ?>