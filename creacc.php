<?php

require_once("dashboard_panel.php");
require_once("lib.php");

$colleges = fetchAllCollege();
$departments = fetchAllDepartment()


?>

<html>
<head>
	<title></title>
	<link rel='stylesheet' type='text/css' href='style.css'>
	<link rel="stylesheet" type="text/css" href="animate.css">
	<link rel='stylesheet' type='text/css' href='font-awesome-4.7.0\css\font-awesome.min.css'>
	<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalable: 0" />
</head>
<script type='text/javascript' src='js/jquery-3.1.1.js'></script>
<script type="text/javascript">



function reset()
{
	$(".account-form-id").val("");
	$(".account-form-user").val("");
	$(".account-form-pass").val("");
}



function isNumber(evt) {

    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function checkForm(id, type, user, pass)
{

	var errmsg;
	var user_valid = "false";

	if (id.length < 9) {

		errmsg = "Invalid ID.";
		if (id === "") {

			errmsg = "This field is required."
		}
		document.getElementById("id-error").innerHTML=errmsg;
	}
    if(user.length < 4 || user.length > 16)
    {
    	errmsg = "Username must be 4-16 characters.";
    	if (user === "") {
    		errmsg = "This field is required.";
    	}
    	document.getElementById("user-error").innerHTML=errmsg;   
    }

    if (type === "none") {

    	errmsg = "Please choose account type."
    	document.getElementById("sel-error").innerHTML=errmsg;
    }

    if (pass === "") {

    	errmsg = "This field is required.";
    	document.getElementById("pass-error").innerHTML=errmsg;
    
    }
    else if (user === pass) {

    	errmsg = "Password cannot be same with the username.";
    	document.getElementById("pass-error").innerHTML=errmsg;

    }
    if (id.length > 8 && (user.length > 4 || user.length < 16) && user != pass && pass.length > 0 && type != "none") {

    	
    	$.ajax({

    		type: 'post',
    		url: 'lib.php',
    		data: {functionName: 'addAccount', args: [id, user, pass, type]},
    		success: function(response)
    		{
    			var cond = response.split(",");
    			console.log(response)
    			
    			if (cond[0] === "1") {

    				errmsg = "ID is already used.";
    				document.getElementById("id-error").innerHTML=errmsg;
    			}
    			if (cond[1] === "1") {
    				errmsg = "Username is already used.";
    				document.getElementById("user-error").innerHTML=errmsg;
    			}
    			if (cond[0] === "0" && cond[1] === "0") {

    				window.location = "viewacc.php";

    			}
    		}

    	});

    }


    $(".account-form-id").val(id);
	$(".account-form-user").val(user);
	$('.account-form-sel option[value='.concat(type).concat(']')).attr('selected','selected');

}
			

</script>

<body>
	<div class="wrapper">
		<?php getActive("ac","in","in","in","in","in"); ?>
		<?php require_once("dashboard_header.php"); ?>
		<div class="content">
			<div class="content-header">Add Account</div>
			<div class="content-body">
				<p>Account Information</p>
				<div class="content-line"></div>
				<form id ="acc_form" method="post">
					<div class="account-form">
						<label>Staff ID*</label>
						<input name="id" type="text" class="account-form-id" onkeypress="return isNumber(event)" maxlength="9">
						<div id="id-error" class="error"></div>
						<label>Account Type*</label>
						<select name="type" class="account-form-sel">
							<option value="none">Select Type</option>
							<option value="admin">Administrator</option>
							<option value="coordinator">Coordinator</option>
						</select>
						<div id="sel-error" class="error"></div>
						<label>Username*</label>
						<input name="user" type="text" class="account-form-user">
						<div id="user-error" class="error"></div>
						<label>Password*</label>
						<input name="pass" type="password" class="account-form-pass">
						<div id="pass-error" class="error"></div>
					</div>
					<div class="content-line"></div>
					<div class="account-form">
						<input type="submit" value="Create" name="submit"><div onclick="reset()" class="reset-btn">Reset</div>
					</div>
					
				</form>
				
					<?php if (isset($_POST['submit'])) {
						echo "<script>checkForm('" . $_POST['id'] . "','" . $_POST['type'] . "','" . $_POST['user'] . "','" . $_POST['pass'] . "')</script>";
					} ?>
			</div>
		</div>
		
	</div>

	

	</body>
</html>