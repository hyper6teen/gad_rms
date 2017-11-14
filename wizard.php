<?php
session_start();

?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<script type='text/javascript' src='js/jquery-3.1.1.js'></script>
<script type='text/javascript' src='js/jquery-ui-1.12.1/jquery-ui.js'></script>
<script type="text/javascript">

var i = 1;

function nextTab(val)
{
	if (val === "1") 
	{
		$('.desc1').css("display","none");
		$('.desc2').css("display","block");
		$('.desc3').css("display","none");
		$('.desc4').css("display","none");

		$('.tabs1').css("background-color","#1abb9c");
		$('.tabs2').css("background-color","#34495e");
		$('.tabs3').css("background-color","#1abb9c");
		$('.tabs4').css("background-color","#1abb9c");

		$('.wizard-content1').css('display','none');
		$('.wizard-content2').css('display','block');

        $('.wizard-tab2').removeClass('disabled');
	}

	if (val === "2") 
	{
		$('.desc1').css("display","none");
		$('.desc2').css("display","none");
		$('.desc3').css("display","block");
		$('.desc4').css("display","none");

		$('.tabs1').css("background-color","#1abb9c");
		$('.tabs2').css("background-color","#1abb9c");
		$('.tabs3').css("background-color","#34495e");
		$('.tabs4').css("background-color","#1abb9c");

		$('.wizard-content2').css('display','none');
		$('.wizard-content3').css('display','block');

        $('.wizard-tab3').removeClass('disabled');
	}

	if (val === "3") 
	{
		$('.desc1').css("display","none");
		$('.desc2').css("display","none");
		$('.desc3').css("display","none");
		$('.desc4').css("display","block");

		$('.tabs1').css("background-color","#1abb9c");
		$('.tabs2').css("background-color","#1abb9c");
		$('.tabs3').css("background-color","#1abb9c");
		$('.tabs4').css("background-color","#34495e");

		$('.wizard-content3').css('display','none');
		$('.wizard-content4').css('display','block');

        $('.wizard-tab4 ').removeClass('disabled');
	}
}

function prevTab(val)
{
	if (val === "1") 
	{
		$('.desc1').css("display","block");
		$('.desc2').css("display","none");
		$('.desc3').css("display","none");
		$('.desc4').css("display","none");
		
		$('.tabs1').css("background-color","#34495e");
		$('.tabs2').css("background-color","#1abb9c");
		$('.tabs3').css("background-color","#1abb9c");
		$('.tabs4').css("background-color","#1abb9c");
		
		$('.wizard-content1').css('display','block');
		$('.wizard-content2').css('display','none');
	}

	if (val === "2") 
	{
		$('.desc1').css("display","none");
		$('.desc2').css("display","block");
		$('.desc3').css("display","none");
		$('.desc4').css("display","none");
		
		$('.tabs1').css("background-color","#1abb9c");
		$('.tabs2').css("background-color","#34495e");
		$('.tabs3').css("background-color","#1abb9c");
		$('.tabs4').css("background-color","#1abb9c");
		
		$('.wizard-content2').css('display','block');
		$('.wizard-content3').css('display','none');
	}

	if (val === "3") 
	{
		$('.desc1').css("display","none");
		$('.desc2').css("display","none");
		$('.desc3').css("display","block");
		$('.desc4').css("display","none");
		
		$('.tabs1').css("background-color","#1abb9c");
		$('.tabs2').css("background-color","#1abb9c");
		$('.tabs3').css("background-color","#34495e");
		$('.tabs4').css("background-color","#1abb9c");
		
		$('.wizard-content3').css('display','block');
		$('.wizard-content4').css('display','none');
	}
}


function tabchange(tab)
{
    if (tab === "wz1") {

        $('.desc1').css("display","block");
        $('.desc2').css("display","none");
        $('.desc3').css("display","none");
        $('.desc4').css("display","none");
        
        $('.tabs1').css("background-color","#34495e");
        $('.tabs2').css("background-color","#1abb9c");
        $('.tabs3').css("background-color","#1abb9c");
        $('.tabs4').css("background-color","#1abb9c");
        
        $('.wizard-content1').css('display','block');
        $('.wizard-content2').css('display','none');
        $('.wizard-content3').css('display','none');
        $('.wizard-content4').css('display','none');



    }

    else if (tab === "wz2") {

        $('.desc1').css("display","none");
        $('.desc2').css("display","block");
        $('.desc3').css("display","none");
        $('.desc4').css("display","none");

        $('.tabs1').css("background-color","#1abb9c");
        $('.tabs2').css("background-color","#34495e");
        $('.tabs3').css("background-color","#1abb9c");
        $('.tabs4').css("background-color","#1abb9c");

        $('.wizard-content1').css('display','none');
        $('.wizard-content2').css('display','block');
        $('.wizard-content3').css('display','none');
        $('.wizard-content4').css('display','none');
    
    }

    else if (tab === "wz3") {

        $('.desc1').css("display","none");
        $('.desc2').css("display","none");
        $('.desc3').css("display","block");
        $('.desc4').css("display","none");

        $('.tabs1').css("background-color","#1abb9c");
        $('.tabs2').css("background-color","#1abb9c");
        $('.tabs3').css("background-color","#34495e");
        $('.tabs4').css("background-color","#1abb9c");

        $('.wizard-content1').css('display','none');
        $('.wizard-content2').css('display','none');
        $('.wizard-content3').css('display','block');
        $('.wizard-content4').css('display','none');

    }

    else if (tab === "wz4") {

        $('.desc1').css("display","none");
        $('.desc2').css("display","none");
        $('.desc3').css("display","none");
        $('.desc4').css("display","block");

        $('.tabs1').css("background-color","#1abb9c");
        $('.tabs2').css("background-color","#1abb9c");
        $('.tabs3').css("background-color","#1abb9c");
        $('.tabs4').css("background-color","#34495e");

        $('.wizard-content1').css('display','none');
        $('.wizard-content2').css('display','none');
        $('.wizard-content3').css('display','none');
        $('.wizard-content4').css('display','block');

    }

}


$("document").ready(function(){

	$(".calendar").datepicker({
		
        dateFormat: 'yy-mm-dd',
        changeMonth: true, 
    	changeYear: true,
    	yearRange: "-60:+10",
		inline: true,
      	showOtherMonths: true,
	});

		
		$('.req').change(function(){

			if ($(".wizard-input-fname").val() != "" &&
				$(".wizard-input-mname").val() != "" &&
				$(".wizard-input-lname").val() != "" &&
				$(".wizard-input-sex").val() != "none" &&
				$(".calendar").val() != "") 
			{

				
				$("#wiz-next1").removeClass('disabled');
			}
			else if($(".wizard-input-fname").val() === "" ||
	            	$(".wizard-input-mname").val() === "" ||
	            	$(".wizard-input-lname").val() === "" ||
	            	$(".wizard-input-sex").val() === "none" ||
					$(".calendar").val() === "")
			{

				$('#wiz-next1').addClass('disabled');
			}

		});

		$('.req').keyup(function(){

			if ($(".wizard-input-fname").val() != "" &&
				$(".wizard-input-mname").val() != "" &&
				$(".wizard-input-lname").val() != "" &&
				$(".wizard-input-sex").val() != "none" &&
				$(".calendar").val() != "") 
			{

				
				$("#wiz-next1").removeClass('disabled');
			}
			else if($(".wizard-input-fname").val() === "" ||
	            	$(".wizard-input-mname").val() === "" ||
	            	$(".wizard-input-lname").val() === "" ||
	            	$(".wizard-input-sex").val() === "none" ||
					$(".calendar").val() === "")
			{

				$('#wiz-next1').addClass('disabled');
			}

		});


		$(".req-cont").keyup(function(){

            if ($(".wizard-input-add").val() != "" &&
                $(".wizard-input-tel").val() != "" &&
                $(".wizard-input-cp").val() != "" &&
                $(".wizard-input-eadd").val() != "") 
            {   
            	$("#wiz-next2").removeClass('disabled');
            }
            else if($(".wizard-input-add").val() === "" ||
                    $(".wizard-input-tel").val() === "" ||
                    $(".wizard-input-cp").val() === "" ||
                    $(".wizard-input-eadd").val() === "")
            {
               	$("#wiz-next2").addClass('disabled');
            }

        });

        $(".req-cont").change(function(){

            if ($(".wizard-input-add").val() != "" &&
                $(".wizard-input-tel").val() != "" &&
                $(".wizard-input-cp").val() != "" &&
                $(".wizard-input-eadd").val() != "") 
            {   
                $("#wiz-next2").removeClass('disabled');
            }
            else if($(".wizard-input-add").val() === "" ||
                    $(".wizard-input-tel").val() === "" ||
                    $(".wizard-input-cp").val() === "" ||
                    $(".wizard-input-eadd").val() === "")
            {
                $("#wiz-next2").addClass('disabled');
            }
            
        });






        $(".req-add").keyup(function(){

            if ($(".wizard-input-des").val() != "" &&
                $(".wizard-input-oadd").val() != "" &&
                $(".dur-from").val() != "" &&
                $(".dur-to").val() != "" &&
                $(".wizard-input-rel").val() != "") 
            {
                $("#wiz-next3").removeClass('disabled');
            }
            else if($(".wizard-input-des").val() === "" ||
                $(".wizard-input-oadd").val() === "" ||
                $(".dur-from").val() === "" ||
                $(".dur-to").val() === "" ||
                $(".wizard-input-rel").val() === "")
            {
                $("#wiz-next3").addClass('disabled');
            }

        });

        $(".req-add").change(function(){

            if ($(".wizard-input-des").val() != "" &&
                $(".wizard-input-oadd").val() != "" &&
                $(".dur-from").val() != "" &&
                $(".dur-to").val() != "" &&
                $(".wizard-input-rel").val() != "") 
            {
                $("#wiz-next3").removeClass('disabled');
            }
            else if($(".wizard-input-des").val() === "" ||
                $(".wizard-input-oadd").val() === "" ||
                $(".dur-from").val() === "" ||
                $(".dur-to").val() === "" ||
                $(".wizard-input-rel").val() === "")
            {
                $("#wiz-next3").addClass('disabled');
            }
            
        });

        $(".dur-from").datepicker({

            dateFormat: 'yy-mm-dd',
            changeMonth: true, 
            changeYear: true,
            defaultDate: new Date(),
            onSelect: function(dateStr) 
            {
            	if ($(".wizard-input-des").val() != "" &&
                $(".wizard-input-oadd").val() != "" &&
                $(".dur-from").val() != "" &&
                $(".dur-to").val() != "" &&
                $(".wizard-input-rel").val() != "") 
	            {
	                $("#wiz-next3").removeClass('disabled');
	            }
	            else if($(".wizard-input-des").val() === "" ||
	                $(".wizard-input-oadd").val() === "" ||
	                $(".dur-from").val() === "" ||
	                $(".dur-to").val() === "" ||
	                $(".wizard-input-rel").val() === "")
	            {
	                $("#wiz-next3").addClass('disabled');
	            }     
                $(".dur-to").val(dateStr);
                $(".dur-to").datepicker("option",{ minDate: new Date(dateStr)})
            }
        });

   		$('.dur-to').datepicker({

            dateFormat: 'yy-mm-dd',
            changeMonth: true, 
            changeYear: true,
            defaultDate: new Date(),
            onSelect: function(dateStr) 
            {
            	if ($(".wizard-input-des").val() != "" &&
                $(".wizard-input-oadd").val() != "" &&
                $(".dur-from").val() != "" &&
                $(".dur-to").val() != "" &&
                $(".wizard-input-rel").val() != "") 
	            {
	                $("#wiz-next3").removeClass('disabled');
	            }
	            else if($(".wizard-input-des").val() === "" ||
	                $(".wizard-input-oadd").val() === "" ||
	                $(".dur-from").val() === "" ||
	                $(".dur-to").val() === "" ||
	                $(".wizard-input-rel").val() === "")
	            {
	                $("#wiz-next3").addClass('disabled');
	            }
            
            toDate = new Date(dateStr);

          
            }
        });
		



		$('.wiz-educ-form').keyup(function(){

            console.log("dsadasd");
            var valid = 0;
            
    
            var s = false;

            for(var f= 0; f<=i;f++)
            {

                $(".req" + f).each(function()
                {
                    

                    if ($(this).val() != "" && $(this).val() != "none") {
                        
                    
                        $(".wiz-finish").removeClass('disabled');
                        s = false;
                         
                    }
                    else if($(this).val() === "" || $(this).val() === "none")
                    {
                        
                        $('.wiz-finish').addClass('disabled');
                        s = true;
                        return false;
                        
                    }


                });

                if (s) {
                    break;
                }

            }


        });

        $('.wiz-educ-form').change(function(){

            var valid = 0;
            
    
            var s = false;

            for(var f= 0; f<=i;f++)
            {

                $(".req" + f).each(function()
                {
                    

                    if ($(this).val() != "" && $(this).val() != "none") {
                        
                    
                        $(".wiz-finish").removeClass('disabled');
        
                        s = false;
                         
                    }
                    else if($(this).val() === "" || $(this).val() === "none")
                    {
                        
                        $('.wiz-finish').addClass('disabled');
        ;
                        s = true;
                        return false;
                        
                    }


                });

                if (s) {
                    break;
                }

            }


        });


        $("#sdate").datepicker({

            dateFormat: 'yy-mm-dd',
            changeMonth: true, 
            changeYear: true,
            defaultDate: new Date(),
            onSelect: function(dateStr) 
            {
                if ($(".wizard-input-school").val() != "" &&
                    $(".wizard-input-degree").val() != "" &&
                    $(".wizard-input-afinish").val() != "" &&
                    $(".wizard-input-astart").val() != "" &&
                    $(".wizard-input-level").val() != "none" &&
                    $(".wizard-input-grad").val() != "") 
                {

                    
                    $(".wiz-finish").removeClass('disabled');
                    }
                else if($(".wizard-input-school").val() === "" ||
                    $(".wizard-input-degree").val() === "" ||
                    $(".wizard-input-afinish").val() === "" ||
                    $(".wizard-input-astart").val() === "" ||
                    $(".wizard-input-level").val() === "none" ||
                    $(".wizard-input-grad").val() === "")
                {

                    $('.wiz-finish').addClass('disabled');
    
                }     
                $("#fdate").val(dateStr);
                $("#fdate").datepicker("option",{ minDate: new Date(dateStr)})
            }
        });

        $('#fdate').datepicker({

            dateFormat: 'yy-mm-dd',
            changeMonth: true, 
            changeYear: true,
            defaultDate: new Date(),
            onSelect: function(dateStr) {
            
            if ($(".wizard-input-school").val() != "" &&
                    $(".wizard-input-degree").val() != "" &&
                    $(".wizard-input-afinish").val() != "" &&
                    $(".wizard-input-astart").val() != "" &&
                    $(".wizard-input-level").val() != "none" &&
                    $(".wizard-input-grad").val() != "") 
                {

                    
                    $(".wiz-finish").removeClass('disabled');
                    }
                else if($(".wizard-input-school").val() === "" ||
                    $(".wizard-input-degree").val() === "" ||
                    $(".wizard-input-afinish").val() === "" ||
                    $(".wizard-input-astart").val() === "" ||
                    $(".wizard-input-level").val() === "none" ||
                    $(".wizard-input-grad").val() === "")
                {

                    $('.wiz-finish').addClass('disabled');
    
                }
            toDate = new Date(dateStr);

            }
        });

        $(document).ready(function(){

            
            $('.wiz-btn-add').click(function(){
                i = i + 1;
            $('.wiz-educ-form').append('<div class="educ-title">Attainment ' + i + '</div><div class="educ-wiz-col-1"><div><label>Name of School*</label></div><div><label>Degree Course</label></div><div><label>Inclusive Date From</label></div></div><div class="educ-wiz-col-2"><div><input name="school[]" type="text" class="req' + i + ' wizard-input-school"><label>Year Graduated*</label><input name="grad[]" type="text" class="req' + i + '     wizard-input-grad"></div><div><input name="degree[]" type="text" class="req' + i + '    wizard-input-degree"><label>Level*</label><select name="level[]" class="req' + i + '    wizard-input-level" name="level"><option value="none">Select Level</option><option value="College">College</option><option value="Post Graduate">Post Graduate</option><option value="Vocational">Vocational</option></select></div><div><input id="sdate' + i + '" name="astart[]" type="text" class="req' + i + '     wizard-input-astart"><label>Inclusive Date From</label><input id="fdate' + i + '" name="afinish[]" type="text" class="req' + i + '      wizard-input-afinish"></div></div><div class="content-line"></div>')
                .promise()
                .done(function() {
                    $(this).find('#sdate'+i).datepicker({ 

                        dateFormat: 'yy-mm-dd',
                        changeMonth: true, 
                        changeYear: true,
                        defaultDate: new Date(),
                        onSelect: function(dateStr) 
                        {
                            if ($(".wizard-input-school").val() != "" &&
                                $(".wizard-input-degree").val() != "" &&
                                $(".wizard-input-afinish").val() != "" &&
                                $(".wizard-input-astart").val() != "" &&
                                $(".wizard-input-level").val() != "none" &&
                                $(".wizard-input-grad").val() != "") 
                            {

                                
                                $(".wiz-finish").removeClass('disabled');
                                            }
                            else if($(".wizard-input-school").val() === "" ||
                                $(".wizard-input-degree").val() === "" ||
                                $(".wizard-input-afinish").val() === "" ||
                                $(".wizard-input-astart").val() === "" ||
                                $(".wizard-input-level").val() === "none" ||
                                $(".wizard-input-grad").val() === "")
                            {

                                $('.wiz-finish').addClass('disabled');
                
                            }     
                            $("#fdate"+i).val(dateStr);
                            $("#fdate"+i).datepicker("option",{ minDate: new Date(dateStr)})
                        }


                    });
                    $(this).find('#fdate'+i).datepicker({

                        dateFormat: 'yy-mm-dd',
                        changeMonth: true, 
                        changeYear: true,
                        defaultDate: new Date(),
                        onSelect: function(dateStr) {
                        
                        if ($(".wizard-input-school").val() != "" &&
                                $(".wizard-input-degree").val() != "" &&
                                $(".wizard-input-afinish").val() != "" &&
                                $(".wizard-input-astart").val() != "" &&
                                $(".wizard-input-level").val() != "none" &&
                                $(".wizard-input-grad").val() != "") 
                            {

                                
                                $(".wiz-finish").removeClass('disabled');
                                            }
                            else if($(".wizard-input-school").val() === "" ||
                                $(".wizard-input-degree").val() === "" ||
                                $(".wizard-input-afinish").val() === "" ||
                                $(".wizard-input-astart").val() === "" ||
                                $(".wizard-input-level").val() === "none" ||
                                $(".wizard-input-grad").val() === "")
                            {

                                $('.wiz-finish').addClass('disabled');
                
                            }
                        toDate = new Date(dateStr);

                        }

                    });

                    $('.wiz-finish').addClass('disabled');
    
                });
                

            });

        });


    

		

});

function isNumber(evt) {

    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

</script>

<body>
	<div class="wizard">
		<div class="wizard-header">Account Setup</div>
		<div class="wizard-body">
			<p class="wizard-title">Account Information Verification</p>
			<div class="content-line"></div>
			<p class="wizard-inst">Please fill up all required forms to proceed.</p>
			<div class="wizard-tabs">
				<div onclick="tabchange('wz1')" class="wizard-tab1">
					<div class="tabs1">1</div>
					<div class="tabs1"></div>
				</div>
				<div onclick="tabchange('wz2')" class="disabled wizard-tab2">
					<div class="tabs2"></div>
					<div class="tabs2">2</div>
					<div class="tabs2"></div>
				</div>
				<div onclick="tabchange('wz3')" class="disabled wizard-tab3">
					<div class="tabs3"></div>
					<div class="tabs3">3</div>
					<div class="tabs3"></div>
				</div>
				<div onclick="tabchange('wz4')" class="disabled wizard-tab4">
					<div class="tabs4"></div>
					<div class="tabs4">4</div>
				</div>
				
			</div>
			<div class="wizard-desc">
				<span class="desc1">Personal Information</span>
				<span class="desc2">Contact Information</span>
				<span class="desc3">Additional Information</span>
				<span class="desc4">Educational Attainment</span>
			</div>
			<form action="wiz-submit.php" method="post">
                
				<div class="wizard-content1">
						<div class="wiz-col-1">
                            
							<div><label>First Name*</label></div>
							<div><label>Middle Name*</label></div>
							<div><label>Last Name*</label></div>
							<div><label>Date of Birth*</label></div>
							
						</div>
						<div class="wiz-col-2">
                            <input name="id" type="hidden" value="<?php echo $_SESSION['id'] ?>">
							<div><input name="fname" type="text" class="req wizard-input-fname"></div>
							<div><input name="mname" type="text" class="req wizard-input-mname"></div>
							<div><input name="lname" type="text" class="req wizard-input-lname">
								<label>Suffix</label>
								<input name="sfx" type="text" class="req wizard-input-sfx">
							</div>
							<div>
								<input name="bdate" type="text" class="req calendar">
								<label>Sex*</label>
								<select name="sex" class="req wizard-input-sex">
									<option value="none">Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>
					<div class="content-line"></div>
					<a id="wiz-next1" class="wiz-next disabled" onclick="nextTab('1')">Next</a>
				</div>
				<div class="wizard-content2">
						<div class="wiz-col-1">
							<div><label>Permanent Address*</label></div>
							<div><label>Telephone No.*</label></div><br>
							<div><label>Email Address*</label></div>
						</div>
						<div class="wiz-col-2">
							<div><input name="address" type="text" class="req-cont wizard-input-add"></div>
							<div><input onkeypress="return isNumber(event)" name="tel_no" type="text" class="req-cont wizard-input-tel">
								<label>Cellphone No.*</label>
								<input onkeypress="return isNumber(event)" name="cp_no" type="text" class="req-cont wizard-input-cp">
							</div>
							<div><input name="email" type="text" class="req-cont wizard-input-eadd"></div>
						</div>
					<div class="content-line"></div>
					<div class="wiz-btns">
							<a id="wiz-next2" class="wiz-next disabled" onclick="nextTab('2')">Next</a>
							<a id="wiz-prev1"class="wiz-prev" onclick="prevTab('1')">Previous</a>
					</div>
				</div>
				<div class="wizard-content3">
						<div class="wiz-col-1">
							<div><label>Religious Affiliation*</label></div>
							<div><label>Office Address*</label></div>
							<div><label>Engagement on GAD From*</label></div>
							<div><label>Willing to travel to CALABARZON Provinces*</label></div>
						</div>
						<div class="wiz-col-2">
							<div>
								<input name="religion" type="text" class="req-add wizard-input-rel">
								<label>Designation*</label>
								<input name="designation" type="text" class="req-add wizard-input-des">
							</div>
							<div><input name="office_add" type="text" class="req-add wizard-input-oadd"></div>
							<div>
								<input name="engage_from" type="text" class="req-add dur-from">
								<label>Engagement on GAD To*</label>
								<input name="engage_to" type="text" class="req-add dur-to">
							</div>
							<div>
								<input name="will_travel" class="req-add wizard-input-travel" type="checkbox">
							</div>
						</div>
					<div class="content-line"></div>
					<div class="wiz-btns">
							<a id="wiz-next3" class="wiz-next disabled" onclick="nextTab('3')">Next</a>
							<a id="wiz-prev2" class="wiz-prev" onclick="prevTab('2')">Previous</a>
					</div>
				</div>
				<div class="wizard-content4">
					<div class="wiz-educ-form">
						<div class="educ-title">Attainment 1</div>
						<div class="educ-wiz-col-1">
							<div>
								<label>Name of School*</label>
							</div>
							<div>
								<label>Degree Course</label>
							</div>
							<div>
								<label>Inclusive Date From</label>
							</div>
						</div>
						<div class="educ-wiz-col-2">
							<div>
								<input name="school[]" type="text" class="req1 wizard-input-school">
								<label>Year Graduated*</label>
								<input maxlength="4"  onkeypress="return isNumber(event)" name="grad[]" type="text" class="req1 wizard-input-grad">
								
							</div>
							<div>
								<input name="degree[]" type="text" class="req1 wizard-input-degree">
								<label>Level*</label>
								<select name="level[]" class="req1 wizard-input-level" name="level">
									<option value="none">Select Level</option>
									<option value="College">College</option>
									<option value="Post Graduate">Post Graduate</option>
									<option value="Vocational">Vocational</option>
								</select>
							</div>
							<div>
								<input id="sdate" name="astart[]" type="text" class="req1 wizard-input-astart">
								<label>Inclusive Date From</label>
								<input id="fdate" name="afinish[]" type="text" class="req1 wizard-input-afinish">
							</div>
						</div>
						<div class="content-line">
						</div>
						
						
					</div>
					<div class="wiz-btns">
						<a class="wiz-btn-add">Add Educational Attainment</a>
					</div>
					<div class="wiz-btns">
                            <input class="disabled wiz-finish" type="submit" value="Finish">
							<a class="wiz-prev" onclick="prevTab('3')">Previous</a>		
					</div>
				</div>
			</form>
			
			
			
		</div>
	</div>
</body>
</html>