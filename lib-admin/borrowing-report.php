<!---------------- Session starts form here ----------------------->
<?php
session_start();
if (!$_SESSION["LoginLib-admin"]) {
	header('location:../login/login.php');
}
require_once "../connection/connection.php";
?>
<!---------------- Session Ends form here ------------------------>
<html lang="en">

<head>
	<title>Kisumu University</title>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
	<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</head>
<?php include('../common/common-header.php') ?>
<?php include('../common/librarian-sidebar.php') ?>

<body>

	<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
		<div class="sub-main">
			<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
				<h4>Library Reports </h4>
			</div>
			<style>
				h2 {
					background: orange;
					padding: 15px;
				}

				#links {
					display: inline;
				}

				a {
					text-decoration: none;

				}
			</style>
			<!-- code to get todays date and counts the ooks issued that day -->
			<div class='links'>
				<h2><a href="borrowing-report.php">Borrowing Reports</a>
			</div>


			<table id="booking-table" class="w-100 table-elements mb-3 table-three-tr text-left" cellpadding="10">
				<thead>
					<tr class="table-tr-head table-three text-white">
						<th>No</th>
						<th>Book Id</th>
						<th>Book Name</th>
						<th>Borrowing Id</th>
						<th>Borrowed by</th>
						<th>Registration NO.</th>
						<th>Phone Numer</th>
						<th>Issued Date</th>
						<th>Return Date</th>
						<th>Comments</th>
						<th>Signature</th>
					</tr>

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
				</thead>
				<?php
				$query = "SELECT * FROM borrowing_tbl INNER JOIN books_details ON books_details.book_id=borrowing_tbl.book_id INNER JOIN student_information ON student_information.reg_number = borrowing_tbl.reg_number ORDER BY comments";
				$result = mysqli_query($con, $query);
				$sr = 1;
				if ($result) {
					while ($row = mysqli_fetch_assoc($result)) {
						$book_id = $row['book_id'];
						$book_name = $row['book_name'];
						$author = $row['author'];
						$borrowing_id = $row['borrowing_id'];
						$first_name = $row['first_name'];
						$middle_name = $row['middle_name'];
						$last_name = $row['last_name'];
						$phone_number = $row['phone_number'];
						$borrow_date = date("d-m-Y", strtotime($row['borrow_date']));
						$return_date = date("d-m-Y", strtotime($row["return_date"]));
						$comments = $row['comments'];
						$reg_number = $row['reg_number'];

                           
						$givenDate =  $return_date;
						$daysBetween = getDaysBetweenDates($givenDate);
						if ($comments == "Returned.") {
							$value = 'Okay';
						}
						if ($comments !== "Returned.") {
							$value = 'Overdue by ' . $daysBetween . ' ' . 'Days';
						}
						if ($daysBetween <= 0 && $comments !== "Returned.") {
							$value = 'Within timeframe';
						}
	



						echo '<tr>
				  <td>' . $sr . '</td>
                  <td>' . $book_id . '</td>
                  <td> ' . $book_name . '</td>
                  <td>' . $borrowing_id . '</td>
                  <td>' . $first_name . " " . $middle_name . " " . $last_name . '</td>
				  <td>' . $reg_number . '</td>
                  <td>' . $phone_number . '</td>
                  <td>' . $borrow_date . '</td>
		          <td>' . $return_date . '</td>
				  <td>' . $comments . '</td>
				  <td>' . $value . '</td>
                  </tr>';
						$sr++;
					}
				}

				?>
			</table>


		</div>

		</div>

		<a href="library-reports.php">Back </a>
		<button class="bg-success text-white"><a href="sms.php">Send Reminders</a></button>
		<script>
			$(document).ready(function() {
				$('#booking-table').DataTable();
			});
		</script>