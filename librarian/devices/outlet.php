  <!---------------- Session starts form here ----------------------->
  <?php
	session_start();
	if (!$_SESSION["LoginLib-device"]) {
		header('location:../../login/login.php');
	}
	require_once "../../connection/connection.php";
	require_once "../../login/loggers.php";
    date_default_timezone_set('AFRICA/NAIROBI');
    // include('../../common/common-header.php') 
	?>
 <!---------------- Session Ends form here ------------------------>


 

 <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kisumu University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <h4>Kisumu University</h4>
  </head>

     <header>
		<style>
        h2{
			background-color: skyblue;
			text-align: center;
			padding: 20px;
		}
		form{
			padding: 20px;
		}
		body{
			padding: 15px;
			padding-top: 0;
		}
		body header{
			padding: 5px;
		}h4{
			background-color: #4282ad;
			padding: 10px;
			margin-left: 0px;
			text-align: center;
		}

		</style>
		<h2>Outlet</h2>
	 </header>
  <form action=" " method="post" class="text-center">
 					<div class="form-group">
 						<!-- <label for="exampleInputPassword1">
 							<h5>Registartion number:</h5>
 						</label> -->
 						<div class="d-flex">
 							<input type="text" name="search" id="search" class="form form-control" placeholder="Reg number">
 						</div>

 					</div>
 						<br>
 						<div class='form-group'>
 							<input class="btn btn-primary px-4 ml-4" type="submit" name="btnSearch" value="Search">
 						</div>
 					</div>
 				</form>

  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<form action="" method="post">
	  <?php
			if (isset($_POST["btnSearch"])) {
				$reg_number = $_POST['search'];
				$today = date("Y-m-d");
				$query = "SELECT * FROM space_bookig INNER JOIN student_information ON space_bookig.reg_number = student_information.reg_number INNER JOIN programmes ON student_information.programme_code = programmes.programme_code INNER JOIN schools ON schools.school_code = student_information.school_code INNER JOIN campuses ON student_information.campus_id = campuses.campus_id INNER JOIN classes ON student_information.class_name = classes.class_name WHERE student_information.reg_number = '$reg_number' AND booked_date = '$today'LIMIT 1 ";
							$run = mysqli_query($con, $query);
							while ($row = mysqli_fetch_array($run))
							
								if ($run) { ?>
 							<div class="row text-center ">

 								<style>
 									img {
 										border-radius: 50%;
 									}
 								</style>
 								<div class="col-md-4">
						<?php $profile_image = $row["profile_image"] ?>
						<img  height='240px' width='210px' src=<?php echo "../../images/$profile_image"  ?>>
					</div>
 							</div>


 							<div class="row">
 								<div class=" col-lg-6 col-md-6 pr-5">
 									<div class="form-group">
 										<label for="exampleInputEmail1">Name:</label>
 										<input disabled class="form-control" name="first_name" value='<?php echo $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'] ?>'>
 									</div>
 								</div>
 								

 								<div class="col-md-6 pr-5">
 									<div class="form-group">
 										<label for="exampleInputPassword1">Registartion number:</label>
 										<input readonly class="form-control" id="disabledTextInput" name="reg_number" value=<?php echo $row['reg_number'] ?>>
 									</div>
 								</div>
 							</div>

 							<div class="row">
 								<div class="col-md-6 pr-5">
 									<div class="form-group">
 										<label for="exampleInputEmail1">Booking Id</label>
 										<input readonly class="form-control" name="booking_id" value=<?php echo $row['booking_id'] ?>>
 									</div>
 								</div>
 								
 							</div>
 							
 							

								 <div class="row mt-3">
 							<div class="text-center">
 								<input type="submit" name="sub" type="submit" class="btn btn-primary" value="Exit">
 							</div>
 						</div>
 					</div>
 						<?php } ?>
							<?php } ?>
							
							</form>
  </body>


</html>

<?php 
 if(isset($_POST['sub'])){
	$reg_no = $_POST['reg_number'];
	$booking_id = $_POST['booking_id'];
    $current_date = date('Y-m-d H:i:s.u');

 

	
	$query2 = "UPDATE `attendance_register` SET time_out = '$current_date' WHERE booking_id = '$booking_id'  ";
	$result = mysqli_query($con, $query2);
	if($result){
	   echo "<script>alert('Exited out succesfully!');window.location.href='routlet.php';</script>";
		 header('location:outlet.php ');
	}
 }

?>


