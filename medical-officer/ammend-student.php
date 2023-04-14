<!---------------- Session starts form here ----------------------->
<?php
session_start();
if (!$_SESSION["LoginMedics"]) {
	header('location:../login/login.php');
}
require_once "../connection/connection.php";
?>
<!---------------- Session Ends form here ------------------------>



<!doctype html>
<html lang="en">

<head>
	<title>Kisumu University</title>
</head>
<?php include('../common/common-header.php') ?>
<?php include('../common/medic-sidebar.php') ?>

<body>


	<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
		<div class="sub-main">
			<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
				<h4>Ammend student details</h4>
			</div>

			<!-- search bar codes start -->

			<div class="col-md-6">
				<form action=" " method="post">
					<div class="form-group">
						<label for="exampleInputPassword1">
							<h5>Enter student Registartion number:</h5>
						</label>
						<div class="d-flex">
							<input type="text" name="search" id="search" class="form form-control" placeholder="Reg number">
							<input class="btn btn-primary px-4 ml-4" type="submit" name="btnSearch" value="Search">
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- search bar code ends here  -->

		<form action=" " method="post">
			<?php
			if (isset($_POST["btnSearch"])) {
				$userId = $_POST['search'];
				$query = "SELECT * FROM student_information INNER JOIN medical_information ON medical_information.reg_number = student_information.reg_number WHERE student_information.reg_number = '$userId'";
				$result = mysqli_query($con, $query);
				while ($row = mysqli_fetch_array($result))
					if ($result) { ?>

					<div class="col-md-4">
						<?php $profile_image = $row["profile_image"] ?>
						<img class="ml-5 mb-5" height='290px' width='250px' src=<?php echo "../images/$profile_image"  ?>>
					</div>
					</div>
					<div class="row">
						<div class=" col-lg-6 col-md-6 pr-5">
							<div class="form-group">
								<label for="exampleInputEmail1">First Name:*</label>
								<input disabled class="form-control" name="first_name" value=<?php echo $row['first_name'] ?>>
							</div>
						</div>
						<div class="col-md-6 pr-5">
							<div class="form-group">
								<label for="exampleInputPassword1">Middle Name:*</label>
								<input disabled class="form-control" name="middle_name" value="<?php echo $row['middle_name'] ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pr-5">
							<div class="form-group">
								<label for="exampleInputEmail1">Last Name:*</label>
								<input disabled class="form-control" name="last_name" value=<?php echo $row['last_name'] ?>>
							</div>
						</div>

						<div class="col-md-6 pr-5">
							<div class="form-group">
								<label for="exampleInputPassword1">Registartion number:*</label>
								<input type='text' readonly class="form-control" id="disabledTextInput" name="reg_number" value=<?php echo $row['reg_number'] ?>>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 pr-5">
							<div class="form-group">
								<label for="exampleInputEmail1">Id number:*</label>
								<input disabled class="form-control" name="id_number" value=<?php echo $row['id_number'] ?>>
							</div>
						</div>
						<div class="col-md-6 pr-5">
							<div class="form-group">
								<label for="exampleInputPassword1">Mobile:*</label>
								<input type="number" class="form-control" name="phone_number" value=<?php echo $row['phone_number'] ?>>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pr-5">
							<div class="form-group">
								<label for="exampleInputEmail1">Gender</label>
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
								<label for="exampleInputEmail1">Campus:*</label>
								<input disabled name="campus" class="form-control" value=<?php echo $row['campus'] ?>>
							</div>
						</div>
						<div class="col-md-6 pr-5">
							<div class="form-group">
								<label for="exampleInputPassword1">School:*</label>
								<input disabled name="obtain_marks" class="form-control" value=<?php echo $row['school'] ?>>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pr-5">
							<div class="form-group">
								<label for="exampleInputEmail1">Course:*</label>
								<input disabled name="course_name" class="form-control" value=<?php echo $row['course_name'] ?>>
							</div>
						</div>
						<div class="col-md-6 pr-5">
							<div class="form-group">
								<label for="exampleInputPassword1">Originality:*</label>
								<input disabled name="permanent_address" class="form-control" value=<?php echo 'KUCCPS' ?>>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pr-5">
							<div class="form-group">
								<label for="exampleInputEmail1">County: *</label>
								<input disabled class="form-control" value=<?php echo $row['home_county'] ?>>
							</div>
						</div>
						<div class="col-md-6 pr-5">
							<div class="form-group">
								<label for="exampleInputPassword1">District:*</label>
								<input disabled name="district" class="form-control" value=<?php echo $row['district'] ?>>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 pr-5">
							<div class="form-group">
								<label for="exampleInputEmail1">Vission: *</label>
								<input type='text' name='vission' class="form-control" value=<?php echo $row['vission'] ?>>
							</div>
						</div>
						<div class="col-md-6 pr-5">
							<div class="form-group">
								<label for="exampleInputPassword1">Hearing:*</label>
								<input type='text' name="hearing" class="form-control" value=<?php echo $row['hearing'] ?>>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 pr-5">
							<div class="form-group">
								<label for="exampleInputEmail1">Pulse: *</label>
								<input type='text' name='pulse' class="form-control" value=<?php echo $row['pulse'] ?>>
							</div>
						</div>
						<div class="col-md-6 pr-5">
							<div class="form-group">
								<label for="exampleInputPassword1">Blood Pressure:*</label>
								<input type='text' name="blood_pressure" class="form-control" value=<?php echo $row['blood_pressure'] ?>>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 pr-5">
							<div class="form-group">
								<label for="exampleInputEmail1">In any Treatment: *</label>
								<input type='text' name='in_any_treatment' class="form-control" value=<?php echo $row['in_any_treatment'] ?>>
							</div>
						</div>
						<div class="col-md-6 pr-5">
							<div class="form-group">
								<label for="exampleInputPassword1">Status:*</label>
								<input type='text' name="marital_status" class="form-control" value=<?php echo $row['marital_status'] ?>>
							</div>
						</div>
					</div>



					<div class="row mt-3">
						<div class="col-lg-6 col-md-6 offset-4">
							<input type="submit" name="sub" type="submit" class="btn btn-primary" value="Update Information">
						</div>
					</div>
			<?php



					}
			}


			?>
		</form>



		</div>

	</main>

</body>

</html>

<?php

if (isset($_POST['sub'])) {
	$vission = $_POST['vission'];
	$hearing = $_POST['hearing'];
	$pulse = $_POST['pulse'];
	$in_any_treatment = $_POST['in_any_treatment'];
	// $marital_status = $_POST['marital_status'];
	$blood_pressure = $_POST['blood_pressure'];


	$reg_number = $_POST['reg_number'];
	$query = "UPDATE medical_information SET hearing='$hearing', vission='$vission', in_any_treatment = '$in_any_treatment' , blood_pressure = '$blood_pressure' WHERE reg_number= '$reg_number'";
	$run = mysqli_query($con, $query);
	if ($run) {  ?>
		<script type="text/javascript">
			alert("Student data has  been updated succesfully");
		</script>
	<?php }
} else { ?>
	<script type="text/javascript">
		alert("Student data has not been updated due to some errors");
	</script>
<?php }



?>