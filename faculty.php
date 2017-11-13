<?php

require_once("dashboard_panel.php");
require_once("lib.php");

$colleges = fetchAllCollege();
$departments = fetchAllDepartment();
$SDs = fetchSDFaculty();


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
		var add = document.getElementById("disaggregation-add-body");
		var view = document.getElementById("disaggregation-view-body");
		add.style.display = "block";
		view.style.display = "none";
		$("#addtab").addClass("active-tab").removeClass("inactive-tab");
		$("#viewtab").removeClass("active-tab").addClass("inactive-tab");


	}
	else if (val === "View All"){
		var add = document.getElementById("disaggregation-add-body");
		var view = document.getElementById("disaggregation-view-body");
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

function fetchProgram(id)
{
	$.ajax({
		type: 'post',
		url: 'lib.php',
		data: {
			fetch_prog:id
			},
		success: function (response) 
		{
			document.getElementById("prog_select").innerHTML=response; 
		}

		});
}

function fetchPos(type)
{

	$.ajax({
		type: 'post',
		url: 'lib.php',
		data: {
			fetch_pos:type
			},
		success: function (response) 
		{
			document.getElementById("pos_select").innerHTML=response; 
		}

		});
}

function isNumber(evt) {

    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}


function success_hide()
{
	$('#success-box').css("visibility","hidden");
}

function checkForm()
{
	var counter = 0;
	var errorcount = 0;
	var inputerrors = [];
	var data = [];

	$(".sd-data-error").css("visibility" , "hidden");
	$(".sd-data-error").css("max-height" , "0px");

	$(".req").each(function(){

		data.push($(this).val());

		if ($(this).val() === "" || $(this).val() === "none") 
		{
			$(this).addClass("error-input");
			inputerrors.push(counter);
		}
		else
		{
			$(this).removeClass("error-input");
		}

		counter++;
	
	});

	errorcount = inputerrors.length;

	counter = 0;
	
	$(".sex-error").css("visibility", "hidden");
	$(".sex-error").css("max-height", "0px");	

	$(".sex-error").each(function(){

		for(x = 0; x <= errorcount - 1; x++)
		{
			if (counter == inputerrors[x]) {

				$(this).css("visibility" , "visible");
				$(this).css("max-height" , "200px");

			}
		}

		counter++;
	
	});

	if (errorcount == 0) 
	{
		$.ajax({
			type: 'post',
			url: 'lib.php',
			data: {functionName: 'addSDFaculty', args: data},
			success: function (response) 
			{
				if (response == 0)
				{
					window.location = "faculty.php";
				}
				else
				{
					$(".sd-data-error").css("visibility" , "visible");
					$(".sd-data-error").css("max-height" , "200px");
				}
			}

		});
	}


	// var formarray = [college, department, program, male_q, female_q, semester, schoolyear];
	// var inputerrors = [];
	// var errorcount = 0;
	// var counter = 0;


	// for(x = 0; x <= 6; x++)
	// {
	// 	if (formarray[x] === "" || formarray[x] === "none") 
	// 	{
	// 		inputerrors.push(x);
	// 	}
	// }

	// errorcount = inputerrors.length;

	// $(".req").each(function(){

	// 	$(this).val(formarray[counter]);


	// 	for (x = 0; x <= errorcount - 1; x++)
	// 	{
	// 		if (counter == inputerrors[x]) {

	// 			$(this).addClass("error-input");

	// 		}
	// 	}

	// 	counter++;
	// });

	// counter = 0;

	// $(".sex-error").each(function(){


	// 	for (x = 0; x <= errorcount - 1; x++)
	// 	{
	// 		if (counter == inputerrors[x]) {

	// 			$(this).css("visibility" , "visible");
	// 			$(this).css("max-height" , "200px");

	// 		}
	// 	}

	// 	counter++;
	// });

}


</script>

<body>
	<div class="wrapper">
		<?php getActive("ac","in","in","in","in","in"); ?>
		<?php require_once("dashboard_header.php"); ?>
		<div class="content">
			<div class="content-header">Faculty</div>
			<?php if (!empty($_SESSION['added_SD'])): 

				$pos = fetchPos($_SESSION['added_SD'][0]);

			?>

				<script type="text/javascript">

				$(document).ready(function(){

					$("#disaggregation-view-body").css("display", "block");
					$("#disaggregation-add-body").css("display", "none");
					$("#viewtab").addClass("active-tab").removeClass("inactive-tab");
					$("#addtab").removeClass("active-tab").addClass("inactive-tab");

				});

				</script>
				<div id="success-box" class="success-box-acc"><span class='fa fa-times-circle success-close' 
					onclick='success_hide()'></span><?php echo $pos['name'] . " of " . $_SESSION['added_SD'][1] . " year " . $_SESSION['added_SD'][2]; ?> has been successfully added.</div>

				<?php $_SESSION['added_SD'] = null ?>
			<?php endif ?>
			<div class="content-tab">
				<input id="addtab" onclick="tabs(this.value, this.id)" class="active-tab" type="submit" value="Add">
				<input id="viewtab" onclick="tabs(this.value, this.id)" class="inactive-tab" type="submit" value="View All">
			</div>
			<div id='disaggregation-add-body' class="content-body">
				<p>Add Disaggregation Data</p>
				<div class="content-line"></div>
				<form class="college-form" method="post">
					<div class="sd-data-error">This entry of the chosen semester and school year already exist.</div>
					<label>Select College*</label>
					<select name="college" class="disaggregation-input-text req" onchange="fetchDepartment(this.value)">
						<option value="none">Select College</option>
						<?php foreach ($colleges as $college): ?>
							<option value="<?php echo $college['id'] ?>"><?php echo $college['name'] . " [" . $college['alias'] . "] " ?></option>
						<?php endforeach ?>
					</select>
					<div class="sex-error">This field is required. </div>
					<label>Department*</label>
					<select name="department" id="dep_select" name="dep_id" class="disaggregation-input-text req" onchange="fetchPos('faculty')">
						<option value="none" >Select College First</option>
					</select>
					<div class="sex-error">This field is required. </div>
					<label>Position*</label>
					<select name="program" id="pos_select" name="prog_id" class="disaggregation-input-text req">
						<option value="none" >Select Department First</option>
					</select>
					<div class="sex-error">This field is required. </div>
					<div class="sex-col">
						<label>Male*</label>
						<input name="male_q" type="text" onkeypress="return isNumber(event)" class="disaggregation-input-text req">
						<div class="sex-error">This field is required. </div>
					</div>
					<div class="sex-col">
						<label>Female*</label>
						<input name="female_q" type="text" onkeypress="return isNumber(event)" class="disaggregation-input-text req">
						<div class="sex-error">This field is required. </div>
					</div>
					<div class="sex-col">
						<label>Semester*</label>
						<select name="semester" class="disaggregation-input-text req">
							<option value="none">Select Semester</option>
							<option>1st Semester</option>
							<option>2nd Semester</option>
						</select>
						<div class="sex-error">This field is required. </div>
					</div>
					<div class="sex-col">
						<label>School Year*</label>
						<select name="schoolyear" class="disaggregation-input-text req">
							<option value="none">Select School Year</option>
						<?php for ($i=(int)date("Y"); $i > (int)date("Y") - 20 ; $i--): 
							$r = $i - 1;
						?>
							<option><?php echo $r . " - " . $i; ?></option>
						<?php endfor; ?>
						</select>
						<div class="sex-error">This field is required. </div>
					</div>
					<div class="content-line"></div>
					<div onclick="checkForm()" class="sex-submit-btn">Confirm</div><div onclick="reset()" class="sex-reset-btn">Reset</div>
				</form>


			</div>
			<div id='disaggregation-view-body' class="content-body">
				<p>View Disaggregation Data</p>
				<div class="content-line"></div>
				<table id='tbl' class='sd-table'>
					<tr>
						<th>Position</th>
						<th>Department</th>
						<th>Male</th>
						<th>Female</th>
						<th>Semester</th>
						<th>School Year</th>
						<th>Action</th>
					</tr>
					<?php $x=0; 
					foreach ($SDs as $SD): ?>
					<tr>
					<?php if ($x%2 == 0): ?>
						<td class="row-2"><?php echo $SD['position'] ?></td>
						<td class="row-2"><?php echo $SD['department'] ?></td>					
						<td class="row-2"><?php echo $SD['male_q'] ?></td>
						<td class="row-2"><?php echo $SD['female_q'] ?></td>
						<td class="row-2"><?php echo $SD['semester'] ?></td>
						<td class="row-2"><?php echo $SD['schoolyear'] ?></td>
						<td class="row-2">Edit / Delete</td>
					<?php else: ?>
						<td><?php echo $SD['position'] ?></td>
						<td><?php echo $SD['department'] ?></td>					
						<td><?php echo $SD['male_q'] ?></td>
						<td><?php echo $SD['female_q'] ?></td>
						<td><?php echo $SD['semester'] ?></td>
						<td><?php echo $SD['schoolyear'] ?></td>
						<td>Edit / Delete</td>
					<?php endif; ?>
					</tr>
					<?php $x++; endforeach; ?>
				</table>
			</div>
		</div>
		
	</div>

	

	</body>
</html>