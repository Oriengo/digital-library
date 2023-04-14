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
				<h4>Treat student </h4>
			</div>
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
		</div>
		<table class="w-10 table-elements mb-3 table-three-tr text-left" cellpadding="10">
			<h3>Student Details</h3>
			<tr class="table-tr-head table-three text-white">
				<!-- <th>No</th> -->
				<th>Reg number</th>
				<th>Name</th>
				<th>ID number</th>
				<th>Gender</th>
				<th>Course</th>
				<th>School</th>
				<th>Campus</th>
				<th>Phone number</th>
				<th>Registration Date</th>
				<th>In any Treatment</th>

			</tr>

			<?php
			if (isset($_POST["btnSearch"])) {
				$userId = $_POST['search'];
				$query = "SELECT * FROM student_information INNER JOIN medical_information ON medical_information.reg_number = student_information.reg_number INNER JOIN programmes ON student_information.programme_code = programmes.programme_code INNER JOIN schools ON schools.school_code = student_information.school_code WHERE student_information.reg_number = '$userId'";
				$result = mysqli_query($con, $query);
				while ($row = mysqli_fetch_array($result))
					if ($result) { ?>

					<tr>
						<td><?php echo $row['reg_number'] ?></td>
						<td><?php echo $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'] ?></td>
						<td><?php echo $row['id_number'] ?></td>
						<td><?php echo $row['gender'] ?></td>
						<td><?php echo $row['programme_name'] ?></td>
						<td><?php echo $row['school_name'] ?></td>
						<td><?php echo $row['campus'] ?></td>
						<td><?php echo $row['phone_number'] ?></td>
						<td><?php echo date("d-M-y", strtotime($row["registration_date"])); ?></td>

						<td><?php echo $row['in_any_treatment'] ?></td>
					</tr>

					<div class="col-md-4">
						<?php $profile_image = $row["profile_image"] ?>
						<img class="ml-5 mb-5" height='290px' width='250px' src=<?php echo "../images/$profile_image"  ?>>
					</div>

		</table>

<?php



					} else {
						echo "<script>alert('No student found ! Kindly check file again');window.location.href='treat-student.php';</script>";
					}
			}


?>



</div>
<h2 class='bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3'> Treatment History</h2>
	</main>
	</table>
</body>

</html>