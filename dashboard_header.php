<?php
require_once("lib.php");

$profile = fetchProfile($_SESSION['id']);


echo "<script type='text/javascript' src='js/jquery-3.1.1.js'></script>
	<script type='text/javascript'>
		$(document).ready(function(){

			$('#dropdown-header').click(function(){

				if ($('.dropdown-header-content').hasClass('hidden')) {

					$('#dropdown-header').removeClass('dropdown-focused');
					$('#dropdown-header').addClass('dropdown-focused');
					$('.dropdown-header-content').removeClass('hidden');
				}
				else
				{
					$('#dropdown-header').removeClass('dropdown-focused');
					$('.dropdown-header-content').addClass('hidden');
				}
				


			});

			$('body').click(function(e) {

		        if ($(e.target).is('#dropdown-header, #dropdown-header *')) {
		            return;
		        }

		        else
		        {
		        	$('#dropdown-header').removeClass('dropdown-focused');
		        	$('.dropdown-header-content').removeClass('hidden');
		        	$('.dropdown-header-content').addClass('hidden');
		        }

		    });


		});
		


		


	</script>";


echo "<div class='header'>
<span id='toggle' class='fa fa-bars fa-2x header-bar'></span>
	<div id='dropdown-header' class='dropdown-header'>
		<img src='img/resume.jpg' width='40'>
		<div class='dropdown-header-name'>" . $profile['fname'] . "</div>
		<span class='fa fa-chevron-down'></span>
		<div class='dropdown-header-content hidden'>
			<a href='home.php'>Home</a>
			<a href='profile.php'>Profile</a>
			<a href='logout.php'>Log Out<p class='fa fa-sign-out'></p></a>
		</div>
	</div>
</div>";

?>


	
