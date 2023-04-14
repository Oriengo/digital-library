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
	<title>Kisii University</title>
</head>

<body>
	<?php include('../common/common-header.php') ?>
	<?php include('../common/student-sidebar.php') ?>
	<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
		<div class="sub-main">
			<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
				<h4 class="">Welcome <b> <?php $reg_number = $_SESSION['LoginStudent'];
											$query = "SELECT * FROM student_information WHERE reg_number='$reg_number'";
											$run = mysqli_query($con, $query);
											while ($row = mysqli_fetch_array($run)) {
												echo $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'];
											}
											?> Dashboard </h4>
				</h4>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-12 col-sm-12">
					<div>
						<section class="mt-3">
							<div class="btn btn-block table-two text-light d-flex">
								<span class="font-weight-bold"><i class="fa fa-file-text-o mr-3" aria-hidden="true"></i>Course Detail</span>
								<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapseOne"><i class="fa fa-plus text-light" aria-hidden="true"></i></a>

							</div>
							<div class="collapse show mt-2" id="collapseOne">
								<table class="w-100 table-elements table-two-tr" cellpadding="2">
									<tr class="pt-5 table-two text-white" style="height: 32px;">
										<th>Course Code</th>
										<th>Name</th>
										<th>School</th>
										<th>Current level</th>
									</tr>
									<?php $reg_number = $_SESSION['LoginStudent'];
									$query = "SELECT * FROM student_information INNER JOIN programmes ON programmes.programme_code = student_information.programme_code INNER JOIN classes ON classes.class_name= student_information.class_name INNER JOIN schools ON schools.school_code = student_information.school_code WHERE reg_number='$reg_number' ";
									$run = mysqli_query($con, $query);
									while ($row = mysqli_fetch_array($run)) { ?>
										<tr>
											<td><?php echo $row['programme_code'] ?></td>
											<td><?php echo $row['programme_name'] ?></td>
											<td><?php echo $row['school_name'] ?></td>
											<td><?php echo $row['level'] ?></td>
										</tr>
									<?php } ?>
								</table>
							</div>
						</section>
					</div>
				</div>
				<div class="col-lg-6 col-md-12 col-md-6 col-sm-12">
					<div>
						<section class="mt-3">
							<div class="btn btn-block table-three text-light d-flex">
								<span class="font-weight-bold"><i class="fa fa-credit-card-alt mr-3" aria-hidden="true"></i>Fee Detail</span>
								<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsetwo"><i class="fa fa-plus text-light" aria-hidden="true"></i></a>

							</div>
							<div class="collapse show mt-2" id="collapsetwo">
								<table class="w-100 table-elements table-three-tr" cellpadding="2">
									<tr class="pt-5 table-three text-white" style="height: 32px;">
										<th>Registration No.</th>
										<th>Total Invoice</th>
										<th>Total Paid</th>
										<th>Ballance</th>

									</tr>
									<?php
									$reg_number = $_SESSION['LoginStudent'];
									$query = "SELECT * FROM student_fee WHERE reg_number = '$reg_number'";
									$run = mysqli_query($con, $query);
									while ($row = mysqli_fetch_array($run)) { ?>
										<tr class="text-left">
											<td><?php echo $row['reg_number'] ?></td>
											<td><?php echo $row['debit'] ?></td>
											<td><?php echo $row['credit'] ?></td>
											<td><?php echo $row['balance'] ?></td>

										</tr>
									<?php
									}
									?>
								</table>
							</div>
						</section>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-12 col-sm-12">
					<div>
						<section class="mt-4">
							<div class="btn btn-block table-five text-light d-flex">
								<span class="font-weight-bold"><i class="fa fa-info-circle mr-3" aria-hidden="true"></i> Current Semester Detail</span>
								<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsethree"><i class="fa fa-plus text-light" aria-hidden="true"></i></a>

							</div>
							<div class="collapse show mt-2" id="collapsethree">
								<table class="w-100 table-elements table-five-tr" cellpadding="2">
									<tr class="pt-5 table-five text-white" style="height: 32px;">
										<th>Subject code</th>
										<th>Subject Name</th>
										<th>Semester</th>
										<th>Marks</th>
									</tr>
									<?php
									$reg_number = $_SESSION['LoginStudent'];
									$max_semester = "SELECT max(semester) as semester from student_courses where reg_number = '$reg_number'";
									$max_run = mysqli_query($con, $max_semester);
									$row = mysqli_fetch_array($max_run);
									$semester = $row['semester'];
									$query = "select * from student_courses inner join course_subjects on student_courses.subject_code=course_subjects.subject_code where student_courses.reg_number='$reg_number' and student_courses.semester = '$semester'";
									$run = mysqli_query($con, $query);
									while ($row = mysqli_fetch_array($run)) { ?>
										<tr>
											<td><?php echo $row['subject_code'] ?></td>
											<td><?php echo $row['subject_name'] ?></td>
											<td><?php echo $row['semester'] ?></td>
											<td>100</td>
										</tr>
									<?php }
									?>
								</table>
							</div>
						</section>
					</div>
				</div>
				<div class="col-lg-6 col-md-12 col-sm-12">
					<div>
						<section class="mt-4">
							<div class="btn btn-block table-one text-light d-flex">
								<span class="font-weight-bold"><i class="fa fa-check-square-o mr-3" aria-hidden="true"></i>Attendance Status</span>
								<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsefour"><i class="fa fa-plus text-light" aria-hidden="true"></i></a>

							</div>
							<div class="collapse show mt-2" id="collapsefour">
								<table class="w-100 table-elements table-one-tr" cellpadding="2">
									<tr class="pt-5 table-one text-white" style="height: 32px;">
										<th>Roll No</th>
										<th>Present</th>
										<th>Absent</th>
										<th>Percentage</th>
									</tr>
									<?php
									$roll_no = $_SESSION['LoginStudent'];
									$query = "SELECT count(attendance_id) as attendance_id,sum(attendance) as attendance,student_id from student_attendance where student_id='$roll_no'";
									$run = mysqli_query($con, $query);
									while ($row1 = mysqli_fetch_array($run)) { ?>
										<tr>
											<td><?php echo $_SESSION['LoginStudent'] ?></td>
											<td><?php echo $row1['attendance'] ? $row1['attendance'] : "0" ?></td>
											<td><?php echo $row1['attendance_id'] - $row1['attendance'] ?></td>
											<?php $attendace =  $row1['attendance_id'] > 0 ? round(($row1['attendance'] * 100) / $row1['attendance_id']) . "%" : "0%" ?>
											<td> <?php echo $attendace ?> </td>
										</tr>
									<?php
									}
									?>
								</table>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>