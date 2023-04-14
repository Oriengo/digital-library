<!---------------- Session starts form here ----------------------->
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
<!---------------- Session Ends form here ------------------------>




<!doctype html>
<html lang="en">

<head>
	<title>Kisumu University</title>
</head>

<body>
	<?php include('../common/common-header.php') ?>
	<?php include('../common/student-sidebar.php') ?>

	<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
		<div class="sub-main ">
			<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
				<h4 class="">Student Medical Information</h4>
			</div>
			<div class="row">
				<div class="col-md-12">
					<section class="border mt-4">
						<form style action=" " method="POST" enctype="multipart/form-data">
							<input type="submit" name="view" type="submit" class="btn btn-primary mt-3 mb-3 ml-3" value="Medical Records"> &nbsp
							<input type="submit" name="history" type="submit" class="btn btn-primary text-right" value="Treatment History">
						</form>

					</section>
				</div>
			</div>
		</div>

		<?php
		if (isset($_POST['view'])) {
			$userId = $_SESSION['LoginStudent'];
			$query = "SELECT * FROM student_information INNER JOIN medical_information ON medical_information.reg_number = student_information.reg_number WHERE student_information.reg_number = '$userId'";
			$result = mysqli_query($con, $query);
			while ($row = mysqli_fetch_array($result)) { ?>
				<div class="row">
					<div class=" col-lg-6 col-md-6 pr-5">
						<div class="form-group">
							<label for="exampleInputEmail1"> Name:*</label>
							<input disabled class="form-control" name="first_name" value=<?php echo $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'] ?>>
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
							<input disabled class="form-control" id="disabledTextInput" name="reg_number" value=<?php echo $row['reg_number'] ?>>
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
							<input disabled class="form-control" name="phone_number" value=<?php echo $row['phone_number'] ?>>
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
							<label for="exampleInputEmail1">Vission: *</label>
							<input disabled class="form-control" value=<?php echo $row['vission'] ?>>
						</div>
					</div>
					<div class="col-md-6 pr-5">
						<div class="form-group">
							<label for="exampleInputPassword1">Hearing:*</label>
							<input disabled class="form-control" value=<?php echo $row['hearing'] ?>>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 pr-5">
						<div class="form-group">
							<label for="exampleInputEmail1">Pulse: *</label>
							<input disabled class="form-control" value=<?php echo $row['pulse'] ?>>
						</div>
					</div>
					<div class="col-md-6 pr-5">
						<div class="form-group">
							<label for="exampleInputPassword1">Blood Pressure:*</label>
							<input disabled class="form-control" value=<?php echo $row['blood_pressure'] ?>>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 pr-5">
						<div class="form-group">
							<label for="exampleInputEmail1">In any Treatment: *</label>
							<input disabled class="form-control" value=<?php echo $row['in_any_treatment'] ?>>
						</div>
					</div>
					<div class="col-md-6 pr-5">
						<div class="form-group">
							<label for="exampleInputPassword1">Status:*</label>
							<input disabled class="form-control" value=<?php echo $row['marital_status'] ?>>
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

		<?php
		if (isset($_POST['history'])) {
		}


		?>

	</main>
	<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>