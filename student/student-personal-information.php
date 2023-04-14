 
 <!---------------- Session starts form here ----------------------->
 <?php
	session_start();
	if (!$_SESSION["LoginStudent"]) {
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";
	?>
 <!---------------- Session Ends form here ------------------------>


 <?php

	$reg_number = $_SESSION['LoginStudent'];

	if (isset($_POST['sub'])) {
		$phone_number = $_POST['phone_number'];

		$query = "update student_information set phone_number='$phone_number' where reg_number='$reg_number'";
		$run = mysqli_query($con, $query);
		if ($run) {  ?>
 		<script type="text/javascript">
 			alert("Student data has been updated");
 		</script>
 	<?php } else { ?>
 		<script type="text/javascript">
 			alert("Student data has not been updated due to some errors");
 		</script>
 	<?php }

		$phone_number = $_POST['phone_number'];
		$reg_number = $_SESSION['LoginStudent'];
		$query1 = "UPDATE borrowing_tbl SET phone_number='$phone_number' WHERE reg_number='$reg_number'";
		$run = mysqli_query($con, $query1);
		if ($run) {  ?>
 		<script type="text/javascript">
 			alert("Student data has been updated");
 		</script>
 	<?php } else { ?>
 		<script type="text/javascript">
 			alert("Student data has not been updated due to some errors");
 		</script>
 <?php }
	}
	?>


 <!doctype html>
 <html lang="en">

 <head>
 	<title>Kisii University</title>
 </head>

 <body>
 	<!-- including header and common student side-bar -->
 	<?php include('../common/common-header.php') ?>
 	<?php include('../common/student-sidebar.php') ?>
 	<!-- including header and common student header ends here -->

 	<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
 		<div class="sub-main sub-main-student">
 			<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
 				<h4 class="">Update Your Personal Information </h4>
 			</div>
 			<div class="row ml-4">
 				<div class="col-lg-12 col-md-12 col-sm-12">
 					<form action="student-personal-information.php" method="post">
 						<?php $reg_number = $_SESSION['LoginStudent'];
							$query = "SELECT * FROM student_information INNER JOIN schools ON schools.school_code = student_information.school_code INNER JOIN programmes ON student_information.programme_code=programmes.programme_code INNER JOIN campuses ON student_information.campus_id = campuses.campus_id WHERE reg_number='$reg_number'";
							$run = mysqli_query($con, $query);
							while ($row = mysqli_fetch_array($run))
								if ($run) { ?>
 							<div class="row text-center bg-secondary pt-2 mr-4">

 								<style>
 									img {
 										border-radius: 50%;
 									}
 								</style>
 								<div class="col-md-4">
 									<?php $profile_image = $row["profile_image"] ?>
 									<img class=" mb-3" height='240px' width='200px' src=<?php echo "../images/$profile_image"  ?>>
 								</div>
 							</div>


 							<div class="row">
 								<div class=" col-lg-6 col-md-6 pr-5">
 									<div class="form-group">
 										<label for="exampleInputEmail1">First Name:</label>
 										<input disabled class="form-control" name="first_name" value=<?php echo $row['first_name'] ?>>
 									</div>
 								</div>
 								<div class="col-md-6 pr-5">
 									<div class="form-group">
 										<label for="exampleInputPassword1">Middle Name:</label>
 										<input disabled class="form-control" name="middle_name" value="<?php echo $row['middle_name'] ?>">
 									</div>
 								</div>
 							</div>
 							<div class="row">
 								<div class="col-md-6 pr-5">
 									<div class="form-group">
 										<label for="exampleInputEmail1"> Last Name: </label>
 										<input disabled class="form-control" name="last_name" value=<?php echo $row['last_name'] ?>>
 									</div>
 								</div>

 								<div class="col-md-6 pr-5">
 									<div class="form-group">
 										<label for="exampleInputPassword1">Registartion number:</label>
 										<input disabled class="form-control" id="disabledTextInput" name="reg_number" value=<?php echo $row['reg_number'] ?>>
 									</div>
 								</div>
 							</div>

 							<div class="row">
 								<div class="col-md-6 pr-5">
 									<div class="form-group">
 										<label for="exampleInputEmail1">Id number:</label>
 										<input disabled class="form-control" name="id_number" value=<?php echo $row['id_number'] ?>>
 									</div>
 								</div>
 								<div class="col-md-6 pr-5">
 									<div class="form-group">
 										<label for="exampleInputPassword1">Mobile:</label>
 										<input type="text" class="form-control" name="phone_number" value=<?php echo $row['phone_number'] ?>>
 									</div>
 								</div>
 							</div>
 							<div class="row">
 								<div class="col-md-6 pr-5">
 									<div class="form-group">
 										<label for="exampleInputEmail1">Gender:</label>
 										<input disabled class="form-control" name="gender" value=<?php echo $row['gender'] ?>>
 									</div>
 								</div>
 								<div class="col-md-6 pr-5">
 									<div class="form-group">
 										<label for="exampleInputPassword1">Email address</label>
 										<input disabled name="email_address" class="form-control" value=<?php echo $row['email_address'] ?>>
 									</div>
 								</div>
 							</div>
 							<div class="row">
 								<div class="col-md-6 pr-5">
 									<div class="form-group">
 										<label for="exampleInputPassword1">Campus :</label>
 										<input disabled name="campus" class="form-control"  value="<?php echo $row['name'] ?>">
 									</div>
 								</div>
 								<div class="col-md-6 pr-5">
 									<div class="form-group">
 										<label for="exampleInputPassword1">School :</label>
 										<input disabled name="school" class="form-control" maxlength=10 value="<?php echo $row['school_name'] ?>">
 									</div>

 								</div>
 							</div>
 							<div class="row">
 								<div class="col-md-6 pr-5">
 									<div class="form-group">
 										<label for="exampleInputPassword1">Course:</label>
 										<input type='text' readonly name="programme_code" class="form-control" value="<?php echo $row['programme_name'] ?>">
 									</div>
 								</div>
 								<div class="col-md-6 pr-5">
 									<div class="form-group">
 										<label for="exampleInputPassword1">Originality:</label>
 										<input disabled name="permanent_address" class="form-control" value=<?php echo 'KUCCPS' ?>>
 									</div>
 								</div>
 							</div>
 							<div class="row">
 								<div class="col-md-6 pr-5">
 									<div class="form-group">
 										<label for="exampleInputEmail1">County: </label>
 										<input disabled class="form-control" value=<?php echo $row['home_county'] ?>>
 									</div>
 								</div>
 								<div class="col-md-6 pr-5">
 									<div class="form-group">
 										<label for="exampleInputPassword1">District:</label>
 										<input disabled name="district" class="form-control" value=<?php echo $row['district'] ?>>
 									</div>
 								</div>
 							</div>
 						<?php } ?>
 						<div class="row mt-3">
 							<div class="col-lg-6 col-md-6 offset-4">
 								<input type="submit" name="sub" type="submit" class="btn btn-primary" value="Update Information">
 							</div>
 						</div>
 					</form>
 				</div>
 			</div>
 		</div>
 	</main>
 	<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
 	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
 </body>

 </html>}


 