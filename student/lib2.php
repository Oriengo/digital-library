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
            <h4 class="">Welcome to Digital Library Services</h4>
        </div>
       <button><a class="text-right" href="library.php">Back to search</a></button> 

        <table class="w-10 table-elements mb-3 table-three-tr text-left" cellpadding="10">
            <h3>Search Result</h3>


            <?php


            if (isset($_POST['btnSearch_books'])) { ?>


                <h2>Search results</h2>
                <table class="w-10 table-elements mb-3 table-three-tr text-left" cellpadding="10">
                    <tr class="table-tr-head table-three text-white">
                        <!-- <th>No</th> -->
                        <th>#</th>
                        <th>Book Id</th>
                        <th>Book Name</th>
                        <th>Author</th>
                        <th>Publication</th>
                        <th>Title</th>
                        <th>Section</th>
                        <th>Publication</th>
                        <th>Status</th>
                        <th>Action</th>

                        <?php
                        $book_id = $_POST['book_id'];
                        $query = "SELECT * FROM books_details  WHERE book_id = '$book_id'";
                        $sr = 1;
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($result))
                            if (mysqli_num_rows($result) > 0) { ?>
                    <tr class='text-left'>
                        <td><?php echo $sr++ ?></td>
                        <td><?php echo $row["book_id"] ?></td>
                        <td><?php echo $row["book_name"] ?></td>
                        <td><?php echo $row["author"] ?></td>
                        <td><?php echo $row["publication"] ?></td>
                        <td><?php echo $row["title"] ?></td>
                        <td><?php echo $row["sections"] ?></td>
                        <td><?php echo $row["publication"] ?></td>
                        <td><?php echo $row["status"] ?></td>
                        <td width='190'>

                            <a href="reserve_book.php?book_id=<?php echo $row["book_id"] ?>" class="btn btn-info"><i class="fa fa-edit" title="Reserve book"></i> </a>

                        </td>
                    </tr>


                <?php }

                        if (mysqli_num_rows($result) == 0) { ?>

                    <h2 class="btn btn-warning"><?php echo 'No Book data found' ?></h2>
                <?php } ?>


            <?php } ?>

            <?php


            if (isset($_POST['btnSearch_books'])) { ?>


                <h2>Search results</h2>
                <table class="w-10 table-elements mb-3 table-three-tr text-left" cellpadding="10">
                    <tr class="table-tr-head table-three text-white">
                        <!-- <th>No</th> -->
                        <th>#</th>
                        <th>Book Id</th>
                        <th>Book Name</th>
                        <th>Author</th>
                        <th>Publication</th>
                        <th>Title</th>
                        <th>Section</th>
                        <th>Publication</th>
                        <th>Status</th>
                        <th>Action</th>

                        <?php
                        $book_name = $_POST['bk_name'];
                        $query = "SELECT * FROM books_details  WHERE book_name = '$book_name'";
                        $sr = 1;
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($result))
                            if (mysqli_num_rows($result) > 0) { ?>
                    <tr class='text-left'>
                        <td><?php echo $sr++ ?></td>
                        <td><?php echo $row["book_id"] ?></td>
                        <td><?php echo $row["book_name"] ?></td>
                        <td><?php echo $row["author"] ?></td>
                        <td><?php echo $row["publication"] ?></td>
                        <td><?php echo $row["title"] ?></td>
                        <td><?php echo $row["sections"] ?></td>
                        <td><?php echo $row["publication"] ?></td>
                        <td><?php echo $row["status"] ?></td>
                        <td width='190'>
                            <a href="reserve_book.php?book_id=<?php echo $row["book_id"] ?>" class="btn btn-info"><i class="fa fa-edit" title="Reserve Book"></i> </a>
                        </td>
                    </tr>

                    <?php


                    ?>
                <?php }

                        if (mysqli_num_rows($result) == 0) { ?>

                    <h2 class="btn btn-warning"><?php echo 'No Book data found' ?></h2>
                <?php } ?>



            <?php } ?>

            