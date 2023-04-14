 <!---------------- Session starts form here ----------------------->
 <?php
	session_start();
	if (!$_SESSION["LoginLib-admin"]) {
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
 	<title>Kisumu University</title>
 </head>
 <?php include('../common/common-header.php') ?>
 <?php include('../common/lib-adminsidebar.php') ?>

 <body>

 	<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
 		<div class="sub-main">
 			<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
 				<h4>Library Reports </h4>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp;
 				<div class='text-right'>
				 <form style action=" " method="POST" enctype="multipart/form-data">
                    <input type="submit" name="past-papres" type="submit" class="btn btn-primary text-right" value="Single Student report">
                </form>
 				</div>
 			</div>
 			<style>
 				h2 {
 					background: orange;
 					padding: 15px;
 				}

 				.repo {
 					background: #33ccff;
 					padding: 30px;
 				}

 				#links {
 					display: inline;
 				}

 				a {
 					text-decoration: none;
                
 				}
				a:hoover{
				text-decoration: none;
				}
 			</style>
 			<!-- code to get todays date and counts the ooks issued that day -->
 			<div class=''>

			   
 				<h2><a href="borrowing-report.php">Borrowing Reports</a> &nbsp &nbsp<a href="">Return Reports</a>
 				</h2>
 			</div>
 		</div>
 		<!-- </div> -->

 		</div>
 		<div>
 			<!-- Query to select all books in the library -->
 			<?php
				$query1 = "SELECT COUNT(book_id) FROM books_details";
				$result1 = mysqli_query($con, $query1);
				$row = mysqli_fetch_array($result1);
				echo '<h3 class ="repo"> Total Books in Library: &nbsp <b> ' . $row[0] . '</b></h3>';
				?>
 			<!-- ends here </h3> -->
 		</div>
 		<br>

 		<div>
 			<!-- Query to select all books that are currently borrowed -->
 			<?php
				$query1 = "SELECT COUNT(borrowing_id) FROM borrowing_tbl WHERE comments ='Not yet returned' ";
				$result1 = mysqli_query($con, $query1);
				$row = mysqli_fetch_array($result1);
				echo '<h3 class ="repo"> Total Borrowed Books: &nbsp &nbsp &nbsp <b> ' . $row[0] . '</b></h3>';
				?>
 		</div>

 		<br>
 		<div>
 			<?php
				$Today = date('y:m:d', time());
				$new = date('l, F d, Y', strtotime($Today));
				$Date = $new;
				$query1 = "SELECT COUNT(borrowing_id) FROM borrowing_tbl WHERE '$new'<'(return_date)' AND comments !='Returned' ";
				$result1 = mysqli_query($con, $query1);
				$row = mysqli_fetch_array($result1);
				echo '<h3 class ="repo"> Overdue Borrowed Books:  <b> ' . $row[0] . '</b></h3>';
				?>
 		</div>

 		<?php
			$query1 = "SELECT COUNT(reg_number) FROM borrowing_tbl GROUP BY reg_number) ";
			$result1 = mysqli_query($con, $query1);

			echo var_dump($result1);
			?>

 		<!-- SELECT MAX(count) 
FROM (SELECT COUNT(docname) FROM doctor GROUP BY docname) a; -->