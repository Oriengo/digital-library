 <!---------------- Session starts form here ----------------------->
 <?php
    session_start();
    if (!$_SESSION["LoginLibrarian"]) {
        header('location:../login/login.php');
    }
    require_once "../connection/connection.php";
    ?>
 <!---------------- Session Ends form here ------------------------>


 <html lang="en">

 <head>
     <title>KISUMU UNIVERSITY</title>
 </head>

 <body>
     <?php include('../common/common-header.php') ?>
     <?php include('../common/librarian-sidebar.php') ?>

     <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 main-background mb-2 w-100">
         <div class="sub-main">
             <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                 <h4 class="">Loged in as Librarian &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                     <?php $pf_number = $_SESSION['LoginLibrarian'];
                        $query = "SELECT * FROM  employees_tbl WHERE pf_number ='$pf_number'";
                        $run = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($run)) {
                            echo $row['first_name'] . " " . $row['last_name'];
                        }
                        ?> </h4>
             </div>
             <div class="main-page">
                 <div class="container-fluid">
                     <div class="row page-title-div">
                         <div class="col-sm-6">
                             <h1 class="center"> Welcome to Digital Library</h1>

                         </div>
                         <!-- /.col-sm-6 -->
                     </div>
                     <!-- /.row -->

                 </div>
                 <section class="mt-3">
							<div class="btn btn-block table-two text-light d-flex">
								<span class="font-weight-bold"><i class="fa fa-file-text-o mr-3" aria-hidden="true"></i>Library Reports Overview</span>
								<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapseOne"><i class="fa fa-plus text-light" aria-hidden="true"></i></a>

							</div>
							<div class="collapse show mt-2" id="collapseOne">
								<table class="w-100 table-elements table-two-tr" cellpadding="2">
									<tr class="pt-5 table-two text-white" style="height: 32px;">
										<th>Total Books</th>
										<th>Borrowed Books</th>
										<th>No of reserved spaces</th>
										<th>Today Library attendance</th>
									</tr>
									
										<tr>
                                        <?php
                                        $query1 = "SELECT COUNT(book_id) FROM books_details";
                                        $result1 = mysqli_query($con, $query1);
                                        $row = mysqli_fetch_array($result1);
                                        ?>
           
											<td><?php echo htmlentities($row[0]); ?></td>
                                        <?php
                                        $query1 = "SELECT COUNT(borrowing_id) FROM borrowing_tbl WHERE comments ='Not yet returned' ";
                                        $result1 = mysqli_query($con, $query1);
                                        $row = mysqli_fetch_array($result1);
                                        ?>
											<td><?php echo htmlentities($row[0]); ?></td>


                                            <?php
                                        $today = date('Y-m-d', time());
                                        $query1 = "SELECT COUNT(booking_id) FROM space_bookig WHERE booked_date = '$today' ";
                                        $result1 = mysqli_query($con, $query1);
                                        $row = mysqli_fetch_array($result1);
                                        ?>
											<td><?php echo htmlentities($row[0]); ?></td>


                                            <?php
                                         $today = date('y:m:d', time());
                                         $query1 = "SELECT COUNT(reg_number) FROM attendance_register  WHERE time_in = '$today'";
                                         $result1 = mysqli_query($con, $query1);
                                         $row = mysqli_fetch_array($result1);
                                         ?>
											<td><?php echo htmlentities($row[0]); ?></td>
										</tr>
								
								</table>
							</div>
						</section>
                 <section class="section">
                     <div class="container-fluid">
                         <div class="row">
                             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center">
                                 <a class="dashboard-stat bg-white" href=" ">
                                   

                                 </a>
                                 <!-- /.dashboard-stat -->
                             </div>
                             <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center">
                                 <a class="dashboard-stat bg-white" href="manage-subjects.php">
                                    
                                 </a>
                                 <!-- /.dashboard-stat -->
                             </div>
                             <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                 <a class="dashboard-stat bg-white" href="manage-classes.php">
                                    
                                 </a>
                                 <!-- /.dashboard-stat -->
                             </div>
                             <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                         </div>
     </main>
     <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
     <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
 </body>

 </html>