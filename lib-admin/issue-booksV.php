<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kisumu University</title>
</head>

<body>

	<?php
	session_start();
	if (!$_SESSION["LoginLib-admin"]) {
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";

	?>








	<?php






	$pf_number = $_SESSION['LoginLib-admin'];
	$query = "SELECT * FROM  employees_tbl WHERE pf_number ='$pf_number'";
	$run = mysqli_query($con, $query);
	while ($row = mysqli_fetch_array($run)) {
	}


	// include "logga.php";
	require_once "../login/loggers.php";
	if (isset($_POST['sub'])) {
		$borrowing_id = $_POST['borrowing_id'];
		$book_id = $_POST['book_id'];
		$reg_number = $_POST['reg_number'];
		$phone_number = $_POST['phone_number'];
		$borrow_date = $_POST['borrow_date'];
		$return_date = $_POST['return_date'];
		$issued_by = $_POST['pf_number'];
		$comments = $_POST['comments'];

		$query = "INSERT INTO `borrowing_tbl`(`borrowing_id`, `book_id`, `reg_number`, `phone_number`,`borrow_date`, `return_date`,`issued_by` , `comments`) 
        VALUES ('$borrowing_id','$book_id','$reg_number','$phone_number','$borrow_date','$return_date', '$issued_by', '$comments')";
		$run = mysqli_query($con, $query);
		if ($run) {
			$log = "Librarian pf number $pf_number Issued a book to a student $reg_number";
			logger($log);
			echo "<script>alert('Book issued succesfully!');window.location.href='issue-books.php';</script>";
		} else {
			echo "<script>alert('The procces was not succesfull!');window.location.href='issue-books.php';</script>";
		}
	}
	$book_id = $_POST['book_id'];
	$status = $_POST['status'];
	$query1 = "UPDATE books_details SET status ='$status' WHERE book_id='$book_id'";
	$run = mysqli_query($con, $query1);
	if ($run) {  ?>
		<script type="text/javascript">
			alert("Book data has been updated");
		</script>
	<?php } else { ?>
		<script type="text/javascript">
			alert("Book data has not been updated due to some errors");
		</script>
	<?php }
	?>

</body>

</html>