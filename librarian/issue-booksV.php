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
	if (!$_SESSION["LoginLibrarian"]) {
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";

	?>



	<?php



	$pf_number = $_SESSION['LoginLibrarian'];
	$query = "SELECT * FROM  employees_tbl WHERE pf_number ='$pf_number'";
	$run = mysqli_query($con, $query);
	while ($row = mysqli_fetch_array($run)) {
	}


	// include "logga.php";
	require_once "logga.php";
	if (isset($_POST['sub'])) {
		$borrowing_id = $_POST['borrowing_id'];
		$book_id = $_POST['book_id'];
		$reg_number = $_POST['reg_number'];
		$phone_number = $_POST['phone_number'];
		$borrow_date = $_POST['borrow_date'];
		$return_date = $_POST['return_date'];
		$issued_by = $_POST['pf_number'];
		$comments = $_POST['comments'];
		$status = $_POST['status'];

		if ($reg_number == '') {
			echo "<script>alert('The process cannot proceed.<br>Ensure that all fields are correctly captured!');window.location.href='issue-books.php';</script>";
			exit();
		}

		// if($status!="Available"){
		// 	echo "<script>alert('The process cannot proceed.The book is currently onloan!');window.location.href='issue-books.php';</script>";
		// 	exit();
		// }

		$query = "INSERT INTO `borrowing_tbl`(`borrowing_id`, `book_id`, `reg_number`,`borrow_date`, `return_date`,`issued_by` , `comments`) 
        VALUES ('$borrowing_id','$book_id','$reg_number','$borrow_date','$return_date', '$issued_by', '$comments')";
		$run = mysqli_query($con, $query);
		if ($run) {
			$logg = "Librarian pf number $pf_number Issued a book to a student $reg_number";
			logg($logg);

			$to = "oriengoonyango@gmail.com"; // Change this to the student's email address
			$subject = "Book Issued Successfully";
			$message = "Dear Student,\n\nYou have successfully borrowed the following book:\n\nBook ID: $book_id\nBorrow Date: $borrow_date\nReturn Date: $return_date\n\nPlease ensure to return the book on or before the return date.\n\nThank you.\n\nBest regards,\nLibrarian";
			$headers = "From: oritechsolutionss@gmail.com"; // Change this to the librarian's email address
			mail($to, $subject, $message, $headers);

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