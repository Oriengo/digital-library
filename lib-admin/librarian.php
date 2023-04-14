<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginLib-admin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
		$_SESSION["LoginStudent"]="";

	?>
<!---------------- Session Ends form here ------------------------>

<?php 
date_default_timezone_set('AFRICA/NAIROBI');
// echo date('h:i:sa');

?>
<!--*********************** PHP code starts from here for data insertion into database ******************************* -->


<!doctype html>
<html lang="en">
	<head>
		<title>Kisumu University</title>
	</head>
	<body>
    <?php include('../common/common-header.php') ?>
    <?php include('../common/lib-adminsidebar.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Library Staffs </h4>
						<button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".bd-example-modal-lg">Add Librarian</button>
					</div>
				</div>
				<div class="col-md-2 pt-3 w-100">
  				    <!-- Large modal -->
					
						        </div>
						    </div>
					   </div>
					</div>
				</div>
				<div class="row w-100">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<div class="row">
								<div class="col-md-6">
									<form action="search_student.php" method="post">
										<div class="form-group">
											<label for="exampleInputPassword1"><h5>Search:</h5></label>
											<div class="d-flex">
												<input type="text" name="search" id="search" class="form form-control" placeholder="Enter I'd">
												<input class="btn btn-primary px-4 ml-4" type="submit" name="btnSearch" value="Search">
											</div>
										</div>
									</form>
								</div>	
								<div class="col-md-12 pt-5 mb-2">
									
										</div>
									</div>
								</div>
							</div>
							<table class="w-100 table-elements mb-3 table-three-tr text-center" cellpadding="10">
								<tr class="table-tr-head table-three text-white">
									<th>PF Number</th>
									<th>Staff Name</th>
									<th>Gender</th>
									<th>Id Number</th>
									<th>Employment type</th>
									<th>Role</th>
									<th>Email Address</th>
									<th colspan="1">Operations</th>
								</tr>
								<?php 
								$query="SELECT * FROM employees_tbl INNER JOIN roles ON employees_tbl.role = roles.role WHERE roles.role =8" ;
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) 
								{?>
									<tr class ='text-left'>
										<td><?php echo $row["pf_number"] ?></td>
										<td><?php echo $row["first_name"]." ".$row["middle_name"]." ".$row["last_name"] ?></td>
										<td><?php echo $row["gender"] ?></td>
										<td><?php echo $row["id_number"] ?></td>
										<td><?php echo $row["emp_type"] ?></td>
										<td><?php echo $row["name"] ?></td>
                                        <td><?php echo $row["email_address"] ?></td>
										<td width='190'> 
											<?php 
												echo "<a class='btn btn-success btn-sm' href=display-student.php?reg_number=".$row['pf_number'].">Manage</a>"
											?>
										</td>
									</tr>
								<?php }
								?>
							</table>				
						</section>
					</div>
				</div>	 
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>