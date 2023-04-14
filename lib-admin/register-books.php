 <!---------------- Session starts form here ----------------------->
 <?php
	session_start();
	if (!$_SESSION["LoginLib-admin"]) {
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";
	?>
 <!---------------- Session Ends form here ------------------------>

 <!-- code to insert book details into database -->
 <?php
	if (isset($_POST['btn_save'])) {
		$book_id = $_POST['book_id'];
		$book_name = $_POST['book_name'];
		$author = $_POST['author'];
		$title = $_POST['title'];
		$publication = $_POST['publication'];
		$copies = $_POST['copies'];
		$section = $_POST['section'];
		$price = $_POST['price'];
		$status = $_POST['status'];


		$query = "INSERT INTO `books_details`(`book_id`, `book_name`, `author`, `title`, `publication`, `copies`, `sections`, `price`, `status`)
        VALUES('$book_id','$book_name','$author','$title','$publication','$copies','$section','$price','$status')";
		$run = mysqli_query($con, $query);
		if ($run) {
			header('Location: register-books.php');
		} else {
			echo "Your Data has not been submitted";
		}
	}
	?>
 <!-- code to insert book details into database ends here-->




 <!doctype html>
 <html lang="en">

 <head>
 	<title>Kisumu University</title>
 </head>
 <?php include('../common/common-header.php') ?>
 <?php include('../common/lib-adminsidebar.php') ?>

 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">   -->

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <body>


 	<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
 		<div class="sub-main">
 			<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
 				<h4>Register Book </h4>


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
 			<!-- code to get todays date and counts the books issued that day -->
 			<div class='links'>
 				<h2><a href="bulk-bookenrolment.php"><button class="btn btn-primary px-4 ml-4"> Bulk Registration </button> </a> &nbsp &nbsp<button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".bd-example-modal-lg">Add single book</button></h2>
 			</div>
 			<div class="col-md-2 pt-3 w-100">
 				<!-- Large modal -->
 				<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 					<div class="modal-dialog modal-lg">
 						<div class="modal-content">
 							<div class="modal-header bg-info text-white">
 								<h4 class="modal-title text-center">Add New Book</h4>
 							</div>
 							<div class="modal-body">
 								<form action="" method="POST" enctype="multipart/form-data">
 									<div class="row mt-3">
 										<div class="col-md-4">
 											<div class="form-group">
 												<label for="exampleInputEmail1">Book Id: </label>
 												<input type="text" name="book_id" class="form-control" required>
 											</div>
 										</div>
 										<div class="col-md-4">
 											<div class="form-group">
 												<label for="exampleInputPassword1">Book name:</label>
 												<input type="text" name="book_name" class="form-control">
 											</div>
 										</div>
 										<div class="col-md-4">
 											<div class="form-group">
 												<label for="exampleInputPassword1" required>Author:</label>
 												<input type="text" name="author" class="form-control">
 											</div>
 										</div>
 									</div>
 									<div class="row">
 										<div class="col-md-4">
 											<div class="form-group">
 												<label for="exampleInputEmail1">Title:</label>
 												<input type="text" name="title" class="form-control" required>
 											</div>
 										</div>
 										<div class="col-md-4">
 											<div class="form-group">
 												<label for="exampleInputPassword1">Publication:</label>
 												<input type="text" name="publication" class="form-control">
 											</div>
 										</div>
 										<div class="col-md-4">
 											<div class="form-group">
 												<label for="exampleInputPassword1">Number of copies:</label>
 												<input type="number" name="copies" class="form-control" required>
 											</div>
 										</div>
 									</div>
 									<div class="row">
 										<div class="col-md-4">
 											<div class="form-group">
 												<label for="exampleInputEmail1">Section/Dpartment:</label>
 												<input type="text" name="section" class="form-control" required>
 											</div>
 										</div>
 										<div class="col-md-4">
 											<div class="form-group">
 												<label for="exampleInputPassword1">Price:</label>
 												<input type="number" name="price" class="form-control">
 											</div>
 										</div>
 										<div class="col-md-4">
 											<div class="form-group">
 												<label for="exampleInputPassword1">Status:</label>
 												<input type="text" name="status" class="form-control" required>
 											</div>
 										</div>
 									</div>


 									<div class="modal-footer">
 										<input type="submit" class="btn btn-primary" name="btn_save">
 										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 									</div>
 								</form>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 		<div class="col-md-6">
 			<form action=" " method="post">
 				<div class="form-group">
 					<label for="exampleInputPassword1">
 						<h5>Enter Book Id:</h5>
 					</label>
 					<div class="d-flex">
 						<input type="text" name="search" id="search" class="form form-control" placeholder="Book Id">
 						<input class="btn btn-primary px-4 ml-4" type="submit" name="btnSearch" value="Search">
 					</div>

 				</div>
 			</form>

 		</div>
 		</div>
 		<!-- </div>       -->




 		</div>
 		<!-- Code to count books in the library -->
 		<?php
			$query1 = "SELECT COUNT(book_id) FROM books_details";
			$result1 = mysqli_query($con, $query1);
			$row = mysqli_fetch_array($result1);
			echo '<h4> Total Registered Books: &nbsp <b> ' . $row[0] . '</b></h4>';
			?>

 		<h2 class='bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-1 mb-1 text-white admin-dashboard pl-3'> Registered Books</h2>

 		<?php
			if (isset($_GET['pageno'])) {
				$pageno = $_GET['pageno'];
			} else {
				$pageno = 1;
			}
			$no_of_records_per_page = 40;
			$offset = ($pageno - 1) * $no_of_records_per_page;



			$total_pages_sql = "SELECT COUNT(*) FROM books_details";
			$result = mysqli_query($con, $total_pages_sql);
			$total_rows = mysqli_fetch_array($result)[0];
			$total_pages = ceil($total_rows / $no_of_records_per_page);


			?>


 		<nav aria-label="Page navigation example">
 			<ul class="pagination">
 				<li><a href="?pageno=1">First</a></li> &nbsp &nbsp
 				<li class="page-item" <?php if ($pageno <= 1) {
											echo 'disabled';
										} ?>>
 					<a href="<?php if ($pageno <= 1) {
									echo '#';
								} else {
									echo "?pageno=" . ($pageno - 1);
								} ?>">Prev</a>
 				</li> &nbsp &nbsp
 				<li class="<?php if ($pageno >= $total_pages) {
								echo 'disabled';
							} ?>">
 					<a href="<?php if ($pageno >= $total_pages) {
									echo '#';
								} else {
									echo "?pageno=" . ($pageno + 1);
								} ?>">Next</a>
 				</li> &nbsp &nbsp
 				<li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
 			</ul>
 		</nav>


 		<table class="w-100 table-elements mb-5 table-three-tr text-left " cellpadding="10">
 			<tr class="table-tr-head table-three text-white">
 				<th>#</th>
 				<th>Book Id</th>
 				<th>Book Title</th>
 				<th>Publication</th>
 				<th>Section</th>
 				<th>Price</th>
 				<th>Status</th>
 				<th colspan="1">Operations</th>
 			</tr>



 			<?php
				$sql = "SELECT * FROM books_details ORDER BY sections ASC LIMIT $offset, $no_of_records_per_page ";
				$res_data = mysqli_query($con, $sql);
				$sr = 1;
				while ($row = mysqli_fetch_array($res_data)) { ?>
 				<tr class="left">
 					<td><?php echo $sr ?></td>
 					<td><?php echo $row["book_id"] ?></td>
 					<td><?php echo $row["title"] ?></td>
 					<td><?php echo $row["publication"] ?></td>
 					<td><?php echo $row["sections"] ?></td>
 					<td><?php echo $row["price"] ?></td>
 					<td><?php echo $row["status"] ?></td>
 					<td>

 						<?php
							echo "<a class='btn btn-primary btn-sm' href=ammend-book.php?book_id=" . $row['book_id'] . ">Edit</a> 
												<a class='btn btn-danger btn-sm' href=delete-function.php?book_id=" . $row['book_id'] . ">Delete</a> "
							?>

 					</td>

 				</tr>
 			<?php $sr++;
				}
				?>

 		</table>
 		<nav aria-label="Page navigation example">
 			<ul class="pagination">
 				<li><a href="?pageno=1">First</a></li> &nbsp &nbsp
 				<li class="page-item" <?php if ($pageno <= 1) {
											echo 'disabled';
										} ?>>
 					<a href="<?php if ($pageno <= 1) {
									echo '#';
								} else {
									echo "?pageno=" . ($pageno - 1);
								} ?>">Prev</a>
 				</li> &nbsp &nbsp
 				<li class="<?php if ($pageno >= $total_pages) {
								echo 'disabled';
							} ?>">
 					<a href="<?php if ($pageno >= $total_pages) {
									echo '#';
								} else {
									echo "?pageno=" . ($pageno + 1);
								} ?>">Next</a>
 				</li> &nbsp &nbsp
 				<li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
 			</ul>
 		</nav>


 	</main>
 	<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
 	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
 </body>

 </html>