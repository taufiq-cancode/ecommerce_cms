<?php
  session_start();
  $title = "Contact - eCommerce CMS";
  include 'includes/header.php';
?>

        <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/background/breadcrumb-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title" style="color:white">Contact</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->

            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
          

            <div class="page-content pb-0" style="margin-top:20px;">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-6 mb-2 mb-lg-0">
                			<h2 class="title mb-1">Contact Information</h2><!-- End .title mb-2 -->
                			<div class="row">
                				<div class="col-sm-7">
                					<div class="contact-info">
                						<h3>The Office</h3>
                                    	<ul class="contact-list">
                							<li>
                								<i class="icon-map-marker"></i>
	                							Kaduna, Nigeria.
	                						</li>
                							<li>
                								<i class="icon-phone"></i>
                								<a href="tel:+234 905 580 7624">+2349048102856</a>
                							</li>
                							<li>
                								<i class="icon-envelope"></i>
                								<a href="mailto:info@ecommerce.ng">info@ecommerce.ng</a>
                							</li>
                						</ul><!-- End .contact-list -->
                					</div><!-- End .contact-info -->
                				</div><!-- End .col-sm-7 -->

                				<div class="col-sm-5">
                					<div class="contact-info">
                						<h3>The Office</h3>

                						<ul class="contact-list">
                							<li>
                								<i class="icon-clock-o"></i>
	                							<span class="text-dark">Monday-Saturday</span> <br>11am-7pm WAT
	                						</li>
                							<li>
                								<i class="icon-calendar"></i>
                								<span class="text-dark">Sunday</span> <br>11am-6pm WAT
                							</li>
                						</ul><!-- End .contact-list -->
                					</div><!-- End .contact-info -->
                				</div><!-- End .col-sm-5 -->
                			</div><!-- End .row -->
                		</div><!-- End .col-lg-6 -->
                		<div class="col-lg-6">
                			<h2 class="title mb-1">Got Any Questions?</h2><!-- End .title mb-2 -->
                			<p class="mb-2">Use the form below to get in touch with the sales team</p>

                			<form action="contact.php" method="post" class="contact-form mb-3">
                				<div class="row">
                					<div class="col-sm-6">
                                        <label for="cname" class="sr-only">Name</label>
                						<input type="text" name="name" class="form-control" id="cname" placeholder="Name *" required>
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                                        <label for="cemail" class="sr-only">Email</label>
                						<input type="email" name="email" class="form-control" id="cemail" placeholder="Email *" required>
                					</div><!-- End .col-sm-6 -->
                				</div><!-- End .row -->

                				<div class="row">
                					<div class="col-sm-6">
                                        <label for="cphone" class="sr-only">Phone</label>
                						<input type="tel" name="phone" class="form-control" id="cphone" placeholder="Phone">
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                                        <label for="csubject" class="sr-only">Subject</label>
                						<input type="text" name="subject" class="form-control" id="csubject" placeholder="Subject">
                					</div><!-- End .col-sm-6 -->
                				</div><!-- End .row -->

                                <label for="cmessage" class="sr-only">Message</label>
                				<textarea class="form-control" name="message" cols="30" rows="4" id="cmessage" required placeholder="Message *"></textarea>

                				<button type="submit" name="message" class="btn btn-outline-primary-2 btn-minwidth-sm">
                					<span>SUBMIT</span>
            						<i class="icon-long-arrow-right"></i>
                				</button>
                			</form><!-- End .contact-form -->
                		</div><!-- End .col-lg-6 -->
                	</div><!-- End .row -->

                    </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

 
<?php include 'includes/footer.php'; ?>