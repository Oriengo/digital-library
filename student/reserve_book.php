<?php
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

<head>
    <title>Kisumu University</title>
</head>

<!--including both header and student side bar-->

<?php include('../common/common-header.php') ?>
<?php include('../common/student-sidebar.php') ?>





<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
    <div class="sub-main ">
        <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
            <h4 class="">Book Reservation Point</h4>
        </div>
        <h2 class="bg-danger pt-4 pb-4 pl-3">Note that when you Reserve a Book and you dont Pick it within one hour, Your Reservation will be terminated</h2>

        <?php
        $reg_number = $_SESSION['LoginStudent'];
        $query = "SELECT * FROM student_information WHERE reg_number = '$reg_number' ";
        $run = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($run))
            if ($run) {
                $book_identity = intval($_GET['book_id']); { ?>

                <form action="v-reserve-book.php" method="POST" enctype="multipart/form-data">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Reservation Id: </label>

                                <?php
                                // Get current timestamp in microseconds
                                $timestamp = microtime(true);

                                // Convert timestamp to a string and remove the decimal point
                                $timestamp_str = str_replace('.', '', (string)$timestamp);

                                // Take the first 15 characters of the timestamp string
                                $number = substr($timestamp_str, 0, 15);

                                // Output the number
                                // echo $number;
                                ?>
                                <input type="text" name="reserve_id" class="form-control" required value="<?php echo $number ?>" readonly>
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
                                <label for="exampleInputPassword1">Book Id:</label>
                                <input type="text" name="book_id" class="form-control" value="<?php echo $book_identity ?>" readonly>
                            </div>
                        </div>
                  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1" required>Booking time:</label>
                                <input type=" " class="form-control" name="date" value="<?php echo date('F j, Y g:i:s A') ?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Registration number:</label>
                                <input type="text" name="reg_number" class="form-control" value=<?php echo $row['reg_number'] ?> readonly>
                            </div>
                        </div>

                        <?php
                        $book_identity = intval($_GET['book_id']);
                        $query = "SELECT * FROM books_details WHERE book_id = '$book_identity' ";
                        $run = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($run))
                            if ($run) {
                        ?>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Book name</label>
                                    <input type="text" name="title" class="form-control" required value="<?php echo $row['book_name'] ?>" readonly>
                                </div>
                            </div>
                       


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Loan Type:</label>
                                <input type="text" name="title" class="form-control" required value="<?php echo $row['loan_type'] ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="modal-footer">
                        <!-- <input type="submit" value="Save Data" class="btn btn-success" name="save_dataa"> -->
                        <input type="submit" value="Preserve" class="btn btn-success" name="preserve_btn">
                    </div>
                </form>
            <?php } ?>


        <?php } ?>

        <script>
            // Get the current date and format it as YYYY-MM-DD

            const today = new Date().toISOString().split('T')[0];

            // Set the minimum date to today
            document.getElementById("date").setAttribute("min", today);

            // Set the maximum date to 4 days from today
            const maxDate = new Date(today);
            maxDate.setDate(maxDate.getDate() + 1);
            document.getElementById("date").setAttribute("max", maxDate.toISOString().split('T')[0]);
        </script>

<!-- CREATE TABLE `imperial_college`.`book_reservations` 
( `reserve_id` INT(100) NOT NULL , `book_id` VARCHAR(100) NOT NULL , 
`reg_number` VARCHAR(50) NOT NULL , `reserve_time` 
TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `status`
 VARCHAR(100) NOT NULL DEFAULT 'Not Picked' , PRIMARY KEY (`reserve_id`)) -->

