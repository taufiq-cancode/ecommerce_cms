<?php
  session_start();
  $title = "Checkout - eCommerce CMS";
  include 'includes/header.php';
?>

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/background/breadcrumb-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title" style="color:white">Shop<span  style="color:white">Checkout</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
         
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

           
            <div class="page-content">
            	<div class="checkout">
	                <div class="container">
            			<form method="post" action="complete.php" id="paymentForm">
		                	<div class="row">
		                		<div class="col-lg-9">
		                			<h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
		                				<div class="row">
		                					<div class="col-sm-6">
		                						<label>First Name *</label>
		                						<input type="text" name="fname" class="form-control" required>
		                					</div><!-- End .col-sm-6 -->

		                					<div class="col-sm-6">
		                						<label>Last Name *</label>
		                						<input type="text" name="lname" class="form-control" required>
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->

	            						<label>Country *</label>
	            						<input type="text" class="form-control" name="country" required>

	            						<label>Street address *</label>
	            						<input type="text" class="form-control" name="add1" placeholder="House number and Street name" required>
	            						<input type="text" class="form-control" name="add2" placeholder="Appartments, suite, unit etc ..." required>

	            						<div class="row">
		                					<div class="col-sm-6">
		                						<label>Email address *</label>
	        							        <input type="email" class="form-control" name="email" required>
		                					</div><!-- End .col-sm-6 -->

		                					<div class="col-sm-6">
		                						<label>Phone *</label>
		                						<input type="tel" name="phone" class="form-control" required>
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->

	                					
                                	<label>Order notes (optional)</label>
	        							<textarea class="form-control" cols="30" rows="4" name="note" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
		                			
    		                			<input type="hidden" name="ship" value="<?php echo $_GET['ship'] ?>">
                        	            
                        	            <input type="hidden" name="totalalll" id="amount" value="<?php echo $totalalll; ?>">
                    	
		                				<input type="submit" name="submit" value="Proceed to Checkout" class="btn btn-outline-primary-2 btn-order btn-block">
		                				</form>
		                		</div><!-- End .col-lg-9 -->
		                		<aside class="col-lg-3">
		                			<div class="summary">
		                				<h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

		                				<table class="table table-summary">
		                					<thead>
		                						<tr>
		                							<th>Product</th>
		                							<th>Total</th>
		                						</tr>
		                					</thead>

		                					<tbody>
		                					      <?php
					if (!empty($_SESSION['shopping_cart'])){
						
						
					foreach($_SESSION['shopping_cart'] as $key => $r):
						
					?>
		                						<tr>
		                							<td>
		                							    <a style="font-size:15px"><?php echo $r['name']; ?> X <?php echo $r['qty']; ?> </a>
		                							</td>
		                							
		                							<?php
                                    $total =0;
									$total =  ($r['qty'] * $r['price']);
									?>
		                							<td>&#8358;<?php echo number_format($total); ?></td>
		                						</tr>
		            <?php 
						endforeach;
					}else{
						echo "<br><div style='margin: 0 80px' class='alert alert-danger' role='alert'>Cart is Empty. Add an item to cart</div> <br>";		
					}
					?>	
                        <?php
						$totalall=0;
						foreach($_SESSION['shopping_cart'] as $key => $r):
						$totalall = $totalall +  ($r['qty'] * $r['price']);
						?>
						<?php
							endforeach;
						?>
						            <?php
						                $ship= $_GET['ship'];
                                        $totalalll=0;
                                        $totalalll = $totalall + $ship;
                                    ?>
		                						<tr class="summary-subtotal">
		                							<td>Subtotal:</td>
		                							<td>&#8358;<?php echo number_format($totalall);?></td>
		                						</tr><!-- End .summary-subtotal -->
		                						<tr>
		                						    <?php 
                                                    $ship= $_GET['ship'];
                                                    ?>
		                							<td>Shipping:</td>
		                							<td>&#8358;<?php echo number_format($ship);?></td>
		                						</tr>
		                						<tr class="summary-total">
		                							<td>Total:</td>
		                							<td>&#8358;<?php echo number_format($totalalll, 2);?></td>
		                						</tr><!-- End .summary-total -->
		                					</tbody>
		                				</table><!-- End .table table-summary -->

		                			       
		                			</div><!-- End .summary -->
		                		</aside><!-- End .col-lg-3 -->
		                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
<?php include 'includes/footer.php'; ?>