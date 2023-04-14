 <!---------------- Session starts form here ----------------------->
 <?php
	session_start();
	if (!$_SESSION["LoginLibrarian"]) {
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
 	<title>Kisii University</title>
 </head>
 <?php include('../common/common-header.php') ?>
 <?php include('../common/librarian-sidebar.php') ?>

 <body>

 	<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
 		<div class="sub-main">
 			<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
 				<h4>Recieve a borrowed Books </h4>
 			</div>

 			<!-- code to get todays date and counts the books received that day -->
 			<style>
 				h2 {
 					background: orange;
 					padding: 15px;
 				}
 			</style>
 			<?php

				$Today = date('y:m:d', time());
				$new = date('l, F d, Y', strtotime($Today));
				$Date = $new;
				$query1 = "SELECT COUNT(borrowing_id) FROM borrowing_tbl WHERE return_date ='$new' AND comments= 'Returned' ";
				$result1 = mysqli_query($con, $query1);
				$row = mysqli_fetch_array($result1);
				echo '<h2><b>Recieved today: &nbsp  ' . $row[0] . '</b></h2>';
				?>

 			<div class="col-md-6">



 				<!-- form to recieve books and personal detail infromation -->
 				<form action=" " method="post">
 					<div class="form-group">
 						<label for="exampleInputPassword1">
 							<h5>Enter Borrowing Id:</h5>
 						</label>
 						<div class="d-flex">
 							<input type="text" name="search" id="search" class="form form-control" placeholder="Borrowing Id">
 						</div>
 						<!-- altenative search potion by book id   -->
 					</div>
 					<div class="form-group">
 						<label for="exampleInputPassword1">
 							<h5>Enter Book Id:</h5>
 						</label>
 						<div class="d-flex">
 							<input type="text" name="book_id" id="search" class="form form-control" placeholder="Book Id">

 						</div>
 						<br>
 						<div class='form-group'>
 							<input class="btn btn-primary px-4 ml-4" type="submit" name="btnSearch" value="Search">
 						</div>
 					</div>
 				</form>

 				<!-- form to recieve books and personal detail infromation ends here -->
 			</div>

 		</div>


		 <?php

//  function to get time difference starrts here//
function getDaysBetweenDates($givenDate)
{
	// Convert given date to a timestamp
	$givenTimestamp = strtotime($givenDate);
	// Get current timestamp
	$currentTimestamp = time();
	// Calculate the difference in seconds
	$differenceInSeconds = $currentTimestamp - $givenTimestamp;
	// Calculate the difference in days
	$differenceInDays = $differenceInSeconds / (60 * 60 * 24);
	// Round to the nearest integer
	$differenceInDays = round($differenceInDays);
	if ($differenceInDays == 0) {
	} else {
		return $differenceInDays;
	}
}
?>




 		<form action="receive-booksv.php " method="POST" enctype="multipart/form-data">
 			<?php
				if (isset($_POST["btnSearch"])) {
					$borrowing_id = $_POST['search'];
					$query = "SELECT * FROM borrowing_tbl  INNER JOIN student_information ON borrowing_tbl.reg_number = student_information.reg_number WHERE borrowing_id = '$borrowing_id'";


					$result = mysqli_query($con, $query);
					while ($row = mysqli_fetch_array($result))
						if (mysqli_num_rows($result) > 0) { ?>

 					<style>


 					</style>
 					<div class="row">
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputEmail1">Registartion Number:</label>
 								<input type='text' readonly name="reg_number" class="form-control" value="<?php echo $row['reg_number'] ?>">
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1">Borrowing Id :</label>
 								<input type='text' name="borrowing_id" class="form-control" readonly value="<?php echo $row['borrowing_id'] ?>">
 							</div>
 						</div>
						
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1">Charges:</label>
 								<input disabled name="phone_number" class="form-control" value="<?php echo 0 ?>">
 							</div>
 						</div>
 					</div>





 					<!-- code to display current date start here -->
 					<?php
							$Today = date('y:m:d', time());
							$new = date('l, F d, Y', strtotime($Today));
							$Date = $new;

							$newDate = date('l, F d, Y', strtotime($Date . ' + 4 days'));
							// Add days to date and display it
						?>


 					<div class="row">
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputEmail1">Borrowing date:</label>
 								<input disabled class="form-control" value="<?php echo $row['borrow_date'] ?>">
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1">Period :</label>
 								<input disabled name="period" class="form-control" value="<?php echo '4 Days' ?>">
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1">Return Date:</label>
 								<input disabled class="form-control" required readonly value="<?php echo $row['return_date'] ?>">
 							</div>
 						</div>
 					</div>
 					<div class="row">
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputEmail1">Status:</label>
 								<input disabled class="form-control" value="<?php echo $row['status'] ?>">
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1">Comment:</label>
 								<input disabled class="form-control" value="<?php echo $row['comments'] ?>">
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1">Date today:</label>
 								<input type='text' readonly class="form-control" name="return_date" value="<?php echo $new ?>">
 							</div>
 						</div>
 					</div>
 					<div class="row">
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputEmail1">Status:</label>
 								<select class="browser-default custom-select" name="status" required ?>"
 									<!-- <option>Select Title</option> -->
 									<option value="Available">Available</option>
 									<option value="Borrowed">Borrowed</option>
 								</select>
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1">Comment:</label>
 								<select class="browser-default custom-select" name="comments" required ?>"
 									<!-- <option>Select Title</option> -->
 									<option value="Returned.">Returned</option>
 									<option value="Not yet returned">Not yet returned</option>
 								</select>
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1">Book Id:</label>
 								<input type='text' readonly class="form-control" name='book_id' value="<?php echo $row['book_id'] ?>">
 							</div>
 						</div>
 					</div>


 					<div class="row mt-3">
 						<div class="col-lg-6 col-md-6 offset-4">
 							<input type="submit" name="sub" type="submit" class="btn btn-primary" value="Recieve a Book">
 						</div>
 					</div>

 			<?php

						}
				}


				?>
 			<br>
 			<br>

 			<!-- code to get book info from the database  starts here-->
 			<!-- <h3 class="modal-header bg-info text-white ">Books Details</h3> -->
 			<?php
				if (isset($_POST["btnSearch"])) {
					$book_id = $_POST['book_id'];
					$query = "SELECT * FROM borrowing_tbl INNER JOIN books_details ON books_details.book_id=borrowing_tbl.book_id WHERE books_details.book_id = '$book_id' AND borrowing_tbl.comments ='Not yet returned' ";
					$result = mysqli_query($con, $query);
					while ($row = mysqli_fetch_array($result))
						if (mysqli_num_rows($result) > 0) { ?>



 					<div class="row">
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputEmail1">Registartion Number:</label>
 								<input type='text' readonly name="reg_number" class="form-control" value="<?php echo $row['reg_number'] ?>">
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1">Borrowing Id :</label>
 								<input type='text' name="borrowing_id" class="form-control" readonly value="<?php echo $row['borrowing_id'] ?>">
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1">Charges:</label>
 								<input disabled name="phone_number" class="form-control" value="<?php echo 0 ?>">
 							</div>
 						</div>
 					</div>





 					<!-- code to display current date start here -->
 					<?php


						?>


 					<div class="row">
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputEmail1">Borrowing date:</label>
 								<input disabled class="form-control" value="<?php echo $row['borrow_date'] ?>">
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1">Period :</label>
 								<input disabled name="period" class="form-control" value="<?php echo '7 Days' ?>">
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1">Return Date:</label>
 								<input disabled class="form-control" required readonly value="<?php echo $row['return_date'] ?>">
 							</div>
 						</div>
 					</div>
 					<div class="row">
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputEmail1">Status:</label>
 								<input disabled class="form-control" value="<?php echo $row['status'] ?>">
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1">Comment:</label>
 								<input disabled class="form-control" value="<?php echo $row['comments'] ?>">
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1">Date today:</label>
 								<input type='text' readonly class="form-control" name="return_date" value="<?php echo $new ?>">
 							</div>
 						</div>
 					</div>
 					<div class="row">
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputEmail1">Status:</label>
 								<select class="browser-default custom-select" name="status" required ?>"
 									<!-- <option>Select Title</option> -->
 									<option value="Available">Available</option>
 									<option value="Borrowed">Borrowed</option>
 								</select>
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1">Comment:</label>
 								<select class="browser-default custom-select" name="comments" required ?>"
 									<!-- <option>Select Title</option> -->
 									<option value="Returned.">Returned</option>
 									<option value="Not yet returned">Not yet returned</option>
 								</select>
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1">Book Id:</label>
 								<input type='text' readonly class="form-control" name='book_id' value="<?php echo $row['book_id'] ?>">
 							</div>
 						</div>
 					</div>


 					<div class="row mt-3">
 						<div class="col-lg-6 col-md-6 offset-4">
 							<input type="submit" name="sub" type="submit" class="btn btn-primary" value="Recieve a Book">
 						</div>
 					</div>
 			<?php



						}
					if (mysqli_num_rows($result) == 0) {
						echo '<h3 class="bg-warning p-4">No booking records found with book of id' . " " . $book_id;
					}
				}


				?>

 		</form>