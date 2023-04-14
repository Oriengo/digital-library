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
     <title>KISUMU UNIVERSITY</title>
 </head>

 <body>
     <?php include('../common/common-header.php') ?>
     <?php include('../common/lib-adminsidebar.php') ?>

     <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 main-background mb-2 w-100">
         <div class="sub-main">
             <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                 <h4 class="">Loged in as Librarian Admin &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                     <?php $pf_number = $_SESSION['LoginLib-admin'];
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

                 <section>
      <!-- Bar graph for total books in library -->
      <h3>Total Books in Library</h3>
      <canvas id="totalBooks" width="400" height="200"></canvas>
      <script>
        // get the data from the database using PHP
        <?php
                                        $query1 = "SELECT COUNT(book_id) FROM books_details";
                                        $result1 = mysqli_query($con, $query1);
                                        $row = mysqli_fetch_array($result1);
                                        ?>
        var data = <?php echo $row[0] ?>;
        var ctx = document.getElementById("totalBooks").getContext("2d");
        var chart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: data.labels,
            datasets: [{
              label: 'Number of Books',
              data: data.values,
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            }
          }
        });
      </script>
    </section>
    <section>
                 <section class="section">
                     <div class="container-fluid">
                         <div class="row">
                             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center">
                                 <a class="dashboard-stat bg-white" href=" ">
                                     <?php
                                        $query1 = "SELECT COUNT(book_id) FROM books_details";
                                        $result1 = mysqli_query($con, $query1);
                                        $row = mysqli_fetch_array($result1);
                                        ?>
                                     <span class="bg-icon"><i class="fa fa-users"></i></span>
                                     <span class="number counter"><?php echo htmlentities($row[0]); ?></span>
                                     <span class="name">Total Books</span>

                                 </a>
                                 <!-- /.dashboard-stat -->
                             </div>
                             <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center">
                                 <a class="dashboard-stat bg-white" href="manage-subjects.php">
                                     <?php
                                        $query1 = "SELECT COUNT(borrowing_id) FROM borrowing_tbl WHERE comments ='Not yet returned' ";
                                        $result1 = mysqli_query($con, $query1);
                                        $row = mysqli_fetch_array($result1);
                                        ?>
                                     <span class="bg-icon"><i class="fa fa-ticket"></i></span>
                                     <span class="number counter"><?php echo htmlentities($row[0]); ?></span>
                                     <span class="name">Borrowed Books</span>

                                 </a>
                                 <!-- /.dashboard-stat -->
                             </div>
                             <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                 <a class="dashboard-stat bg-white" href="manage-classes.php">
                                     <?php
                                        // $sql2 = "SELECT id from  tblclasses ";
                                        // $query2 = $con->prepare($sql2);
                                        // $query2->execute();
                                        // $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
                                        // $totalclasses = $query2->rowCount();
                                        ?><span class="bg-icon"><i class="fa fa-bank"></i></span>
                                     <span class="number counter"><?php echo htmlentities($totalclasses); ?></span>
                                     <span class="name">Total classes listed</span>

                                 </a>
                                 <!-- /.dashboard-stat -->
                             </div>
                             <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center">
                                 <a class="dashboard-stat bg-white" href="manage-results.php">
                                 <?php

$Today = date('y:m:d:h', time());
$new = date('l, F d, Y', strtotime($Today));
$Date = $new;
$query1 = "SELECT COUNT(reg_number) FROM attendance_register WHERE time_in ='$new'";
$result1 = mysqli_query($con, $query1);
$row = mysqli_fetch_array($result1);
echo '<h2><b> Today attendace: &nbsp  ' . $row[0] . '</b></h2>';
?>

                                 </a>
                                 <!-- /.dashboard-stat -->
                             </div>
                             <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                         </div>
     </main>
     <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
     <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
 </body>

 </html>