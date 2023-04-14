<!---------------- Session starts form here ----------------------->
<?php
session_start();
if (!$_SESSION["LoginLib-admin"]) {
    header('location:../login/login.php');
}
require_once "../connection/connection.php";
?>
<!---------------- Session Ends form here ------------------------>
<!-- code to include both header and common librarian sidebar -->

<?php include('../common/common-header.php') ?>
<?php include('../common/lib-adminsidebar.php') ?>

<!-- code to include both header and common librarian sidebar  ends here-->

<head>
    <title>Kisumu University</title>
</head>

<?php

class Common
{
    public function uploadData($connection, $book_id, $book_name, $author, $title, $publication, $copies, $section, $price, $status)
    {
        $mainQuery = "INSERT INTO  books_details SET book_id='$book_id',book_name='$book_name',author='$author', title ='$title', publication='$publication',copies='$copies', section='$section', price = '$price', status='$status' ";
        $result1 = $connection->query($mainQuery) or die("Error in main Query" . $connection->error);
        return $result1;
    }
}
?>


<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
    <div class="sub-main">
        <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
            <div class="d-flex">
                <h4 class="mr-5">Bulk Books Enrolment </h4>
                <!-- <button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".bd-example-modal-lg">Add Student</button> -->
            </div>
        </div>
        <h3 class="alert-danger md-3">Caution! Before uploading the csv file, ensure that all filled are correctly filled</h3>
         <br>
        <div class="text-left">
            <h2>Upload Excel(CSV) file of the Books information</h2>
            <br>
        </div>
        <div class="text-left">

            <!-- form to accept the excel form to be upploded -->
            <form action="excel-script.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="file" name="excelDoc" id="excelDoc" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="submit" name="uploadBtn" id="uploadBtn" value="Upload Excel" class="btn btn-success" />
                    </div>
                </div>
            </form>
            <a href="register-books.php">Go back</a>
        </div>