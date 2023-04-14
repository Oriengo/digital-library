<!---------------- Session starts form here ----------------------->
<?php
	session_start();
	if (!$_SESSION["LoginLibrarian"]) {
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";
	require_once "../login/loggers.php"
	// include "logga.php";
	?>
 <!---------------- Session Ends form here ------------------------>

 <?php
	date_default_timezone_set('AFRICA/NAIROBI');
	// echo date('h:i:sa');
$result = '';
	?>

 <!doctype html>
 <html lang="en">

 <head>
 	<title>Kisumu University</title>
 </head>
 <?php include('../common/common-header.php') ?>
 <?php include('../common/librarian-sidebar.php') ?>

 <body>