<?php

require_once("lib.php");
session_start();
$profile = fetchProfile($_SESSION['id']);
$educ = fetchEduc($_SESSION['id']);

?>

<html>
<head>
	<title></title>
	<link rel='stylesheet' type='text/css' href='font-awesome-4.7.0\css\font-awesome.min.css'>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<script type='text/javascript' src='js/jquery-3.1.1.js'></script>
<script type="text/javascript">

function changeTab(tab)
{
	if (tab === "other") 
	{	
		$('#educ-btn').removeClass('active');
		$('#sem-btn').removeClass('active');
		$('#other-btn').removeClass('active');
		$('#other-btn').addClass('active');
	}
	else if (tab === "sem")
	{
		$('#educ-btn').removeClass('active');
		$('#other-btn').removeClass('active');
		$('#sem-btn').removeClass('active');
		$('#sem-btn').addClass('active');
	}
	else if (tab === "educ")
	{
		$('#educ-btn').removeClass('active');
		$('#other-btn').removeClass('active');
		$('#sem-btn').removeClass('active');
		$('#educ-btn').addClass('active');
	}
}

</script>
<body>
	<div class='profile-header'>
		<ul>
			<li><a href="">Home</a></li>
			<li><a href="">Dashboard</a></li>
			<li><a href="">About Us</a></li>
			<li><a href="">Logout</a></li>
		</ul>
	</div>
	<div class='profile-body'>
		<div class='profile-wrapper'>
			<p>Profile</p>
			<div class='profile-left'>
				<img src="img/resume.jpg">
				<p><?php echo $profile['fname'] . " " . $profile['lname']; ?></p>
				<p><?php echo $profile['type']; ?></p>
				<div>
					<p><?php echo $profile['cp_no'] ?></p>
					<p><?php echo $profile['email'] ?></p>
					<p><?php echo $profile['address'] ?></p>
				</div>
			</div>
			<div class='profile-right'>
				<div class='profile-tabs'>
					<button id='educ-btn' onclick='changeTab("educ")' class='active'>Educational Attainment</button>
					<button id='other-btn' onclick='changeTab("other")'>Other Information</button>
					<button id='sem-btn' onclick='changeTab("sem")'>Seminars Attended</button>
				</div>
				<div class='profile-right-body'>
					<div class='educ-body'>
							
					</div>
					<div class='other-body'>
						<span>Religion: </span><label><?php echo $profile['religion'] ?></label><br>
						<span>Designation: </span><label><?php echo $profile['designation'] ?></label><br>
						<span>Office Address: </span><label><?php echo $profile['office_add'] ?></label><br>
						<span>Engagement in GAD: </span><label><?php echo $profile['engage_from'] . " to " . $profile['engage_to'] ?></label><br>
						<span>Willing to travel: </span><label><?php echo $profile['will_travel'] == 1 ? "Yes" : "No" ?></label><br>
					</div>
					<div class='sem-body'>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>