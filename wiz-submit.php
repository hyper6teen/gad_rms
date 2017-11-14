<?php

require_once('lib.php');

session_start();	 

addProfile($_POST['id'], $_POST['fname'], $_POST['mname'], $_POST['lname'], $_POST['sfx'], $_POST['bdate'],$_POST['sex'],
	$_POST['address'], $_POST['tel_no'], $_POST['cp_no'], $_POST['email'], $_POST['religion'], $_POST['designation'], $_POST['office_add'], $_POST['engage_from'], 
	$_POST['engage_to'], empty($_POST['will_travel']) ? "0" : "1");

$esize = sizeof($_POST['school']);


for ($i=0; $i < $esize; $i++) { 
	
	addEducation($_POST['id'], $_POST['school'][$i], $_POST['grad'][$i], $_POST['degree'][$i], $_POST['level'][$i], 
		$_POST['astart'][$i], $_POST['afinish'][$i]);

}

changeToActive($_POST['id']);

$_SESSION['status'] = "active";

echo $_SESSION['status'];

header("Location: creacc.php");


?>