<?php
session_start();
if (!$_SESSION["LoginAdmin"]) {
	header('location:../login/login.php');
}
require_once "../connection/connection.php";
?>

<!-- delete student -->
<?php
if (isset($_GET['reg_number'])) {
	$reg_number = $_GET['reg_number'];
	$query1 = "DELETE FROM student_information WHERE reg_number='$reg_number'";

	$run1 = mysqli_query($con, $query1);
	if ($run1) {
		header('Location: student.php');
	} else {
		echo "Record not deleted. Frist of all delete record  from the child table then you can delete from here ";
		header('Refresh: 5; url=student.php');
	}
}
?>

<!-- deleting book -->

<?php
if (isset($_GET['book_id'])) {
	$book_id = $_GET['book_id'];
	$query1 = "DELETE FROM books_details WHERE book_id='$book_id'";

	$run1 = mysqli_query($con, $query1);
	if ($run1) {
		header('Location: register-books.php');
	} else {
		echo "Record not deleted. Frist of all delete record  from the child table then you can delete from here ";
		header('Refresh: 5; url=student.php');
	}
}
?>
<!-- deleting book ends here -->


<!-- --------------------------------Delete Course------------------------------------- -->
<?php
if (isset($_GET['course_code'])) {
	$course_code = $_GET['course_code'];
	$query2 = "delete from courses where course_code='$course_code'";
	$run2 = mysqli_query($con, $query2);
	if ($run2) {
		header('Location: courses.php');
	} else {
		echo "Record not deleted";
	}
}
?>
<!-- --------------------------------Delete Subject------------------------------------- -->
<?php
if (isset($_GET['subject_code'])) {
	$subject_code = $_GET['subject_code'];
	$query3 = "DELETE FROM course_subjects WHERE subject_code='$subject_code'";
	$run3 = mysqli_query($con, $query3);
	if ($run3) {
		header('Location: subjects.php');
	} else {
		echo "Record not deleted";
	}
}
?>
<!-- --------------------------------Delete Teacher------------------------------------- -->
<?php
if (isset($_GET['teacher_id'])) {
	$teacher_id = $_GET['teacher_id'];
	$query3 = "delete from teacher_info where teacher_id='$teacher_id'";
	$run3 = mysqli_query($con, $query3);
	if ($run3) {
		header('Location: teacher.php');
	} else {
		echo "Record not deleted";
	}
}
?>
<?php
if (isset($_GET['school_code'])) {
	$school_code = $_GET['school_code'];
	$query3 = "DELETE FROM schools WHERE school_code='$school_code'";
	$run3 = mysqli_query($con, $query3);
	if ($run3) {
		header('Location: schools.php');
	} else {
		echo "Record not deleted";
	}
}
?>