<?php

require_once("dashboard_panel.php");
require_once("lib.php");

$colleges = fetchAllCollege();
$departments = fetchAllDepartment();
$SDstudents = fetchSDStudent();


if (isset($_POST['query'])) {
	
	if($_POST['query'] === 'delete')
	{
		deleteSDbyID($_POST['id'], $_POST['type']);
		
	}

}


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
			data: {functionName: 'addSDStudent', args: data},
			success: function (response) 
			{
				if (response == 0)
				{
					window.location = "student.php";
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

$(document).ready(function(){

	$('.prompt-body').click(function(e){

		if (e.target !== this)
		{
	    	return;
	    }

		$('.prompt-body').css('display', 'none');

	});
});

function hidePrompt()
{
	$('.prompt-body').css('display', 'none');
}


function showPrompt(type, id)
{

	var prompt_id = "#prompt".concat(id);

	$(prompt_id).css('display', 'block');

	if (type === "del") 
	{
		var box_id = "#delete-box".concat(id);
		$(box_id).css('display', 'block');
		$(box_id).css('width', '400px');
		$(box_id).css('height', '250px');
		$(box_id).css('margin-top', '150px');

	}
	else if (type === "edit")
	{

	}
}




</script>

<body>
	<div class="wrapper">
		<?php getActive("ac","in","in","in","in","in"); ?>
		<?php require_once("dashboard_header.php"); ?>
		<div class="content">
			<div class="content-header">Student</div>
			<?php if (!empty($_SESSION['added_SD'])): 

				$program = fetchProgram($_SESSION['added_SD'][0]);

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
					onclick='success_hide()'></span><?php echo $program['alias'] . " of " . $_SESSION['added_SD'][1] . " year " . $_SESSION['added_SD'][2]; ?> has been successfully added.</div>

				<?php $_SESSION['added_SD'] = null ?>
			<?php endif ?>

			<?php if (!empty($_SESSION['deletedSD'])): 

			?>

				<script type="text/javascript">

				$(document).ready(function(){

					var add = document.getElementById("disaggregation-add-body");
					var view = document.getElementById("disaggregation-view-body");
					view.style.display = "block";
					add.style.display = "none";
					$("#viewtab").addClass("active-tab").removeClass("inactive-tab");
					$("#addtab").removeClass("active-tab").addClass("inactive-tab");

				});

				</script>
				<div id="success-box" class="success-box-acc"><span class='fa fa-times-circle success-close' 
					onclick='success_hide()'></span><?php echo $_SESSION['deletedSD']['program'] . " of " . $_SESSION['deletedSD']['semester'] . " year " . $_SESSION['deletedSD']['year']; ?> has been successfully deleted.</div>

				<?php //$_SESSION['deletedSD'] = null; ?>
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
					<select name="department" id="dep_select" name="dep_id" class="disaggregation-input-text req" onchange="fetchProgram(this.value)">
						<option value="none" >Select College First</option>
					</select>
					<div class="sex-error">This field is required. </div>
					<label>Program*</label>
					<select name="program" id="prog_select" name="prog_id" class="disaggregation-input-text req">
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
						<th>Program [Alias]</th>
						<th>Department</th>
						<th>Male</th>
						<th>Female</th>
						<th>Semester</th>
						<th>School Year</th>
						<th>Action</th>
					</tr>
					<?php $x=0; 
					foreach ($SDstudents as $SDstudent): ?>
					<div id='prompt<?php echo $SDstudent["id"]; ?>' class='prompt-body'>
						<div id='delete-box<?php echo $SDstudent["id"]; ?>' class='prompt-box'>
							<p>Are you sure you want to delete?</p>
							<div class='content-line'>
							</div>
							<p><?php echo $SDstudent['department'] ?></p>
							<span><?php echo $SDstudent['program'] ?></span>
							<form method='post'>
								<input type='hidden' name='id' value='<?php echo $SDstudent["id"] ?>'>
								<input type='hidden' name='type' value='<?php echo $SDstudent["type"] ?>'>
								<input type="hidden" name="query" value='delete'>
								<div>
									<input type='submit' value='Confirm'>
									<button onclick="hidePrompt()" type='button'>Cancel</button>
								</div>
							</form>
						</div>
						<!-- <div id='edit-box' class='prompt-box'>
							<p>Fill up and edit all required fields.</p>
							<div class='content-line'>
							</div>
						</div> -->
					</div>
					<tr>
					<?php if ($x%2 == 0): ?>
						<td class="row-2"><?php echo $SDstudent['program'] . " [" . $SDstudent['alias'] . "]" ?></td>
						<td class="row-2"><?php echo $SDstudent['department'] ?></td>					
						<td class="row-2"><?php echo $SDstudent['male_q'] ?></td>
						<td class="row-2"><?php echo $SDstudent['female_q'] ?></td>
						<td class="row-2"><?php echo $SDstudent['semester'] ?></td>
						<td class="row-2"><?php echo $SDstudent['schoolyear'] ?></td>
						<td class="row-2">
							<button class='tbl-edit'>Edit</button>
							<button class='tbl-del' onclick='showPrompt("del", "<?php echo $SDstudent['id'] ?>")'>Delete</button>
						</td>
					<?php else: ?>
						<td><?php echo $SDstudent['program'] . " [" . $SDstudent['alias'] . "]" ?></td>
						<td><?php echo $SDstudent['department'] ?></td>					
						<td><?php echo $SDstudent['male_q'] ?></td>
						<td><?php echo $SDstudent['female_q'] ?></td>
						<td><?php echo $SDstudent['semester'] ?></td>
						<td><?php echo $SDstudent['schoolyear'] ?></td>
						<td>
							<button class='tbl-edit'>Edit</button>
							<button class='tbl-del' onclick='showPrompt("del", "<?php echo $SDstudent['id'] ?>")'>Delete</button>
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