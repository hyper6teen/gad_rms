<?php

require_once("dashboard_panel.php");
require_once("lib.php");

$colleges = fetchAllCollege();
$archives = fetchArchivedCollege();
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

function tabs(val, id)
{
	if (val === "Add") {
		var add = document.getElementById("college-add-body");
		var view = document.getElementById("college-view-body");
		var arch = document.getElementById("college-archive-body");
		add.style.display = "block";
		view.style.display = "none";
		arch.style.display = "none";
		$("#addtab").addClass("active-tab").removeClass("inactive-tab");
		$("#viewtab").removeClass("active-tab").addClass("inactive-tab");
		$("#archivetab").removeClass("active-tab").addClass("inactive-tab");


	}
	else if (val === "View All"){
		var add = document.getElementById("college-add-body");
		var view = document.getElementById("college-view-body");
		var arch = document.getElementById("college-archive-body");
		view.style.display = "block";
		add.style.display = "none";
		arch.style.display = "none";
		$("#viewtab").addClass("active-tab").removeClass("inactive-tab");
		$("#addtab").removeClass("active-tab").addClass("inactive-tab");
		$("#archivetab").removeClass("active-tab").addClass("inactive-tab");
	}
	else if (val === "Archive"){
		var add = document.getElementById("college-add-body");
		var view = document.getElementById("college-view-body");
		var arch = document.getElementById("college-archive-body");
		arch.style.display = "block";
		view.style.display = "none";
		add.style.display = "none";
		$("#archivetab").addClass("active-tab").removeClass("inactive-tab");
		$("#addtab").removeClass("active-tab").addClass("inactive-tab");
		$("#viewtab").removeClass("active-tab").addClass("inactive-tab");
	}
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
			<div class="content-header">College</div>
			<div class="content-tab">
				<input id="addtab" onclick="tabs(this.value, this.id)" class="active-tab" type="submit" value="Add">
				<input id="viewtab" onclick="tabs(this.value, this.id)" class="inactive-tab" type="submit" value="View All">
				<input id="archivetab" onclick="tabs(this.value, this.id)" class="inactive-tab" type="submit" value="Archive">
			</div>
			<div id='college-add-body' class="content-body">
				<p>Add College</p>
				<div class="content-line"></div>
				
				<form method="post" class="college-form">
					<label>College*</label><br>
					<input type="text" name="department" class="college-form-name"><br>
					<div id="dep-error" class="error"></div>
					<label>Alias*</label><br>
					<input type="text" name="alias" class="college-form-al"><br>
					<div id="al-error" class="error"></div>
					<label>College*</label>
					<select name="college_id" class="college-form-sel">
						<option value="none" >Select Category</option>
						<option value="Main" >Main</option>
						<option value="Satellite">Satellite</option>
					</select>
					<div id="sel-error" class="error"></div>
					<div class="content-line"></div>
					<input type="submit" value="Create" name="submit">
				</form>
				<script type="text/javascript">

				function checkForm(dep, al, col)
				{
					var errmsg = "";
					

					
					if (dep.length < 5) 
					{
						errmsg = "College must be atleast 5 characters.";

						if (dep === "") {
							errmsg = "This field is required.";
						}
						document.getElementById("dep-error").innerHTML=errmsg;
						$(".college-form-name").addClass("error-input");
						
					}
					if (al.length < 2) 
					{
						errmsg = "Alias must be atleast 2 characters.";

						if (al === "") {
							errmsg = "This field is required.";
						}
						document.getElementById("al-error").innerHTML=errmsg;
						$(".college-form-al").addClass("error-input");
						
					}
					if (col === "none") 
					{
						errmsg = "Please select a Category";

						document.getElementById("sel-error").innerHTML=errmsg;
						$(".college-form-sel").addClass("error-input");
						
					}

					if (dep.length > 4 && al.length > 1 && col != "Select Category") {
						
						

						$.ajax({
					   	type: 'post',
						url: 'lib.php',
					   	data: {functionName: 'addCollege', args: [dep,al,col]},
						success: function(response) 
						{
							
							
						    if (response === "1") 
						    {
						    	
						    	errmsg = "This College Name already exists."
						    	document.getElementById("dep-error").innerHTML=errmsg;
								$(".college-form-name").addClass("error-input");
						    }
						    else if (response === "0")
						    {

						    	window.location = "dcollege.php";

						    }

						}

						});
					};
					
					
					$(".college-form-name").val(dep);
					$(".college-form-al").val(al);
					$('.college-form-sel option[value='.concat(col).concat(']')).attr('selected','selected');
				}

				


				</script>

				<?php if (isset($_POST['submit'])) {
					echo "<script>checkForm('" . $_POST['department'] . "','" . 
						$_POST['alias'] . "','" . $_POST['college_id'] . "')</script>";
				}
				?>
			</div>
			<input id="search-categ" type="hidden" value="college">	
			<div id='college-view-body' class="content-body">
				<p>View All Colleges</p>
				<div class="content-line"></div>
				<?php if (!empty($_SESSION['added_col'])): 

				?>

					<script type="text/javascript">

					$(document).ready(function(){

						$("#college-add-body").css("display", "none");
						$("#college-view-body").css("display", "block");
						$("#viewtab").addClass("active-tab").removeClass("inactive-tab");
						$("#addtab").removeClass("active-tab").addClass("inactive-tab");

					});

					</script>
					<div id="success-box" class="success-box-acc"><span class='fa fa-times-circle success-close' 
						onclick='success_hide()'></span><?php echo $_SESSION['added_col']; ?> has been successfully added.</div>

					<?php $_SESSION['added_col'] = null ?>
				<?php endif ?>
				<table id='tbl' class='content-table'>
					<tr>
						<th>College [Alias]</th>
						<th>Category</th>
						<th>Created / Updated</th>
						<th>Action</th>
					</tr>
					<?php $x=0; 
					foreach ($colleges as $college): ?>
					<tr>
					<?php if ($x%2 == 0): ?>
						<td class="row-2"><?php echo $college["name"] . " " . "[" . $college["alias"] . "]"; ?></td>
						<td class="row-2"><?php echo $college["category"]; ?></td>
						<td class="row-2"><?php echo $college["date"]; ?></td>
						<td class="row-2">
							<input class="tbl-edit" type="submit" value="Edit">
							<input class="tbl-del" type="submit" value="Archive">
						</td>
					<?php else: ?>
						<td><?php echo $college["name"] . " " . "[" . $college["alias"] . "]"; ?></td>
						<td><?php echo $college["category"]; ?></td>
						<td><?php echo $college["date"]; ?></td>
						<td>
							<input class="tbl-edit" type="submit" value="Edit">
							<input class="tbl-del" type="submit" value="Archive">
						</td>
					<?php endif; ?>
					</tr>
					<?php $x++; endforeach; ?>
				</table>
			</div>
			
			<div id='college-archive-body' class="content-body">
				<p>Archived Colleges</p>
				<div class="content-line"></div>
				

				<table id='tbl' class='content-table'>
					<tr>
						<th>College [Alias]</th>
						<th>Category</th>
						<th>Created / Updated</th>
						<th>Action</th>
					</tr>
					<?php $x=0; 
					foreach ($archives as $archive): ?>
					<tr>
					<?php if ($x%2 == 0): ?>
						<td class="row-2"><?php echo $archive["name"] . " " . "[" . $archive["alias"] . "]"; ?></td>
						<td class="row-2"><?php echo $archive["category"]; ?></td>
						<td class="row-2"><?php echo $archive["date"]; ?></td>
						<td class="row-2">
							<input class="tbl-edit" type="submit" value="Retrieve">
							<input class="tbl-del" type="submit" value="Delete">
						</td>
					<?php else: ?>
						<td><?php echo $archive["name"] . " " . "[" . $archive["alias"] . "]"; ?></td>
						<td><?php echo $archive["category"]; ?></td>
						<td><?php echo $archive["date"]; ?></td>
						<td>
							<input class="tbl-edit" type="submit" value="Retrieve">
							<input class="tbl-del" type="submit" value="Delete">
						</td>
					<?php endif; ?>
					</tr>
					<?php $x++; endforeach; ?>
				</table>
			</div>
		</div>
		
	</div>

	

	</body>
</html>