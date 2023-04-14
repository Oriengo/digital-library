 <!---------------- Session starts form here ----------------------->
 <?php
    session_start();
    if (!$_SESSION["LoginLibrarian"]) {
        header('location:../login/login.php');
    }
    require_once "../connection/connection.php";
    require_once "../login/loggers.php"
    // include "logga.php";
    ?>
 <!---------------- Session Ends form here ------------------------>

 <?php
    date_default_timezone_set('AFRICA/NAIROBI');
    // echo date('h:i:sa');
    $result = '';
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
                 <h4>Staff Issue Books </h4>
             </div>

             <!-- code to get todays date and counts the ooks issued that day -->
             <style>
                 h2 {
                     background: orange;
                     padding: 15px;
                 }
             </style>
             <?php

                $Today = date('y:m:d', time());
                $new = date('l, F d, Y', strtotime($Today));
                // $Date = $new;
                $query1 = "SELECT COUNT(borrowing_id) FROM borrowing_tbl WHERE borrow_date ='$new'";
                $result1 = mysqli_query($con, $query1);
                $row = mysqli_fetch_array($result1);
                echo '<h2><b> Issued today: &nbsp  ' . $row[0] . '</b></h2>';
                ?>

             <div class="col-md-6">



                 <!-- form to recieve books and personal detail infromation -->
                 <form action=" " method="post">
                     <div class="form-group">
                         <label for="exampleInputPassword1">
                             <h5>Enter staff number:</h5>
                         </label>
                         <div class="d-flex">
                             <input type="text" name="search" id="search" class="form form-control" placeholder="Reg number">
                         </div>

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



         <h3 class="modal-header bg-info text-white ">Staff Details</h3>
         <!-- main form to receive the issued books details -->
         <form action="issue-booksV.php" method="POST" enctype="multipart/form-data">
             <?php
                if (isset($_POST["btnSearch"])) {
                    $userId = $_POST['search'];
                    $query = "SELECT * FROM employees_tbl INNER JOIN roles ON employees_tbl.role = roles.role WHERE pf_number = '$userId' ";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($result))
                        if (mysqli_num_rows($result) > 0) { ?>

                     <style>
                         img {
                             border-radius: 50%;
                         }
                     </style>

                    <!-- code that displays the employees information -->

                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Salutation:</label>
                                 <input disabled autocomplete="on" name="last_name" class="form-control" value="<?php echo $row['title'] ?>">
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="exampleInputPassword1">First Name :</label>
                                 <input disabled name="middle_name" class="form-control" maxlength=10 value="<?php echo $row['first_name'] ?>">
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Last Name:</label>
                                 <input disabled class="form-control" value="<?php echo $row['last_name'] ?>">
                             </div>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Pf Number:</label>
                                 <input type='text' readonly name="reg_number" class="form-control" value="<?php echo $row['pf_number'] ?>">
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Email address:</label>
                                 <input disabled name="school" class="form-control" maxlength=10 value="<?php echo $row['email_address'] ?>">
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Phone number:</label>
                                 <input type='number' readonly name="phone_number" class="form-control" value="<?php echo $row['phone_number'] ?>">
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Role</label>
                                 <input type='text' readonly name="programme_code" class="form-control" value="<?php echo $row['name'] ?>">
                             </div>
                         </div>
                     </div>

             <?php

                        }
                    if (mysqli_num_rows($result) == 0) {
                        echo '<h3 class="bg-warning p-4">No records found for student' . " ";
                    }
                }


                ?>
             <br>
             <br>

             <!-- code to get book info from the database  starts here-->
             <h3 class="modal-header bg-info text-white ">Books Details</h3>
             <?php
                if (isset($_POST["btnSearch"])) {
                    $book_id = $_POST['book_id'];
                    $query = "SELECT * FROM books_details  WHERE book_id = '$book_id'";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($result))

                        if ($row['status'] != "Available") {
                            echo "<script>alert('The process cannot proceed.The book is currently onloan!');window.location.href='issue-books.php';</script>";
                        } else { ?>
                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Book Id:</label>
                                 <input type='text' name="book_id" readonly class="form-control" value="<?php echo $row['book_id'] ?>">
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Book Name :</label>
                                 <input disabled name="book_name" class="form-control" value="<?php echo $row['book_name'] ?>">
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Author:</label>
                                 <input disabled class="form-control" value="<?php echo $row['author'] ?>">
                             </div>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Title:</label>
                                 <input disabled autocomplete="on" name="title" class="form-control" value="<?php echo $row['title'] ?>">
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Publication :</label>
                                 <input disabled name="publication" class="form-control" value="<?php echo $row['publication'] ?>">
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Loan type</label>
                                 <input disabled class="form-control" value="<?php echo $row['loan_type'] ?>">
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
                                 <input type='text' readonly name="borrow_date" class="form-control" value="<?php echo $new ?>">
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">

                                 <?php
                                    if ($row['loan_type'] == 'Long loan') {
                                        $period = 7;
                                    } else {
                                        $period = 4;
                                    }
                                    ?>
                                 <label for="exampleInputPassword1">Period :</label>
                                 <input type='text' readonly name="period" class="form-control" value="<?php echo $period ?>">
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Return Date:</label>
                                 <input type='text' class="form-control" required readonly name="return_date" value="<?php echo $newDate ?>">
                             </div>
                         </div>
                     </div>
                     <!-- code to generate unique borrowing id -->

                     <?php
                            // Get current timestamp in microseconds
                            $timestamp = microtime(true);

                            // Convert timestamp to a string and remove the decimal point
                            $timestamp_str = str_replace('.', '', (string)$timestamp);

                            // Take the first 15 characters of the timestamp string
                            $number = substr($timestamp_str, 0, 15);

                        ?>


                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Borrowing Id:</label>
                                 <input type='text' name="borrowing_id" class="form-control" readonly value="<?php echo $number ?>">
                             </div>
                         </div>
                         <!-- </div> -->
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Status:</label>
                                 <input type='text' class="form-control" required readonly name="status" value="<?php echo $row['status'] ?>">
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Issued by:</label>
                                 <?php
                                    $pf_number = $_SESSION['LoginLibrarian'];
                                    $query = "SELECT * FROM  employees_tbl WHERE pf_number ='$pf_number'";
                                    $run = mysqli_query($con, $query);
                                    while ($row = mysqli_fetch_array($run)) {
                                    }

                                    ?>

                                 <input type='text' class="form-control" required readonly name="pf_number" value="<?php echo $pf_number ?>">
                             </div>
                         </div>

                     </div>
                     <div>
                         <!-- hidden inputs begins here -->
                         <input type="hidden" name="status" value="Borrowed">
                     </div>
                     <div>
                         <input type="hidden" name="comments" value="Not yet returned">
                     </div>

                     <!-- hidden inputs ends here -->
                     <!-- code to get book info from the database  ends here-->

                     <div class="row mt-3">
                         <div class="col-lg-6 col-md-6 offset-4">
                             <input type="submit" name="sub" type="submit" class="btn btn-primary" value="Issue Book">
                         </div>
                     </div>
             <?php



                        }
                    if (mysqli_num_rows($result) == 0) {
                        echo '<h3 class="bg-warning p-4">No records found for Book ID' . " " . $book_id;
                    }
                }


                ?>

         </form>