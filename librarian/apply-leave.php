<?php
	session_start();
	if (!$_SESSION["LoginLibrarian"]) {
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";
	?>
 <!---------------- Session Ends form here ------------------------>
 <?php
	date_default_timezone_set('AFRICA/NAIROBI');
	?>
 <!doctype html>
 <html lang="en">

 <head>
 	<title>Kisumu University</title>
 </head>
 <?php include('../common/common-header.php') ?>
 <?php include('../common/librarian-sidebar.php') ?>

 <body>

 	<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
 		<div class="sub-main">
 			<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
 				<h4>Apply leave</h4>
 			</div>
<h4 class="text-center bg-warning pb-5 pl-5 pt-5">Sorry the page is still under construction</h4>