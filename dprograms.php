<?php

require_once("dashboard_panel.php");
require_once("lib.php");

$colleges = fetchAllCollege();
$departments = fetchAllDepartment();
$programs = fetchAllProgram();


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
		add.style.display = "block";
		view.style.display = "none";
		$("#addtab").addClass("active-tab").removeClass("inactive-tab");
		$("#viewtab").removeClass("active-tab").addClass("inactive-tab");


	}
	else if (val === "View All"){
		var add = document.getElementById("college-add-body");
		var view = document.getElementById("college-view-body");
		view.style.display = "block";
		add.style.display = "none";
		$("#viewtab").addClass("active-tab").removeClass("inactive-tab");
		$("#addtab").removeClass("active-tab").addClass("inactive-tab");
	}
}

function fetchDepartment(id)
{
	
	$.ajax({
		type: 'post',
		url: 'lib.php',
		data: {
			fetch_dep:id
			},
		success: function (response) 
		{
			document.getElementById("dep_select").innerHTML=response; 
		}

		});
}

$(function(){

	var id = $("#col_select").val();

	$.ajax({
		type: 'post',
		url: 'lib.php',
		data: {
			fetch_dep:id
			},
		success: function (response) 
		{
			document.getElementById("dep_select").innerHTML=response; 
		}

		});


});

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
			<div class="content-header">Programs</div>
			<div class="content-tab">
				<input id="addtab" onclick="tabs(this.value, this.id)" class="active-tab" type="submit" value="Add">
				<input id="viewtab" onclick="tabs(this.value, this.id)" class="inactive-tab" type="submit" value="View All">
			</div>
			<input id="validity" type="hidden" value="0">
			<div id='college-add-body' class="content-body">
				<p>Add Program</p>
				<div class="content-line"></div>
				
				<form method="post" class="college-form">
					<label>Program*</label><br>
					<input type="text" name="department" class="college-form-name"><br>
					<div id="prog-error" class="error"></div>
					<label>Alias*</label><br>
					<input type="text" name="alias" class="college-form-al"><br>
					<div id="al-error" class="error"></div>
					<label>College*</label>
					<select id="col_select" name="col_id" class="college-form-sel" onchange="fetchDepartment(this.value)">
						<option value="none" >Select College</option>
						<?php foreach ($colleges as $college): ?>
						<option value="<?php echo $college['id'] ?>"><?php echo $college['name']; ?></option>
						<?php endforeach ?>
					</select>
					<div id="col-error" class="error"></div>
					<label>Department*</label>
					<select id="dep_select" name="dep_id" class="dep-form-sel">
						<option value="none" >Select College</option>
					</select>
					<div id="dep-error" class="error"></div>
					<div class="content-line"></div>
					<input type="submit" value="Create" name="submit">
				</form>
				<script type="text/javascript">

				function checkForm(prog, al, col, dep)
				{
					var errmsg = "";
					
					if (prog.length < 5) 
					{
						errmsg = "Department must be atleast 5 characters.";

						if (prog === "") {
							errmsg = "This field is required.";
						}
						document.getElementById("prog-error").innerHTML=errmsg;
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
						errmsg = "Please select a College";

						document.getElementById("col-error").innerHTML=errmsg;
						$(".college-form-sel").addClass("error-input");
						
					}

					if (dep === "none") 
					{
						errmsg = "Please select a Department";
						document.getElementById("dep-error").innerHTML=errmsg;
						$(".dep-form-sel").addClass("error-input");
						
					}

					if (prog.length > 4 && al.length > 1 && dep != "none") {
						
						

						$.ajax({
					   	type: 'post',
						url: 'lib.php',
					   	data: {functionName: 'addProgram', args: [prog,al,dep]},
						success: function(response) 
						{
							
							
						    if (response === "1") 
						    {
						    	
						    	errmsg = "This Program Name already exists."
						    	document.getElementById("prog-error").innerHTML=errmsg;
								$(".college-form-name").addClass("error-input");
						    }
						    else if (response === "0")
						    {

						    	window.location = "dprograms.php";

						    }

						}

						});
					};
					
					
					$(".college-form-name").val(prog);
					$(".college-form-al").val(al);
					$('.college-form-sel option[value='.concat(col).concat(']')).attr('selected','selected');
					
				}

				


				</script>

				<?php if (isset($_POST['submit'])) {
					echo "<script>checkForm('" . $_POST['department'] . "','" . 
						$_POST['alias'] . "','" . $_POST['col_id'] . "','" . $_POST['dep_id'] . "')
						</script>";
				}
				?>
			</div>
			<input id="search-categ" type="hidden" value="college">	
			<div id='college-view-body' class="content-body">
				<p>View All Programs</p>
				<div class="content-line"></div>
				<?php if (!empty($_SESSION['added_prog'])): 

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
						onclick='success_hide()'></span><?php echo $_SESSION['added_prog']; ?> has been successfully added.</div>

					<?php $_SESSION['added_prog'] = null ?>
				<?php endif ?>
				<table id='tbl' class='content-table'>
					<tr>
						<th>Program [Alias]</th>
						<th>Department</th>
						<th>Created / Updated</th>
						<th>Action</th>
					</tr>
					<?php $x=0; 
					foreach ($programs as $program): ?>
					<tr>
					<?php if ($x%2 == 0): ?>
						<td class="row-2"><?php echo $program["name"] . " " . "[" . $program["alias"] . "]"; ?></td>
						<td class="row-2"><?php echo $program["department"]; ?></td>
						<td class="row-2"><?php echo $program["date"]; ?></td>
						<td class="row-2">
							<input class="tbl-edit" type="submit" value="Edit">
							<input class="tbl-del" type="submit" value="Delete">
						</td>
					<?php else: ?>
						<td><?php echo $program["name"] . " " . "[" . $program["alias"] . "]"; ?></td>
						<td><?php echo $program["department"]; ?></td>
						<td><?php echo $program["date"]; ?></td>
						<td>
							<input class="tbl-edit" type="submit" value="Edit">
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