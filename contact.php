<?php
// If the form is submitted
if(isset($_POST['submit'])) {

	//Check to make sure that the name field is not empty
	if(trim($_POST['contactname']) == '') {
		$hasError = true;
	} else {
		$name = trim($_POST['contactname']);
	}

	//Check to make sure that the subject field is not empty
	// if(trim($_POST['subject']) == '') {
	// 	$hasError = true;
	// } else {
	// 	$subject = trim($_POST['subject']);
	// }

	// Check to make sure sure that a valid email address is submitted
	if(trim($_POST['email']) == '')  {
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	// Check to make sure comments were entered
	if(trim($_POST['message']) == '') {
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['message']));
		} else {
			$comments = trim($_POST['message']);
		}
	}

	// If there is no error, send the email
	if(!isset($hasError)) {
		$emailTo = 'jm@juliamortimer.co.uk';
		$subject = 'ELTW enquiry';
		$body = "Name: $name \n\nEmail: $email \n\nSubject: $subject \n\nComments:\n $comments";
		$headers = 'From: ELTW <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}
}
?>

<!-- *************************************************************************** -->

<!DOCTYPE html lang="en">

<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->

<head>
	<meta charset="utf-8" />

	<title>Contact - Julia Mortimer - English Language Services Worldwide</title>

	<!-- Metadata -->
	<meta name="author" content="Julia Mortimer" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/main.css" />

	<!-- Scripts -->
  <script type="text/javascript" src="js/modernizr.js"></script>
  <!--[if lt IE 9]>
	<script src="js/html5.js"></script>
	<![endif]-->

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#enquiry-form").validate();
		});
	</script>
</head>

<body>
<div id="page">

<header role="banner">
	<h1>Julia Mortimer</h1>
	<h2>English Language Services Worldwide</h2>
</header>

<nav role="navigation">
	<ul>
		<li><a href="index.html">Home</a></li>
		<li><a href="publication.html">Publication</a></li>
		<li><a href="training.html">Training</a></li>
		<li><a href="usp2013.html">São Paulo, 2013</a></li>
		<li><a href="contact.php">Contact details</a></li>
	</ul>
</nav>

<section id="main-content" role="main">
	<article id="introduction">

		<?php if(isset($hasError)) { //If errors are found ?>
			<div class="form-feedback">
				<p class="error">Please check if you've filled all the fields with valid information. Thank you.</p>
			</div>
		<?php } ?>

		<?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
			<div class="form-feedback">
				<p>Thank you <strong><?php echo $name;?></strong> for your interest. Your enquiry has been sent and I will be in touch with you soon by email.</p>
			</div>
		<?php } ?>

		<h3>Contact details</h3>
		<p>Please use this form to contact me. I will reply as soon as I can.</p>



		<form id="enquiry-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

			<div class="text">
		    <label for="name">Your name</label>
				<input type="text" name="contactname" id="contactname" value="" class="required" />
			</div>

			<div class="text">
				<label for="email">Email address</label>
				<input type="text" name="email" id="email" value="" class="required email" />
			</div>

			<!--
			<div class="text">
				<label for="subject">Subject</label>
				<input type="text" name="subject" id="subject" value="" class="required" />
			</div>
			-->

			<div class="textarea">
				<label for="message">Your enquiry</label>
				<textarea name="message" id="message" class="required"></textarea>
			</div>

			<div class="button">
				<input type="submit" value="Send" name="submit" />
			</div>
		</form>
	</article>
</section>


<footer role="contentinfo">
	<address>&copy; 2011, Julia Mortimer, English Language Services Worldwide, 3a Cantelowes Road, London NW1 9XH</address>
</footer>

</div>
</body>
</html>
