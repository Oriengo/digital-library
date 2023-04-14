<?php
session_start();
if (!$_SESSION["LoginStudent"]) {
    header('location:../login/login.php');
}
if ($_SESSION['LoginStudent']) {
    $_SESSION['LoginAdmin'] = "";
}
 require ('student-logs.php');
require_once "../connection/connection.php";
require_once __DIR__ . '../../vendor/autoload.php';
date_default_timezone_set('AFRICA/NAIROBI');
?>
<!---------------- Session Ends form here ------------------------>

<head>
    <title>Kisumu University</title>
</head>

<!--including both header and student side bar-->



<?php 
if(isset($_POST['preserve_btn'])){
    $resev_id = $_POST['reserve_id'];
    $book_id = $_POST['book_id'];
    $reg_number = $_POST['reg_number'];

    $sql = "INSERT INTO `book_reservations`(`reserve_id`, `book_id`, `reg_number`)
     VALUES ('$resev_id','$book_id','$reg_number')";

     $query1 = mysqli_query($con, $sql);
     if($query1){
             $userId = $_SESSION['LoginStudent'];
             $log = "Student ($userId) Reserved a book";
             logger($log);
        echo "<script>alert('Book Reserved succesfully!');window.location.href='library.php';</script>";
     }
     else{
        echo "<script>alert('Not succes!');window.location.href='library.php';</script>";
     }



}


?>