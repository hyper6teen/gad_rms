<?php

require_once("lib.php");


session_start();

session_destroy();

?>

<html>
<head>
	<title></title>
	<link rel='stylesheet' type='text/css' href='w3.css'>
	<link rel='stylesheet' type='text/css' href='style.css'>
	<link rel='stylesheet' type='text/css' href='font-awesome-4.7.0\css\font-awesome.min.css'>
	<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalable: 0" />
</head>
	<body>
		<div class="mySlides w3-animate-fading img1"></div>
		<div class="mySlides w3-animate-fading img2"></div>
		<div class="mySlides w3-animate-fading img3"></div>
		<div class="mySlides w3-animate-fading img4"></div>
		<div class="overlay">
			<div class="logo">
				<img src="img/logo.png">
				<div class="log-line"></div>
				<img src="img/gender.png">
			</div>
			<p class="college-login">CAVITE STATE UNIVERSITY</p>
			<p class="title-login">Gender and Development Record Management System</p>
			<div class="login">
				<p>Sign In</p>
				<form action="" method="post">
					<input name="user" placeholder="Username.." type="text">
					<input name="pass" placeholder="Password.." type="password">
					<?php
					if (isset($_POST['submit'])) {
						if (authenticate($_POST['user'], $_POST['pass']) == "0") {
							echo "<label class='error'>Wrong Username/Password. Try again.</label>";		
						}
						else
						{
							if ($_SESSION['status'] == "new") {
								header("Location: wizard.php");
							}
							elseif ($_SESSION['status'] == "active"){
								header("Location: creacc.php");
							}
						}
					}
					?>
					
					<input type="submit" name="submit" value="SIGN IN">
				</form>
				
			</div>
			<div class="log-forgot">
				<a href="">Forgot Password?</a>
			</div>
			<div class="log-footer">
				<p>Copyright CvSU 2016. All rights reserved.</p>
				<p>[Cavite State University | Indang, Cavite, Philippines]</p>
				</div>
		</div>
		

		<script>
			var myIndex = 0;
			carousel();

			function carousel() {
			    var i;
			    var x = document.getElementsByClassName("mySlides");
			    for (i = 0; i < x.length; i++) {
			      x[i].style.display = "none";
			    }
			    myIndex++;
			    if (myIndex > x.length) {myIndex = 1}
			    x[myIndex-1].style.display = "block";
			    setTimeout(carousel, 8000);
			}
		</script>
	</body>
</html>