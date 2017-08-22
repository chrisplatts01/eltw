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
	<!--
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript" src="js/galleria/galleria-1.2.9.min.js"></script>
	-->
  <script type="text/javascript" src="js/modernizr.js"></script>

  <!--[if lt IE 9]>
	<script src="js/html5.js"></script>
	<![endif]-->
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
<?php

	$errors = "";
	foreach ( $_POST as $key=>$value ) {
		if ( empty($value) ) {
			$errors .= "<li><strong>$key</strong> is required.</li>";
		}
	}

	if ( empty($errors)) {

		echo "<p>Thank you, we will be in contact soon. The following information was sent to us:</p>\n";

		echo "<ul>\n";
		foreach ( $_POST as $key=>$value ) {
			echo "<li><strong>$key:</strong> $value</li>";
		}
		echo "</ul>\n";
		echo '<p>Return to our <strong><a href="index.html">home page</a></strong></p>';

		$name = $_POST['Name*'];
		$email_address = $_POST['Email*'];

		// ini_set("sendmail_from", "jmm@juliamortimer.co.uk");

		$to = "jmm@juliamortimer.co.uk";
		$email_subject = "English Language Services Worldwide contact enquiry";

		$email_body = "CONTACT FORM\n\nYou have received an enquiry.\nThe details are:\n\n";

		$email_body .= "----------------------------------------\n";
		foreach ( $_POST as $key=>$value ) {
			$email_body .= "$key = $value\n\n";
		}
		$email_body .= "----------------------------------------\n";

		$headers  = "From: jmm@juliamortimer.co.uk\n";
		$headers .= "Reply-To: $email_address\n";

		mail($to,$email_subject,$email_body,$headers);
		// mail($to,$email_subject,$email_body,$headers, "-fjmm@juliamortimer.co.uk");

	} else {

		echo "<p>Sorry the following errors were found:</p>";
		echo "<ul>$errors</ul>";
		echo "<p>Please <a href=\"index.html\" onclick=\"history.go(-1);return false;\">go back</a> and enter the correct values.</p>";

	}
?>
</section>

</body>
</html>
