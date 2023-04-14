 <!---------------- Session starts form here ----------------------->
 <?php
	session_start();
	if (!$_SESSION["LoginLib-admin"]) {
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";
	require_once "../login/loggers.php";
	?>
 <!---------------- Session Ends form here ------------------------>

 <!---------------- Session starts form here ----------------------->

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
 				<h4>Ammend Books </h4>
 			</div>

 			<!-- form to accept book id  for searching stat here -->
 			<form action=" " method="post">
 		</div>
 		<div class="form-group col-md-3">
 			<label for="exampleInputPassword1">
 				<h5>Enter Book Id:</h5>
 			</label>
 			<div class="d-flex md-3">
 				<input type="text" name="book_id" id="search" class="form form-control" placeholder="Book Id">
 			</div>
 			<br>
 			<div class='form-group'>
 				<input class="btn btn-primary px-4 ml-4" type="submit" name="btnSearch" value="Search">
 			</div>
 		</div>
 		</form>
 		<!-- End of the form  -->



 		<form action="" method="POST" enctype="multipart/form-data">
 			<?php
				// to check whether the varriable has been declared
				if (isset($_POST["btnSearch"])) {
					$book_id = $_POST['book_id'];
					$query = "SELECT * FROM books_details  WHERE book_id = '$book_id'";
					$result = mysqli_query($con, $query);
					while ($row = mysqli_fetch_array($result))
						if ($result) { ?>
 					<h3 class="modal-header bg-info text-white ">Books Details</h3>
 					<div class="row">
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputEmail1">Book Id: </label>
 								<input type="text" name="book_id" class="form-control" value="<?php echo $row['book_id'] ?>">
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1">Book name:</label>
 								<input type="text" name="book_name" class="form-control" value="<?php echo $row['book_name'] ?>">
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1" required>Author:</label>
 								<input type="text" name="author" class="form-control" value="<?php echo $row['author'] ?>">
 							</div>
 						</div>
 					</div>

 					<div class="row">
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputEmail1">Title:</label>
 								<input type="text" name="title" class="form-control" value="<?php echo $row['title'] ?>">
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1">Publication:</label>
 								<input type="text" name="publication" class="form-control" value="<?php echo $row['publication'] ?>">
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1">Number of copies:</label>
 								<input type="number" name="copies" class="form-control" value="<?php echo $row['copies'] ?>">
 							</div>
 						</div>
 					</div>

 					<div class="row">
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputEmail1">Section/Dpartment:</label>
 								<input type="text" name="section" class="form-control" value="<?php echo $row['sections'] ?>">
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1">Price:</label>
 								<input type="number" name="price" class="form-control" value="<?php echo $row['price'] ?>">
 							</div>
 						</div>
 						<div class="col-md-4">
 							<div class="form-group">
 								<label for="exampleInputPassword1">Status:</label>
 								<input type="text" name="status" class="form-control" name="status" value="<?php echo $row['status'] ?>">
 							</div>
 						</div>

 					</div>




 					<div>


 						<div class="row mt-3">
 							<div class="col-lg-6 col-md-6 offset-4">
 								<input type="submit" name="sub" type="submit" class="btn btn-primary" value="Update book Details">
 							</div>
 						</div>


 					<?php } else {
							echo "NO book found";
						}


						?>
 				<?php



				}

				// }


					?>


 		</form>



 		<?php

			// check whether sub  varriable is declared

				if (isset($_POST['sub'])) {
					$book_id = $_POST['book_id'];
					$book_name = $_POST['book_name'];
					$author = $_POST['author'];
					$title = $_POST['title'];
					$publication = $_POST['publication'];
					$copies = $_POST['copies'];
					$section = $_POST['section'];
					$price = $_POST['price'];
					$status = $_POST['status'];
					// $phone_number=$_POST['phone_number'];

					$query = "UPDATE `books_details` SET `book_id`='$book_id',`book_name`='$book_name',`author`='$author',`title`='$title',`publication`='$publication',`copies`='$copies',`sections`='$section',`price`='$price',`status`='$status' WHERE  book_id = '$book_id' ";
					$run = mysqli_query($con, $query);
					if ($run) {  ?>
 				<script type="text/javascript">
 					alert("Books updated succesfully");
					 $log = "Librarian of Pf number ammended a book succesfully";
 					logger($log);
 				</script>
 			<?php } else { ?>
 				<script type="text/javascript">
 					alert("Book data has not been updated due to some errors");
 				</script>
 		<?php }
				}
			?>