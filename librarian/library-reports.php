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
 				<h4>Library Reports </h4>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp;
 				<div class='text-right'>

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
 			<div class=''>

			   
 				<h2><a href="borrowing-report.php">Borrowing Reports</a> 
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
				$query1 = 'SELECT COUNT(borrowing_id) FROM borrowing_tbl WHERE "$new">"return_date" && comments !="Returned" ';
				$result1 = mysqli_query($con, $query1);
				$row = mysqli_fetch_array($result1);
				echo '<h3 class ="repo"> Overdue Borrowed Books:  <b> ' . $row[0] . '</b></h3>';
				?>
 		</div>

		 <br>
		<br>
		<h2>Most Borrowed Books</h2>
		 <table id="booking-table" class="w-100 table-elements mb-3 table-three-tr text-left" cellpadding="10">
  <thead>
    <tr class="table-tr-head table-three text-white">
      <th scope="col">#</th>
      <th scope="col">Book Id</th>
      <th scope="col">Name</th>
      <th scope="col">Section</th>
    </tr>
  </thead>
  <tbody>
    <?php
	
    $query1 = "SELECT borrowing_tbl.book_id, books_details.book_name, books_details.sections, COUNT(*) AS num_borrowed 
    FROM borrowing_tbl 
    INNER JOIN books_details ON borrowing_tbl.book_id = books_details.book_id
    GROUP BY borrowing_tbl.book_id 
    ORDER BY num_borrowed DESC 
    LIMIT 10; ";
    $result1 = mysqli_query($con, $query1);
	$n = 1;
	
    while ($row = mysqli_fetch_array($result1)) {
    ?>
	
      <tr>
        <td><?php echo $n ?></td>
        <td><?php echo  $row['book_id'] ?></td>
        <td><?php echo  $row['book_name'] ?></td>
        <td><?php echo  $row['sections'] ?></td>
      </tr>
	    <?php $n++   ?>
	  
    <?php
    }
	
    ?>
	
  </tbody>
</table>


    <!-- <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
		

			

 SELECT book_id, COUNT(*) AS num_borrowed 
FROM borrowing 
GROUP BY book_id 
ORDER BY num_borrowed DESC 
LIMIT 10; -->
