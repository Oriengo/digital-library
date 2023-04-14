<!---------------- Session starts form here ----------------------->
<?php

use Mpdf\Tag\TBody;
use PhpOffice\PhpSpreadsheet\Calculation\Information\Value;

session_start();
if (!$_SESSION["LoginStudent"]) {
    header('location:../login/login.php');
}
if ($_SESSION['LoginStudent']) {
    $_SESSION['LoginAdmin'] = "";
}
require_once "../connection/connection.php";
require_once __DIR__ . '../../vendor/autoload.php';
date_default_timezone_set('AFRICA/NAIROBI');
?>
<!---------------- Session Ends form here ------------------------>
<html>

<head>
    <title>Kisii University</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</head>

<!--including both header and student side bar-->

<meta name="viewport" content="width=device-width, initial-scale=1">

<script>
    $(document).ready(function() {
        $('#exampleTable').DataTable();
    });
</script>
<?php require('student-logs.php') ?>
<?php include('../common/common-header.php') ?>
<?php include('../common/student-sidebar.php') ?>
<!-- end of header  -->

<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
    <div class="sub-main ">
        <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
            <h4 class="">Welcome to Digital Library Services</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <section class="border mt-4  pt-3 pl-3">

                <!-- main form to enable student to select what they want to perfom -->
                <form style action=" " method="POST" enctype="multipart/form-data">
                    <input type="submit" name="book_space" type="submit" class="btn btn-primary text-right" value="Book a space">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <input type="submit" name="borrow-history" type="submit" class="btn btn-primary" value="Borrowing history"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <input type="submit" name="search-link" type="submit" class="btn btn-primary text-right" value="Reserve a book"> &nbsp &nbsp &nbsp
                    <input type="submit" name="e-books" type="submit" class="btn btn-primary text-right" value="E-books"> &nbsp &nbsp &nbsp
                    <input type="submit" name="booking-history" type="submit" class="btn btn-primary text-right" value="Booking History">

                </form>

            </section>
        </div>
    </div>
    </div>


    <?php
    if (isset($_POST['e-books'])) { ?>

        <table class="w-10 table-elements mb-3 table-three-tr text-left table  table-bordered" cellpadding="10">
            <h2 class="text-center p-2">E Books</h2>
            <thead>
    <tr class="table-tr-head table-three text-white">
        <th>#</th>
        <th>Link</th>
        <th>Description</th>
    </tr>
</thead>

<tbody>
    <?php
    $sql = "SELECT * FROM e-books";
    $result = mysqli_query($con, $sql);
    if ($result) {
    while ($row = mysqli_fetch_array($result)) {?>

       <tr>
       <td><?php echo $row['name'] ?></td>
       <td><?php echo $row['author'] ?></td>
       <td><?php echo $row['publication_year'] ?></td>
       </tr>
       <?php  } ?>
    
</tbody>

            
            
            
            
          
<?php  } ?>

        <?php  } ?>



        <!-- code to display space booking history -->
        <table class="w-10 table-elements mb-3 table-three-tr text-left table  table-bordered" cellpadding="10">
            <?php
            if (isset($_POST['booking-history'])) {

                echo '
        <h2>Space Booking History</h2>
        <thead>
    <tr class="table-tr-head table-three text-white">
                                    <!-- <th>No</th> -->
                                    <th>#</th>
                                    <th>Bookig Id</th>
                                    <th>Booking time</th>
                                    <th>Booked Date</th>
                                    <th>Session</th>
                                    <th>Status</th>
                                    <th>Comments</th>
                                    <th>Time Taken</th>
                                    
                                    <?php $sr = 1; ?>
                                </tr> 
                                </thead>
    ';


                echo ' <tbody>';
                $userId = $_SESSION['LoginStudent'];
                $query = "SELECT * FROM space_bookig WHERE reg_number = '$userId' ORDER BY booked_date desc ";
                $result = mysqli_query($con, $query);
                if ($result) {
                    $sr = 1;
                    while ($row = mysqli_fetch_assoc($result)) {

                        $booking_id = $row['booking_id'];
                        $booking_time = $row['booking_time'];
                        $booked_date = $row['booked_date'];
                        $session = $row['session'];
                        $status = $row['Status'];
                        $return_date = $row['att_comment'];

                        $query = "SELECT time_in, time_out, TIMEDIFF(time_out, time_in) AS timetaken FROM attendance_register WHERE reg_number = '$userId' ";
                        $result = mysqli_query($con, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $tt = $row['timetaken'];




                            if (mysqli_num_rows($result) > 0) {

                                echo '<tr>
        <td>' . $sr . '</td>
        <td>' . $booking_id  . '</td>
        <td> ' . $booking_time . '</td>
        <td>' . $booked_date . '</td>
        <td> ' . $session . ' </td>
        <td> ' . $status . ' </td>
        <td> ' . $return_date . '</td>
        <td> ' . $tt . '</td>

        </tr>';
                            } else {
                                echo 'No data found';
                            }
                            $sr++;
                        }
                    }
                }
            } { ?>

                <tbody>

        </table>

        <script>
            $(document).ready(function() {
                $('#booking-table').DataTable();
            });
        </script>



    <?php } ?>






    <!-- code to save space resavation statrs here -->
    <?php
    if (isset($_POST['save_dataa'])) {

        $book_id = $_POST['book_id'];
        $book_name = $_POST['book_name'];
        $date = $_POST['date'];
        $title = $_POST['title'];
        $reg_number = $_POST['publication'];
        $session = $_POST['session'];
        $status = 'Auto Approved';

        $quey2 = "INSERT INTO `space_bookig`(`booking_id`, `booking_time`, `booked_date`, `reg_number`, `session`, `Status`) VALUES ('$book_id','$book_name','$date','$reg_number','$session','$status')";
        $result = mysqli_query($con, $quey2);
        if ($result) { ?>


            <!-- to capture student logs -->
            <?php
            $userId = $_SESSION['LoginStudent'];
            $log = "Student ($userId) booked a space";
            logger($log);

            ?>

            <!-- the form that echos the stored values to appear on the risit -->

            <form action="pdf-demo.php" method="POST" enctype="multipart/form-data">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Booking Id: </label>
                            <input type="text" name="book_id" class="form-control" required value="<?php echo $book_id ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Booking time:</label>
                            <input type="text" name="book_name" class="form-control" value="<?php echo $book_name ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1" required>Visit Date:</label>
                            <input type="" class="form-control" name="date" value=<?php echo date("m/d/Y", strtotime($date)) ?> required readonly>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Applicant name</label>
                            <input type="text" name="title" class="form-control" required value="<?php echo $title ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Registration number:</label>
                            <input type="text" name="publication" class="form-control" value="<?php echo $reg_number ?>" readonly>
                        </div>


                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Sessions:</label>
                            <input type="text" name="session" class="form-control" value="<?php echo $session ?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="submit" value="Print ticket" class="btn btn-success" name="btn_print">
                </div>
            </form>
        <?php } ?>
    <?php } ?>


    <!-- table to display the borrowing history  -->

    <table class="w-10 table-elements mb-3 table-three-tr text-left table table-striped table-bordered" cellpadding="10">
        <thead id="thead">
            <h3>Borroring History</h3>


            <?php

            function getDaysBetweenDates($givenDate)
            {
                // Convert given date to a timestamp
                $givenTimestamp = strtotime($givenDate);

                // Get current timestamp
                $currentTimestamp = time();

                // Calculate the difference in seconds
                $differenceInSeconds = $currentTimestamp - $givenTimestamp;

                // Calculate the difference in days
                $differenceInDays = $differenceInSeconds / (60 * 60 * 24);

                // Round to the nearest integer
                $differenceInDays = round($differenceInDays);

                if ($differenceInDays == 0) {
                } else {
                    return $differenceInDays;
                }
            }

            if (isset($_POST['borrow-history'])) { { ?>



                    <tr class="table-tr-head table-three text-white">
                        <th>#</th>
                        <th>Borrowing Id</th>
                        <th>Book Id</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Borrowing date</th>
                        <th>Return Date</th>
                        <th>Comments</th>
                        <th>Signature</th>

                        <?php $sr = 1; ?>
                    </tr>

                <?php }


                // code that fetches data for boroowings from  borowing tables and combines it to other tables
                $userId = $_SESSION['LoginStudent'];
                $query = "SELECT * FROM borrowing_tbl INNER JOIN books_details ON books_details.book_id = borrowing_tbl.book_id WHERE borrowing_tbl.reg_number = '$userId' ORDER BY comments";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) > 0) {
                    $sr = 1;
                    while ($row = mysqli_fetch_assoc($result)) {

                        $borrowing_id = $row['borrowing_id'];
                        $book_id = $row['book_id'];
                        $book_name = $row['book_name'];
                        $title = $row['title'];
                        $borrow_date = $row['borrow_date'];
                        $return_date = $row['return_date'];
                        $comments = $row['comments'];


                        $givenDate =  $return_date;
                        $daysBetween = getDaysBetweenDates($givenDate);
                        if ($comments == "Returned.") {
                            $value = 'Okay';
                        }
                        if ($comments !== "Returned.") {
                            $value = 'Overdue by ' . $daysBetween . ' ' . 'Days';
                        }
                        if ($daysBetween <= 0 && $comments !== "Returned.") {
                            $value = 'Within timeframe';
                        }




                        if (mysqli_num_rows($result) > 0) {
                            echo '<tr>
            <td>' . $sr . '</td>
            <td>' . $borrowing_id . '</td>
            <td> ' . $book_id . '</td>
            <td>' . $book_name . '</td>
            <td> ' . $title . ' </td>
            <td> ' . $borrow_date . ' </td>
            <td> ' . $return_date . '</td>
            <td>' . $comments . '</td>
            <td>' . $value . '</td>
            </tr>';
                        } else {
                            echo 'No data found';
                        }
                        $sr++;
                    }
                }
            } { ?>


    </table>



<?php } ?>




<table class="w-10 table-elements mb-3 table-three-tr text-left" cellpadding="10">
    <?php
    if (isset($_POST['btnSearch'])) {

        echo '
        <h2>Search results</h2>
    <tr class="table-tr-head table-three text-white">
                                    <!-- <th>No</th> -->
                                    <th>#</th>
                                    <th>Book Name</th>
                                    <th>Author</th>
                                    <th>Publication</th>
                                    <th>Title</th>
                                    <th>No of copies</th>
                                    <th>Return Date</th>
                                    <th>Price</th>
                                    
                                    <?php $sr = 1; ?>
                                </tr> 
    ';



        $userId = $_SESSION['LoginStudent'];
        $query = "SELECT * FROM borrowing_tbl INNER JOIN books_details ON books_details.book_id = borrowing_tbl.book_id WHERE borrowing_tbl.reg_number = '$userId' ORDER BY comments";
        $result = mysqli_query($con, $query);
        if ($result) {
            $sr = 1;
            while ($row = mysqli_fetch_assoc($result)) {

                $borrowing_id = $row['borrowing_id'];
                $book_id = $row['book_id'];
                $book_name = $row['book_name'];
                $title = $row['title'];
                $borrow_date = $row['borrow_date'];
                $return_date = $row['return_date'];
                //  $status=$row['status'];
                $comments = $row['comments'];

                if (mysqli_num_rows($result) > 0) {

                    echo '<tr>
        <td>' . $sr . '</td>
        <td>' . $borrowing_id . '</td>
        <td> ' . $book_id . '</td>
        <td>' . $book_name . '</td>
        <td> ' . $title . ' </td>
        <td> ' . $borrow_date . ' </td>
        <td> ' . $return_date . '</td>
        <td>' . $comments . '</td>

        </tr>';
                } else {
                    echo 'No data found';
                }
                $sr++;
            }
        }
    } { ?>




</table>



<?php } ?>







<!-- code for booking a space stats here -->

<?php
$reg_number = $_SESSION['LoginStudent'];
$query = "SELECT * FROM student_information WHERE reg_number = '$reg_number' ";
$run = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($run))
    if ($run) {
        if (isset($_POST['book_space'])) { ?>

        <h2>Book a space</h2>
        <form action=" " method="POST" enctype="multipart/form-data">
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Booking Id: </label>

                        <?php
                        // Get current timestamp in microseconds
                        $timestamp = microtime(true);

                        // Convert timestamp to a string and remove the decimal point
                        $timestamp_str = str_replace('.', '', (string)$timestamp);

                        // Take the first 15 characters of the timestamp string
                        $number = substr($timestamp_str, 0, 15);

                        // Output the number

                        ?>
                        <input type="text" name="book_id" class="form-control" required value="<?php echo $number ?>" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php
                    // $date = date('Y-m-d H:i:s');
                    // // echo $date;
                    $date = date('F j, Y g:i:s A');
                    // echo $date;
                    ?>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Booking time:</label>
                        <input type="text" name="book_name" class="form-control" value="<?php echo $date ?>" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1" required>Visit Date:</label>
                        <input type="date" id="date" class="form-control" name="date" min="" max="" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Applicant name</label>
                        <input type="text" name="title" class="form-control" required value="<?php echo $row['first_name'] ?> <?php echo $row['middle_name'] ?> <?php echo $row['last_name'] ?>" readonly>
                    </div>
                </div>
                <div class="col-md-4">


                    <div class="form-group">
                        <label for="exampleInputPassword1">Registration number:</label>
                        <input type="text" name="publication" class="form-control" value=<?php echo $row['reg_number'] ?> readonly>
                    </div>


                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Sessions:</label>
                        <select name="session" id="" class="form-control" required="required">
                            <option value="">Select time</option>
                            <option value="Morning">Morning</option>
                            <option value="Afternoon">Afternoon</option>
                            <option value="Full Day">Full Day</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <input type="submit" value="Save Data" class="btn btn-success" name="save_dataa">
                <!-- <input type="submit" value="Print ticket" class="btn btn-success" name="btn_print"> -->
            </div>
        </form>
    <?php } ?>

<?php } ?>


</main>

<script>
    // Get the current date and format it as YYYY-MM-DD

    const today = new Date().toISOString().split('T')[0];

    // Set the minimum date to today
    document.getElementById("date").setAttribute("min", today);

    // Set the maximum date to 4 days from today
    const maxDate = new Date(today);
    maxDate.setDate(maxDate.getDate() + 2);
    document.getElementById("date").setAttribute("max", maxDate.toISOString().split('T')[0]);
</script>


<?php
if (isset($_POST['search-link'])) { ?>
    <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
        <div class="sub-main">
            <div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                <h4>Search a book</h4>
            </div>

            <div class="col-md-6">

                <!-- codes for different search form -->
                <form action="lib2.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputPassword1">
                            <h5>Enter Boook Name:</h5>
                        </label>
                        <div class="d-flex">
                            <input type="text" name="bk_name" id="search" class="form form-control" placeholder="Search by name">
                        </div>
                        <!-- altenative search potion by book id   -->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">
                            <h5>Enter Book Id:</h5>
                        </label>
                        <div class="d-flex">
                            <input type="text" name="book_id" id="search" class="form form-control" placeholder="Search by Book Id ">

                        </div>

                        <!-- search by author -->

                        <div class="form-group">
                            <label for="exampleInputPassword1">
                                <h5>Enter Boook Author:</h5>
                            </label>
                            <div class="d-flex">
                                <input type="text" name="bk_author" id="search" class="form form-control" placeholder="Search by Author">
                            </div>
                        </div>
                        <br>
                        <div class='form-group'>
                            <input class="btn btn-primary px-4 ml-4" type="submit" name="btnSearch_books" value="Search">
                        </div>

                    </div>
                </form>



                <?php

                //  these code were not used

                if (isset($_POST['btnSearch_books'])) { ?>





                    <?php
                    $book_id = $_POST['book_id'];
                    $query = "SELECT * FROM books_details  WHERE book_id = '$book_id'";

                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($result))
                        if ($result) {
                            echo $row['book_name'];
                        }
                    ?>


                <?php } ?>


            <?php } ?>