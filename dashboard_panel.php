<?php

require_once("lib.php");

session_start();

if (empty($_SESSION)) {

	header('Location: index.php');

}




	function getActive($accounts, $sexDis, $resPool, $ext, $mail, $documents)
	{
			$profile = fetchProfile($_SESSION['id']);
			$panel =[
			'Accounts' => $accounts,
			'Sex Disaggregation' => $sexDis,
			'GAD Resource Pool' => $resPool,
			'GAD Extension Projects' => $ext,
			'Mail' => $mail,
			'Documents' => $documents
			];
			$name = ["accounts","sexDis","resPool","ext","mail", "documents"];
			$drop = ["accounts" => ["creacc"=>"Create Account",
								"viewacc" => "View Accounts"],
					"sexDis" => ["student"=>"Student",
								"faculty" => "Faculty",
								"nfaculty" => "Non-faculty"],
					"resPool" => ['poolview' => "View",
								"pooledit" => "Edit"],
					"ext" => ["extadd" => "Add", 
							"extview" => "View"],
					"mail" => ["mcomp" => "Compose",
							"minbox" => "Inbox",
							"msent" => "Sent",
							"mtrash" => "Trash"],
					"documents" => ["docu" => "Documents",
									"dcollege" => "College",
									"ddepartment" => "Department",
									"dprograms" => "Programs",
									"dguidelines" => "Guidelines"
									]

					];
			$icon = ["fa fa-users","fa fa-venus-mars","fa fa-user","fa fa-certificate","fa fa-envelope","fa fa-folder"];


		echo "<div class='wrapper'>
			<script type='text/javascript' src='js/jquery-3.1.1.js'></script>
			<script type='text/javascript'>
			$(function(){

				$('#toggle').click(function(){

					if ($('#sidebar').is('.sidebar-desktop')) {
						$('#sidebar').addClass('sidebar-mobile').removeClass('sidebar-desktop');
						$('.icon').addClass('fa-2x');
					}
					else if ($('#sidebar').is('.sidebar-mobile'))
					{
						$('#sidebar').removeClass('sidebar-mobile').addClass('sidebar-desktop');
						$('.icon').removeClass('fa-2x');
					}

				});

			});
			</script>
				<div id='sidebar' class='sidebar-desktop'>
					<div class='sidebar-header'>
						<img src='img/logo.png' width='50'>
						<span class='sidebar-title'>CvSU-GAD</span>
					</div>
					<div class='sidebar-profile'>
						<img src='img/resume.jpg' width='45'>
						<span>
							<div>Welcome,</div>
							<div>" . $profile['fname'] . "</div>
						</span>
					</div>
					<div class='menu'>
						MENU
					</div>
					<ul>";
					$x=0;
					while (current($panel)) {
						echo "<li class='sidebar-options'>
							<div class='sidebar-name'>
								<div class='" . $icon[$x] . " icon'></div><div class='sidebar-menu'>" . key($panel) . "</div><div class='fa fa-angle-down drop-btn'></div>
							</div>
							<ul class='dropdown'>
								<li class='drop-title'>" . key($panel) . "</li>";
							foreach ($drop[$name[$x]] as $d) {
								echo "<li><span class='fa fa-angle-right'></span><a href='" . array_search($d, $drop[$name[$x]]) .".php'>" . $d . "</a></li>";
							}
						echo "</ul>
						</li>";
						$x++;
						next($panel);
					}
				echo "</ul>
				</div>
			</div>";
	}

?>
