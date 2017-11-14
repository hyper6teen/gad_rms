<?php

require_once("dashboard_panel.php");
require_once("lib.php");

$colleges = fetchAllCollege();
$departments = fetchAllDepartment();
$accounts = fetchAllAccount();


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

function show(id)
{
	document.getElementById(id).innerHTML = id;
}


function success_hide()
{
	$('#success-box').css("visibility","hidden");
}


</script>

<body>
	<div class="wrapper">
		<?php getActive("ac","in","in","in","in","in"); ?>
		<?php require_once("dashboard_header.php"); ?>
		<div class="content">
			<div class="content-header">View Accounts</div>
			<?php if (!empty($_SESSION['added_id'])): ?>

				<div id="success-box" class="success-box-acc"><span class='fa fa-times-circle success-close' onclick='success_hide()'></span><?php echo $_SESSION['added_id']; ?> has been successfully added.</div>

				<?php $_SESSION['added_id'] = null ?>
			<?php endif ?>
			<div class="content-body">
				<p>Accounts Information</p>
				<div class="content-line"></div>
				<table class="content-table">
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Password</th>
						<th>Type</th>
						<th>Status</th>
					</tr>
					<?php $x=0; 
					foreach ($accounts as $account): ?>
					<tr>
					<?php if ($x%2 == 0): ?>
						<td class="row-2"><?php echo $account["id"]; ?></td>
						<td class="row-2"><?php echo $account["username"]; ?></td>
						<?php $pass = strlen($account['password']); ?>
						<td id="<?php echo $account['password'] ?>" onclick="show(this.id)" class="row-2"><?php for ($i=0; $i < $pass; $i++) { 
							echo "*";
						} ?></td>
						<td class="row-2"><?php echo $account['type']; ?></td>
						<td class="row-2"><?php echo $account['status']; ?></td>
					<?php else: ?>
						<td><?php echo $account["id"]; ?></td>
						<td><?php echo $account["username"]; ?></td>
						<?php $pass = strlen($account['password']); ?>
						<td id="<?php echo $account['password'] ?>" onclick="show(this.id)"><?php for ($i=0; $i < $pass; $i++) { 
							echo "*";
						} ?></td>
						<td><?php echo $account['type']; ?></td>
						<td><?php echo $account['status']; ?></td>
					<?php endif; ?>
					</tr>
					<?php $x++; endforeach; ?>
				</table>
			</div>
		</div>
		
	</div>

	

	</body>
</html>