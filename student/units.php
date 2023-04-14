<?php
session_start();
if (!$_SESSION["LoginStudent"]) {
	header('location:../login/login.php');
}
if ($_SESSION['LoginStudent']) {
	$_SESSION['LoginAdmin'] = "";
}
require_once "../connection/connection.php";

?>

<head>
	<title>Kisumu University</title>
</head>

<?php include('../common/common-header.php') ?>
<?php include('../common/student-sidebar.php') ?>

<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
	<div class="sub-main ">
		<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
			<h4 class="">Units</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<section class="border mt-4  pt-3 pl-3">
				<form style action=" " method="POST" enctype="multipart/form-data">
					<input type="submit" name="view" type="submit" class="btn btn-primary" value="Units Registration"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
					<input type="submit" name="history" type="submit" class="btn btn-primary text-right" value="Units History"> &nbsp &nbsp &nbsp
					<input type="submit" name="e-books" type="submit" class="btn btn-primary text-right" value="Curriculum"> &nbsp &nbsp &nbsp
					<input type="submit" name="past-papres" type="submit" class="btn btn-primary text-right" value="Revision Materials">
				</form>

			</section>
		</div>
	</div>
	</div>