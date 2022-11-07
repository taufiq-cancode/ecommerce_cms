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

             <div class="page-content">
                
                 <?php
	$total =0;		
	$totalall=0;	
	$items="";
	foreach($_SESSION['shopping_cart'] as $key => $r):
	 $total = ($r['qty'] * $r['price']);    
	$totalall = $totalall +  ($r['qty'] * $r['price']);
	?>

<?php 
    $items = $r['qty'].' '.$r['name'].' of total price NGN'.$total;
    $itemss[] = $items;
 ?>
    
	<?php
	endforeach;
	?>
	<?php
    $itemsss = implode (' || ', $itemss);
	?>

<?php
if(isset($_POST['submit'])){     
    
//include('Mail.php'); // includes the PEAR Mail class, already on your server.

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$note = $_POST['note'];
$add1 = $_POST['add1'];
$add2 = $_POST['add2'];
$ship= $_POST['ship'];
$country = $_POST['country'];
$note = $_POST['note'];

//$username = 'orders@domian.com'; // your email address
//$password = 'PASSWORD'; // your email address password

// $from = "shop@domian.ng";
// $to = "orders@domain.com";
// $subject = "A New Order on domain.com";
/* $body= "
Name: $fname $lname
    
Country: $country
    
Address Line 1: $add1
    
Address Line 2: $add2
   
Email: $email

Phone Number: $phone
    
Products Ordered: $itemsss

Notes: $note   

Products Total: N$totalall
"; */

/* $headers = array ('From' => $from, 'To' => $to, 'Subject' => $subject); // the email headers
$smtp = Mail::factory('smtp', array ('host' =>'localhost', 'auth' => true, 'username' => $username, 'password' => $password, 'port' => '25')); // SMTP protocol with the username and password of an existing email account in your hosting account
$mail = $smtp->send($to, $headers, $body); // sending the email

if (PEAR::isError($mail)){
echo("<p>" . $mail->getMessage() . "</p>");
}
else {
echo("<br><br><div class='alert alert-success text-center' style='margin: 0 80px; font-size:20px' role='alert'>Order placed successfully. Click the button below to validate order. <br> Thank You!</div><br> <br>");

}
} */
    
echo("

<div class='alert alert-success text-center' style='margin: 20 80px; font-size:20px' role='alert'>
    Order placed successfully, Thank You!
    <hr>
    <p style='color:white'><strong>Customer Name:</strong> $fname $lname</p>
    <p style='color:white'><strong>Country:</strong> $fname $lname</p>
    <p style='color:white'><strong>Address:</strong> $add1 <br> $add2</p>
    <p style='color:white'><strong>Email:</strong> $email </p>
    <p style='color:white'><strong>Phone Number:</strong> $phone</p>
    <p style='color:white'><strong>Products Ordered:</strong> $itemsss</p>
    <p style='color:white'><strong>Note:</strong> $fname $lname</p>
    <p style='color:white'><strong>Total Price:</strong> $totalall</p>
</div>");
    
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
                                        $totalalll=0;
                                        $totalalll = $totalall + $ship;
                                    ?>
             
                    <div class="container text-center justify-content-center">
                    <form id="paymentForm">
                      <div class="form-group">
                        <input type="hidden" id="email-address" value="<?php echo $email; ?>" required />
                      </div>
                      <div class="form-group">
                        <input type="hidden" id="first-name" value="<?php echo $fname; ?>" />
                      </div>
                      <div class="form-group">
                        <input type="hidden" id="last-name" value="<?php echo $lname; ?>" />
                      </div>
                      <input type="submit" onclick="" value="Pay With Credit/Debit card"  style="width:50%;"  class="btn btn-outline-primary-2 btn-order btn-block">
                        
                    </form>
                    </div>

                
                
            </div><!-- End .page-content -->
       
     
<?php include 'includes/footer.php'; ?>