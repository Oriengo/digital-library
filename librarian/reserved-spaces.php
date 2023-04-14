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
            <form style action=" " method="POST" enctype="multipart/form-data">
                    <input type="submit" name="not_yet" type="submit" class="btn btn-success text-right" value="Not yet attended">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <input type="submit" name="attended" type="submit" class="btn btn-success" value="Attendance"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp

                </form>
                
            </div>

            
            <br>

           
        
     
        <a href="library-reports.php">Back </a>
        <script>
            $(document).ready(function() {
                $('#booking-table').DataTable();
            });
        </script> 
            
        

            <?php   
            if(isset($_POST['not_yet'])){ ?>

            <table id="booking-table" class="w-100 table-elements mb-3 table-three-tr text-left" cellpadding="10">
                <thead>
                    <tr class="table-tr-head table-three text-white">
                        <th>No</th>
                        <th>Booking Id</th>
                        <th>Booked Date</th>
                        <th>Attending Date</th>
                        <th>Applicant name</th>
                        <th>Registration NO.</th>
                        <th>Session</th>
                        <th>Status</th>
                        <th>Visit Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $today = date("Y-m-d");
                    $query = "SELECT * FROM space_bookig INNER JOIN student_information ON space_bookig.reg_number = student_information.reg_number WHERE booked_date = '$today' AND att_comment = 'Not Attended' ORDER BY booked_date DESC";
                    $result = mysqli_query($con, $query);
                    $sr = 1;
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $booking_id = $row['booking_id'];
                            $booking_time = date("d-m-Y", strtotime($row['booking_time']));
                            $booked_date = date("d-m-Y", strtotime($row['booked_date']));
                            $first_name = $row['first_name'];
                            $middle_name = $row['middle_name'];
                            $last_name = $row['last_name'];
                            $session = $row['session'];
                            $status = $row['Status'];
                            $vstatus = $row['att_comment'];
                            $reg_number = $row['reg_number'];

                            echo '<tr>
                    <td>' . $sr . '</td>
                    <td>' . $booking_id . '</td>
                    <td>' . $booking_time . '</td>
                    <td>' . $booked_date . '</td>
                    <td>' . $first_name . " " . $middle_name . " " . $last_name . '</td>
                    <td>' . $reg_number . '</td>
                    <td>' . $session . '</td>
                    <td>' . $status . '</td>
                    <td>' . $vstatus . '</td>
                    </tr>';
                            $sr++;
                        }
                    }
                    ?>
                </tbody>
            </table>



        </div>

        </div>
               <?php }?>
               <button class="btn btn-success"><a class="text-white" href="reserved-space-print.php">Print</a></button>


        <?php   
            if(isset($_POST['attended'])){ ?>

                <table id="booking-table" class="w-100 table-elements mb-3 table-three-tr text-left" cellpadding="10">
                <thead>
                    <tr class="table-tr-head table-three text-white">
                        <th>No</th>
                        <th>Booking Id</th>
                        <th>Booked Date</th>
                        <th>Attending Date</th>
                        <th>Applicant name</th>
                        <th>Registration NO.</th>
                        <th>Session</th>
                        <th>Status</th>
                        <th>Visit Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $today = date("Y-m-d");
                    $query = "SELECT * FROM space_bookig INNER JOIN student_information ON space_bookig.reg_number = student_information.reg_number WHERE booked_date = '$today' AND att_comment = 'Attended' ORDER BY booked_date DESC";
                    $result = mysqli_query($con, $query);
                    $sr = 1;
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $booking_id = $row['booking_id'];
                            $booking_time = date("d-m-Y", strtotime($row['booking_time']));
                            $booked_date = date("d-m-Y", strtotime($row['booked_date']));
                            $first_name = $row['first_name'];
                            $middle_name = $row['middle_name'];
                            $last_name = $row['last_name'];
                            $session = $row['session'];
                            $status = $row['Status'];
                            $vstatus = $row['att_comment'];
                            $reg_number = $row['reg_number'];

                            echo '<tr>
                    <td>' . $sr . '</td>
                    <td>' . $booking_id . '</td>
                    <td>' . $booking_time . '</td>
                    <td>' . $booked_date . '</td>
                    <td>' . $first_name . " " . $middle_name . " " . $last_name . '</td>
                    <td>' . $reg_number . '</td>
                    <td>' . $session . '</td>
                    <td>' . $status . '</td>
                    <td>' . $vstatus . '</td>
                    </tr>';
                            $sr++;
                        }
                    }
                    ?>
                </tbody>
            </table>

            <?php } ?>

        </div>

        </div>

        <!-- <a href="library-reports.php">Back </a> -->
        <script>
            $(document).ready(function() {
                $('#booking-table').DataTable();
            });
        </script>
        