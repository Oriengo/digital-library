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
date_default_timezone_set('AFRICA/NAIROBI');
?>


<!doctype html>
<html lang="en">

<head>
	<title>Student - Results</title>
</head>

<body>
	<?php include('../common/common-header.php') ?>
	<?php include('../common/student-sidebar.php') ?>

	<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
		<div class="sub-main">
			<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
				<h4 class="">Student Result Summary</h4>
			</div>
			<div class="row">
				<div class="col-md-12">
					<section class="mt-3">
						<table class="w-100 table-elements mb-5 table-three-tr" cellpadding="10">
							<tr class="text-center text-white table-three table-tr-head">
								<th>Course</th>
								<th>Unit</th>
								<th>Hours</th>
								<th>Cat Marks</th>
								<th>Exam marks</th>
								<th>Total Marks</th>
								<th>Grade</th>
								<th>Weight</th>
							</tr>
							<?php
							$cgpa = 0;
							$gpa = 0;
							$total_marks = 0;
							$obtain_marks = 0;
							$count = 0;
							$reg_number = $_SESSION['LoginStudent'];
							$query = "SELECT * from class_result cr inner join course_subjects cs on cr.subject_code=cs.subject_code where cr.reg_number='$reg_number'";
							$run = mysqli_query($con, $query);
							while ($row = mysqli_fetch_array($run)) { ?>
								<tr class="text-center">
									<td><?php echo $row['course_code'] . "-" . $row['semester'] ?></td>
									<td><?php echo $row['course_code'] ?></td>
									<td><?php echo $row['subject_code'] ?></td>
									<td><?php echo $row['credit_hours'] ?></td>
									<td><?php echo $row['total_marks'] ?></td>
									<td><?php echo $row['obtain_marks'] ?></td>
									<?php
									if ($row['obtain_marks'] > 85) {
										$grade = 'A+';
										$credits = 4.0;
									} else if ($row['obtain_marks'] > 80) {
										$grade = 'A';
										$credits = 4.0;
									} else if ($row['obtain_marks'] > 75) {
										$grade = 'B+';
										$credits = 3.7;
									} else if ($row['obtain_marks'] > 70) {
										$grade = 'B';
										$credits = 3.3;
									} else if ($row['obtain_marks'] > 65) {
										$grade = 'C+';
										$credits = 3.0;
									} else if ($row['obtain_marks'] > 60) {
										$grade = 'C';
										$credits = 2.7;
									} else if ($row['obtain_marks'] > 55) {
										$grade = 'D+';
										$credits = 2.5;
									} else if ($row['obtain_marks'] > 50) {
										$grade = 'D';
										$credits = 2.0;
									} else {
										$grade = 'F';
										$credits = 0.0;
									}
									?>
									<td><?php echo $grade ?></td>
									<td><?php echo $credits ?></td>
								</tr>
							<?php
								$count++;
								$score = $credits * $row['credit_hours'];
								$gpa = $gpa + $score;
								$cgpa = $cgpa + $row['credit_hours'];
								$obtain_marks = $obtain_marks + $row['obtain_marks'];
								$total_marks = $total_marks + $row['total_marks'];
							}
							?>
							<tr class=" text-white bg-success text-center">
								<td><?php echo "1." ?></td>
								<td><?php echo "FINAL RESULT " ?></td>
								<td><?php echo "45" ?></td>
								<td><?php echo "26" ?></td>
								<td><?php echo "54" ?></td>
								<td><?php echo "80"; ?></td>
								<?php
								$marks_grade = $total_marks == true ? ($obtain_marks * 100) / $total_marks : "";
								$marks_grade = ($marks_grade);
								if ($marks_grade > 85) {
									$final = 'A+';
								} else if ($marks_grade > 80) {
									$final = 'A';
								} else if ($marks_grade > 75) {
									$final = 'B+';
								} else if ($marks_grade > 70) {
									$final = 'B';
								} else if ($marks_grade > 65) {
									$final = 'C+';
								} else if ($marks_grade > 60) {
									$final = 'C';
								} else if ($marks_grade > 55) {
									$final = 'D+';
								} else if ($marks_grade > 50) {
									$final = 'D';
								} else {
									$marks_grade == true ? $final = 'F' : $final = "0";
								}
								?>
								<td><?php echo "A" ?></td>
								<td><?php echo $gpa > 0 ? round($total_cgpa = $gpa / $cgpa, 2) : "Excellent" ?></td>

							</tr>
						</table>
					</section>
				</div>
			</div>
		</div>
		</div>
</body>

</html>