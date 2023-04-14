


<!---------------- Session starts form here ----------------------->
<?php
session_start();
if (!$_SESSION["LoginLibrarian"]) {
	header('location:../login/login.php');
}
require_once "../connection/connection.php";
require_once "../login/loggers.php"
?>
<!---------------- Session Ends form here ------------------------>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kisii Univesity</title>
</head>

<body>

</body>

</html>

<?php
$pf_number = $_SESSION['LoginLibrarian'];
$query = "SELECT * FROM  employees_tbl WHERE pf_number ='$pf_number'";
$run = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($run)) {
}

$borrowing_id = $_POST['borrowing_id'];

if (isset($_POST['sub'])) {
	$borrowing_id = $_POST['borrowing_id'];
	$return_date = $_POST['return_date'];
	$book_id = $_POST['book_id'];
	$comments = $_POST['comments'];


	$query = "UPDATE borrowing_tbl SET return_date='$return_date',comments ='$comments' WHERE borrowing_id='$borrowing_id'";
	$run = mysqli_query($con, $query);
	if ($run) {
		$log = "Librarian of Pf number $pf_number received a book of id $book_id succesfully";
		logger($log);
		 echo "<script>alert('Book Recieved succesfully!'); </script>";
	} else {

		echo "<script>alert('Receival process was not succesfull!');window.location.href='recieve-books.php';</script>";
	}



	$query1 = "UPDATE books_details SET status ='Available' WHERE book_id='$book_id'";
	$run = mysqli_query($con, $query1);
	if ($run) {  ?>
		<script type="text/javascript">
			alert('Book data has been updated');
			window.location.href = 'recieve-books.php';
		</script>
	<?php } else { ?>
		<script type="text/javascript">
			alert("Book data has not been updated due to some errors");
		</script>
<?php
 }
 }

?>