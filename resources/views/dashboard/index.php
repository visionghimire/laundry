<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<title>LMS</title>
		<meta name="keywords" content="">
		<meta name="description" content="">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="-1" />

		
		<link rel="stylesheet" href="css/animate.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-select.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/washmandu-style.css">
        <script src='https://www.google.com/recaptcha/api.js'></script>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-select.js"></script>
        <script src="js/jquery.singlePageNav.min.js"></script>
		<script src="js/typed.js"></script>
		<script src="js/wow.min.js"></script>
		<script src="js/custom.js"></script>
         <script src="js/contact.js"></script>
        <script src="js/order.js"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <!-- firebase-->
        <script src="https://www.gstatic.com/firebasejs/4.13.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.13.0/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.13.0/firebase-database.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.13.0/firebase-firestore.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.13.0/firebase-messaging.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.13.0/firebase-functions.js"></script>
        
        <!--end firebase-->
		
		<!--favicon-->
		<link rel="apple-touch-icon" sizes="57x57" href="/images/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/images/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/images/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/images/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/images/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/images/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/images/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/images/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="/images/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/images/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
		<link rel="manifest" href="/images/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/images/favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		<!--end favicon-->
        
	</head>
	<body id="top">

		<!-- start preloader -->
		<div class="preloader">
			<div class="sk-spinner sk-spinner-wave">
     	 		<div class="sk-rect1"></div>
       			<div class="sk-rect2"></div>
       			<div class="sk-rect3"></div>
      	 		<div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
     		</div>
    	</div>
    	<!-- end preloader -->

        <!-- start header -->
        <header >
            <div class="container">
                <div class="row ">
                    <div class="col-md-4 col-sm-4 col-xs-12  hidden-sm hidden-xs">
                        <p><i class="fa fa-phone"></i><span> Phone</span>09664781026</p>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 hidden-sm hidden-xs">
                        <p><i class="fa fa-map-marker"></i><span> Location</span>2869 Rizal Ave. Exn. Sta. Cruz, Manila 1013 Philippines</p>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12 hidden-sm hidden-xs">
                        <ul class="social-icon">
                            <li><a href="https://www.facebook.com/MR-SPIN-Laundry-SHOP-102416851737389" class="fa fa-facebook" class="fa fa-facebook"></a></li>
                            </ul>
                    </div>
                    <div style="float: right;" class="col-md-1 col-sm-4 col-xs-12 hidden-sm hidden-xs">
                    	<a style="color:white" href="<?php echo url("/").'/login';?>">Login</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->

    	<!-- start navigation -->
		<nav class="navbar navbar-default templatemo-nav" role="navigation">
			<div class="container">
				<div class="navbar-header" style="margin-right:1rem;">
					<button class="navbar-toggle"  data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon icon-bar"></span>
						<span class="icon icon-bar"></span>
						<span class="icon icon-bar"></span>
					</button>
            <div style="vertical-align:center;">
             <a href="#top" class="wm-logo">
              <img class="rounded" src="images/mrspin.jpg" width="200px" height="100px" alt="Company Name">
            </a>
          </div>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
            <li><a href="#order">PLACE ORDER</a></li>
            <li><a href="#service">PRICE LIST</a></li>
            			<li><a href="#about">ABOUT</a></li>						
						<li><a href="#contact">CONTACT</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- end navigation -->

    	<!-- start home -->
    	<section id="home">
    		<div class="container">
                <div class="elementpadding">
    			<div class="row">
    				<div class="col-md-4 hidden-sm-down hidden-xs">
                        
    					<h2 class="wow fadeIn" data-wow-offset="50" data-wow-delay="0.9s">Let's Wash Your Laundry</h2>
                        <h3 class="wow fadeIn" data-wow-offset="50" data-wow-delay="0.9s">Pickup&nbsp;<span>.</span>&nbsp;Wash&nbsp;<span>.</span>&nbsp;Deliver</h3>
    					<div class="element">
                            <div >Order Now To Get Free Pickup and Delivery</div>
                        </div>
    					<a data-scroll href="#orders" class="btn btn-default wow fadeInUp"  data-wow-delay="0.6s">Place Order</a>
                        
    				</div>
    			</div>
    		</div>
            </div>
    	</section>
    	<!-- end home -->
        <div id="orders">
			<div class="row" >
					
					<div class="col-md-4 col-sm-4 col-xs-12 wow fadeInLeft" data-wow-offset="50" data-wow-delay="0.6s">
						<div class="media">
							<div class="media-heading-wrapper">
								<div class="media-object pull-left">
									<img border="0" alt="washmandu" src="images/icon1.png" width="80" height="80">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <br/>
                                    <br/>
								</div>
								<h3 class="media-heading">PICKUP</h3>
							</div>
							<p>Once we get your order, we pickup your clothes from your home.</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-offset="50" data-wow-delay="0.9s">
						<div class="media">
							<div class="media-heading-wrapper">
								<div class="media-object pull-left">
									<img border="0" alt="washmandu" src="images/icon3.png" width="70" height="80">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <br/>
                                    <br/>
								</div>
								<h3 class="media-heading">WASH</h3>
							</div>
							<p>We wash your clothes using our advanced washing machines. </p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12 wow fadeInRight" data-wow-offset="50" data-wow-delay="0.6s">
						<div class="media">
							<div class="media-heading-wrapper">
								<div class="media-object pull-left">
									<img border="0" alt="washmandu" src="images/icon2.png" width="80" height="80">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <br/>
                                    <br/>
								</div>
								<h3 class="media-heading">DELIVER</h3>
							</div>
							<div class="media-body">
								<p>We fold and pack your clothes and deliver to your home safely.</p>
							</div>
						</div>
					</div>
				</div>
            </div>
          	<!-- start contact -->
    	<section id="order">
    		      <div class="container">
<div class="col-md-12" >
    					<h2 class="wow bounceIn " data-wow-offset="50" data-wow-delay="0.3s">Place <span>Order</span></h2>
    				</div>
                      <div class="order-body">
            <div class="row">

                <div class="col-lg-8 col-lg-offset-2">
                    
<form  id="order_form" onsubmit="event.preventDefault(); formsubmit(); return false;" role="form">

<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

    <div class="messages">
	</div>
    <div class="controls">
   <div class="row">
            <div class="col-md-4" >
                <div class="form-group">
                    <label for="form_name">Types of Garment* </label><br/>
                                 <select class="form-control form-control-lg" id="type" name ="type"  required="required" data-error="Please select atleast one item">
                               <option id="select" value="">Select one..</option>
                                       <?php foreach ($type as $p):?>
                                        <option value=<?php echo $p->id;?>><?php echo $p->name;?></option>
                                      <?php endforeach;?>
                               </select>
                </div>
            </div>
        <div class="col-md-4">
                <div class="form-group">
                    <label for="form_name">Choose Service*</label><br/>
                                 <select class="form-control form-control-lg" id ="service_type" name ="service_type"  required="required" data-error="Please select atleast one item">
                               <option value="Wash and Fold">Wash and Fold</option>
                               <option value="Wash and Iron">Wash and Iron</option>
                               </select>
                </div>
            </div>
            
      
            <div class="col-md-4">
                <div class="form-group">
                    <label for="form_name">Total Kg of Clothes* </label><br/>
                                 <input  type="text" id="unit" name="unit" class="form-control" placeholder="in kg*" required="required" data-error="unit is required.">
                </div>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-12">
                <div class="form-group">
                    <label for="form_name">Full Name *</label>
                    <input  type="text" id="fullname" name="fullname" class="form-control" placeholder="Please enter your full name *" required="required" data-error="Name is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_email">Email *</label>
                    <input type="email" id="email"  name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6" id="showCaptchaOnIOS-area">
                <div class="form-group">
                    <label for="form_phone">Phone*</label>
                    <input  type="tel" id="phone" name="phone" class="form-control" required="required" placeholder="Please enter your phone">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
            <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="form_date">Pickup Date *</label>
                    <input  type="date"   id="pickupdate" min="<?php echo date("Y-m-d"); ?>" name="pickupdate" class="form-control" required="required" onchange="dateChange()" >
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-4">
             <div class="form-group">
                    <label for="form_timeslot">Time Slot* </label><br/>
                                 <select class="form-control form-control-lg" id="timeslot" name="timeslot" required="required" >
                             <!--  <option value="9AM-12PM">8AM-9AM</option>
                              <option value="12PM-3PM">9AM-10AM</option>
                              <option value="3PM-6PM">10AM-11AM</option>
                              <option value="3PM-6PM">11AM-12PM</option>
                              <option value="3PM-6PM">12PM-1PM</option>
                              <option value="3PM-6PM">1PM-2PM</option>
                              <option value="3PM-6PM">2PM-3PM</option>
                              <option value="3PM-6PM">3PM-4PM</option>
                              <option value="3PM-6PM">4PM-5PM</option>
                              <option value="3PM-6PM">5PM-6PM</option>
                              <option value="3PM-6PM">6PM-7PM</option> -->
                              <?php foreach ($slot as $p):?>
                                <?php 
                                if($p->status==0){ ?>
                                    <option value=<?php echo $p->id;?> disabled><?php echo $p->slot;?> (Slot unavailable right now)</option>
                               <?php }else{ ?>
                                        <option value=<?php echo $p->id;?>><?php echo $p->slot;?></option>
                                    <?php } ?>
                                      <?php endforeach;?>

                               </select>
                </div>
                </div>
        </div>
         <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="form_address">Address *</label>
                    <input  type="text" id="address" name="address" class="form-control"  placeholder="Please enter your full address*" required="required" data-error="Address is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label for="form_city">City *</label>
                    <input  type="text" id="city" name="city" class="form-control" value=" " required="required">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
              
        <div class="row">
            <div class="col-md-12">
                <Button id="order_btn" type="submit" class="btn btn-success btn-send" >Place Order</Button>
            </div>
        </div>
        <div id="sms">
            
        </div>
      
    </div>

</form>
<br>

<div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <!-- <label for="form_address">Tracking Code</label> -->
                    <input  type="text" id="tcode" name="tcode" class="form-control"  placeholder="Please enter your Tracking Code*" required="required" data-error=" required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="col-md-4">
                <Button id="order_btn" type="submit" onclick="viewStatus()" class="btn btn-success btn-send" >View</Button>
            </div>

            </div>
        


                    
                </div>

            </div>
            </div>
        </div>
    	</section>
    	<!-- end contact -->

    	<!-- start service -->
    	<section id="service">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-12">
    					<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">Price <span>List</span> </h2>
    				</div>
    				<div class="col-md-4 wow fadeIn" data-wow-offset="50" data-wow-delay="0.6s" style="text-align: center ">
    					<img style="border-radius:50%" alt="cloth" src="images/cloth.jpg" width="250" height="200">
    					<h4>Clothes</h4>
    					<p>

  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#clothespricelist" aria-expanded="false" aria-controls="collapseExample">
   View Price List
  </button>
</p>
<div class="collapse" id="clothespricelist">
 <table class="table">
  <thead class="table-striped">
    <tr>
        <th scope="row">#</th>
      <th scope="col">Services</th>
      <th scope="col">Price</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Wash-Dry-Fold</td>
      <td>P.25/Kg</td>

    </tr>
    <tr>
     <th scope="row">2</th>
      <td>Wash-Dry-Iron</td>
      <td>P.60/Kg</td>
    </tr>
  </tbody>
</table>


</div>
    				</div>
    				<div class="col-md-4 active wow fadeIn" data-wow-offset="50" data-wow-delay="0.6s" style="text-align: center">
    					<img style="border-radius:50%" alt="cloth" src="images/blanket.jpg" width="250" height="200">
    					<h4>Blankets and Quilts</h4>
    					<p>

  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#blanketpricelist" aria-expanded="false" aria-controls="collapseExample">
   View Price List
  </button>
</p>
<div class="collapse" id="blanketpricelist">
 <table class="table">
  <thead class="table-bordered">
    <tr>
        <th scope="row">#</th>
      <th scope="col">Service</th>
      <th scope="col">Price</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Wash-Dry-Fold</td>
      <td>P.23/Kg</td>
     </tr>
      <tr>
      <th scope="row">2</th>
      <td>1Kg-2Kg</td>
      <td>P.50</td>
    </tr>
      <tr>
      <th scope="row">3</th>
      <td>2kg-3Kg</td>
      <td>P.70</td>
    </tr>
      <tr>
      <th scope="row">4</th>
      <td>3Kg-4Kg</td>
      <td>P.90</td>
    </tr>
      <tr>
      <th scope="row">9</th>
      <td>Above 4Kg</td>
      <td>Contact us for Price </td>
    </tr>
 
  </tbody>
</table>


</div>
	</div>
    				<div class="col-md-4 wow fadeIn" data-wow-offset="50" data-wow-delay="0.6s" style="text-align: center">
    					<img style="border-radius:50%" alt="cloth" src="images/linen.jpg" width="250" height="200">
    					<h4>Linens</h4>
    					<p>

  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#linenpricelist" aria-expanded="false" aria-controls="collapseExample">
   View Price List
  </button>
</p>
<div class="collapse" id="linenpricelist">
    <table class="table">
        <thead class="table-striped">
          <tr>
              <th scope="row">#</th>
            <th scope="col">Services</th>
            <th scope="col">Price</th>
      
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Wash and Fold</td>
            <td>P.25/Kg</td>
      
          </tr>
          <tr>
           <th scope="row">2</th>
            <td>Wash and Iron</td>
            <td>P.35/Kg</td>
          </tr>
        </tbody>
      </table>


</div>
    				</div>
    			</div>
    		</div>
    	</section>
      <!-- end servie -->
    
<!-- start about -->
		<section id="about">
			<div class="container">
	<div class="col-md-12" >
    					<h2 class="wow bounceIn " data-wow-offset="50" data-wow-delay="0.3s">About <span>Us</span></h2>
    				</div>
               
                <div id="about-body">
                <p>Mr. Spin Laundry service is the smart laundry solutions to all your laundry woes. It provides laundry service at exceptionally cheapest rate, high quality using latest technology machines and internationally standardized detergents for quality cleaning. Further, it provides washing, steam ironing, and other value-added services to make your life free of laundry hassles. Also, it is obliged with promised services and customer satisfaction is guaranteed.
                    
<br/>
<br/>

We provide washing, steam ironing and other value added services to make your life free of laundry hassles.
<br/>
<br/>

Our staff consists of experts who have huge experience and knowledge of different types of fabrics and garments and know how to treat them.
<br/>
<br/>

We ensure that we find a smile on your face with every service that we provide.</p>
                </div>
			</div>
		</section>
		<!-- end about -->
    	

    	<!-- start contact -->
    	<section id="contact">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-12">
    					<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">Contact <span>Us</span></h2>
    				</div>

    				<div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-offset="50" data-wow-delay="0.9s">
                            <form  id="contact_form" onsubmit="sendMessage(); return false;" role="form">
    						<label>NAME</label>
    						<input name="fullname" type="text" class="form-control" id="contact_fullname" placeholder="Please enter your full name *" required="required" data-error="Name is required.">
   						  	
                            <label>EMAIL</label>
    						<input name="email" type="email" class="form-control" id="contact_email" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
   						  	
                            <label>MESSAGE</label>
    						<textarea name="message" rows="4" class="form-control" id="contact_message" placeholder="Please enter message *" required="required" data-error="Message is required."></textarea>
    						
                       <Button  class="btn btn-success btn-send" >Send Message</Button>
    					</form>
    				</div>

    				<div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight" data-wow-offset="50" data-wow-delay="0.6s">
                        <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInRight" data-wow-offset="50" data-wow-delay="0.6s">
    					<address>
    						<p class="address-title">OUR ADDRESS</p>
    						
    						<p><i class="fa fa-phone"></i> 09664781026</p>
    						<p><i class="fa fa-envelope-o"></i> mrspin.laundry@gmail.com</p>
    						
                           <div class="mapouter"><div class="gmap_canvas"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.471865443012!2d120.98041171478964!3d14.629135389784313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b503284549b1%3A0x8069ea4ff1b129d1!2sMr.%20Spin%20Laundry%20Shop!5e0!3m2!1sen!2snp!4v1641734537104!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                           </div></div>
    					</address>
    					<ul class="social-icon">
    						<li><h4>Connect on</h4></li>
    						<li><a href="https://www.facebook.com/MR-SPIN-Laundry-SHOP-102416851737389" class="fa fa-facebook"></a></li>
    						
    					</ul>
    				</div>
    			</div>
    		</div>




            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle" style="color:black">Order Status</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="color:black" class="modal-body" id="mbody">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
    	</section>
    	<!-- end contact -->

        <!-- start copyright -->
        <footer id="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        
                       <strong> Copyright &copy; 2021 <a href="#">Laundry Management System</a>. </strong> All rights
    reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- end copyright -->
     

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/validator.js"></script>
<script>
    var baseurl = "<?php echo url('/'); ?>";
    var config = {
    apiKey: "AIzaSyCo4BLTyHmEkuYpsrHmX9jdjJZbl1dGrbU",
    authDomain: "washmandu-85033.firebaseapp.com",
    databaseURL: "https://washmandu-85033.firebaseio.com",
    projectId: "washmandu-85033",
    storageBucket: "washmandu-85033.appspot.com",
    messagingSenderId: "106230856648"
  };
  firebase.initializeApp(config);


  function viewStatus(){
   
    $('#exampleModalCenter').modal('show');
    var tcode=$("#tcode").val();
    $.ajax({

            method: 'get',
            url: baseurl + "/booking/trackorder?tcode=" + tcode,
            success: function (response) {
                $("#mbody").html("");
                if(response[0]){
                    var htm="<table style='font-family: Courier, monospace; font-size:20px'><tr><td>Fullname:</td><td> &nbsp;&nbsp;&nbsp;&nbsp;  "+response[0].fullname+"</td></tr>";
                    htm += "<tr><td>Phone:</td><td> &nbsp;&nbsp;&nbsp;&nbsp;  "+response[0].phone+"</td></tr>";
                    htm += "<tr><td>Unit(kg):</td><td> &nbsp;&nbsp;&nbsp;&nbsp;  "+response[0].unit+"</td></tr>";
                    htm += "<tr><td>Price per kg:</td><td> &nbsp;&nbsp;&nbsp;&nbsp;  "+response[0].price+"</td></tr>";
                    htm += "<tr><td>Total Amount:</td><td> &nbsp;&nbsp;&nbsp;&nbsp;  "+response[0].total+"</td></tr>";
                    if(response[0].status==0){
                         htm += "<tr><td>Order Status:</td><td> &nbsp;&nbsp;&nbsp;&nbsp; Order Received</td></tr>";
                    }
                    if(response[0].status==1){
                         htm += "<tr><td>Order Status:</td><td> &nbsp;&nbsp;&nbsp;&nbsp; On the way for Pickup </td></tr>";
                    }
                    if(response[0].status==2){
                         htm += "<tr><td>Order Status:</td><td> &nbsp;&nbsp;&nbsp;&nbsp; Your laundry is Received. </td></tr>";
                    }
                    if(response[0].status==3){
                         htm += "<tr><td>Order Status:</td><td> &nbsp;&nbsp;&nbsp;&nbsp; Your laundry is being washed. </td></tr>";
                    }
                    if(response[0].status==4){
                         htm += "<tr><td>Order Status:</td><td> &nbsp;&nbsp;&nbsp;&nbsp; Your laundry has been sent to your Location. </td></tr>";
                    }
                    htm += "</table>";
                    $("#mbody").html(htm);
                }else{
                    var htm="<h3 style='color:red'><strong>Invalid Tracking code.</strong></h3>";
                     $("#mbody").html(htm);
                }
            },
            fail: function () {
                alert("failed");
            }
        });
  }

  function formsubmit() {

       

            var url = baseurl + "/booking/creates";
       
        $.ajax({
            method: "POST",
            url: url,
            data: $("#order_form").serialize(),
            success: function (resp) {
                var a = JSON.parse(resp);
                toast(a);
                if (a.status == 1) {
                    $("#id").val("");
                    $("#submit").text("Create");
                    resetForm($('#order_form'));
                    var htm="<p style='color:white'>Your order is placed successfully. Your tracking code : "+a.tcode+"</p>";
                    $("#sms").html(htm);
                }else{
                    var htm="<p style='color:red'>Unable to place order."+a.text+"</p>";
                     $("#sms").html(htm);
                }
                // table();



            },
            fail: function () {

                alert("failed");
            }
        });
    }
    function resetForm(form) {
        $(form).trigger('reset');
        if ($('#id').length) {
            $('#id').val('');
        }
    }

    $( function() {
                $( "#pickupdate" ).datepicker({
                    minDate: 0
                });
            });


</script>
	</body>
</html>
<?php
include(resource_path() . '/views/sections/dashfooter.php');
?>