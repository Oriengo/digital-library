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
                <h4>Reserved Books </h4>
            </div>
            <!-- Include jQuery and DataTables libraries -->


            <!-- Initialize DataTables plugin on the table -->

            <!-- Add id attribute to the table to reference in the jQuery code -->
            <table id="booking-table" class="w-100 table-elements mb-3 table-three-tr text-left" cellpadding="10">
                <thead>
                    <tr class="table-tr-head table-three text-white">
                        <th>No</th>
                        <th>Reservation Id</th>
                        <th>Book Id</th>
                        <th>Booked by</th>
                        <!-- <th>Applicant name</th> -->
                        <th>Registration No.</th>
                        <th>Phone Number</th>
                        <th>Reservation Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $today = date("Y-m-d");
                    $query = "SELECT * FROM book_reservations INNER JOIN student_information ON student_information.reg_number = book_reservations.reg_number order by reserve_time desc";
                    $result = mysqli_query($con, $query);
                    $sr = 1;
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $booking_id = $row['reserve_id'];
							$book_id = $row['book_id'];
                            // $booking_time = date("d-m-Y", strtotime($row['booking_time']));
                            // $booked_date = date("d-m-Y", strtotime($row['booked_date']));
                            $first_name = $row['first_name'];
                            $middle_name = $row['middle_name'];
                            $last_name = $row['last_name'];
                            $phone = $row['phone_number'];
                            $resev_time = $row['reserve_time'];
                            $vstatus = $row['status'];
                            $reg_number = $row['reg_number'];

                            echo '<tr>
                    <td>' . $sr . '</td>
                    <td>' . $booking_id . '</td>
                    <td>' . $book_id .'</td>
					<td>' . $first_name . " ".$middle_name. " ".$last_name. '</td>
                    <td>' . $reg_number . '</td>
                    <td>' . $phone . '</td>
                    <td>' .$resev_time . '</td>
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

        <a href="library-reports.php">Back </a>
        <script>
            $(document).ready(function() {
                $('#booking-table').DataTable();
            });
        </script>