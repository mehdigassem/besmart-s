<?php
// Free Bootstrap Themes : https://www.Zerotheme.com

$text = "<span style='color:red; font-size: 35px; line-height: 40px; magin: 10px;'>Error! Please try again.</span>";

if(isset($_POST['name']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$message=$_POST['message'];

	$to = "youremail@gmail.com";
	$subject = "Zerotheme - Testing Contact Form";
	$message = " Name: " . $name ."\r\n Email: " . $email . "\r\n Message:\r\n" . $message;
	 
	$from = "Zerotheme.com";
	$headers = "From:" . $from . "\r\n";
	$headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n"; 
	 
	if(@mail($to,$subject,$message,$headers))
	{
	  $text = "<span style='font-size: 35px; line-height: 40px; margin: 10px;'>Your Message was sent successfully !</span>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Free Bootstrap Themes by Zerotheme dot com - Free Responsive Html5 Templates">
    <meta name="author" content="www.Zerotheme.com">

    <title>Design Studio</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/animated-logo.min.css"><!-- Logo -->
	<link rel="stylesheet" href="css/our-team.css"> <!-- Resource style -->
	
	<!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- Js -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<!-- /////////////////////////////////////////Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="index.html#page-top">Design Studio</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
					<li>
                        <a class="page-scroll" href="index.html#page-top">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.html#services">Services</a>
                    </li>
					<li>
                        <a class="page-scroll" href="index.html#new">New</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.html#about">About</a>
                    </li>
					<li>
                        <a class="page-scroll" href="index.html#team">Team</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.html#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
	<!-- Navigation -->

	<!-- /////////////////////////////////////////Header -->
	<header id="page-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="o-container">
						<div class="c-slack">
						  <span class="c-slack__dot c-slack__dot--a"></span>
						  <span class="c-slack__dot c-slack__dot--b"></span>
						  <span class="c-slack__dot c-slack__dot--c"></span>
						  <span class="c-slack__dot c-slack__dot--d"></span>
						</div>
					</div>
					<div class="intro-text">
						<div class="intro-lead-in">Welcome To Our Studio!</div>
						<div class="intro-heading">It's Nice To Meet You</div>
					</div>
					<a class="btn btn-1 btn-sm" href="index.html#about">About Us</a>
					<a class="btn btn-1 btn-sm" href="index.html#team">Our Team</a>
				</div>
			</div>
		</div>
    </header>
	<!-- Header -->
	
	<!-- /////////////////////////////////////////Content -->
	<div id="page-content" class="index-page">
		<div class="container">
			<div class="row">
				<div class="message">
					<div class="wrap">
						<!--Warning-->
						<center><?php echo $text;?></center>
						<!---->
						<a href="index.html" class="btn btn-3">Back to HomePage</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- /////////////////////////////////////////Footer -->
	<footer>
		<div class="wrap-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-footer footer-1">
						<div class="heading"><h4>About Us</h4></div>
						<div class="content">
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, dolore magna aliquam erat volutpat. </p>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad</p>
						</div>
					</div>
					<div class="col-md-4 col-footer footer-2">
						<div class="heading"><h4>Your Email</h4></div>
						<div class="content">
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Consectetuer adipiscing elit, dolore magna aliquam erat volutpat. </p>
							<div class="subcribe-form" >
								<form method="get" action="/search" id="subcribe">
									<div class="form-group">
										<input type="text" class="form-control input-lg" name="subcribe" placeholder="Enter your email address...  " required="required" />
									</div>
									<button type="submit" name="Submit" class="btn btn-4 f-left">Subcribe</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-footer footer-3">
						<div class="row">
							<div class="col-md-6">
								<a href="#"><img src="images/15.jpg" /></a>
							</div>
							<div class="col-md-6">
								<a href="#"><img src="images/16.jpg" /></a>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<a href="#"><img src="images/17.jpg" /></a>
							</div>
							<div class="col-md-6">
								<a href="#"><img src="images/18.jpg" /></a>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<a href="#"><img src="images/19.jpg" /></a>
							</div>
							<div class="col-md-6">
								<a href="#"><img src="images/20.jpg" /></a>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<a href="#"><img src="images/21.jpg" /></a>
							</div>
							<div class="col-md-6">
								<a href="#"><img src="images/18.jpg" /></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<p>Copyright &copy; Your Website - Designed by <a href="https://www.Zerotheme.com" target="_blank">Zerotheme</a></p>
					</div>
					<div class="col-md-4">
						<ul class="list-inline">
							<li><a href="#"><i class="fa fa-twitter"></i></a>
							</li>
							<li><a href="#"><i class="fa fa-facebook"></i></a>
							</li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a>
							</li>
							<li><a href="#"><i class="fa fa-google"></i></a>
                            </li>
						</ul>
					</div>
					<div class="col-md-4">
						<ul class="list-inline">
							<li><a href="#">Privacy Policy</a>
							</li>
							<li><a href="#">Terms of Use</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer -->

	
	<!-- jQuery -->
	<script src="js/jquery-2.1.1.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/jquery.flexslider-min.js"></script>
	<script src="js/main.js"></script> <!-- Resource jQuery -->

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="js/agency.js"></script>

	<!-- Animated Top -->
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/classie.js"></script>
	<script src="js/cbpAnimatedHeader.js"></script>

</body>
</html>