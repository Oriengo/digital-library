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



<html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
    table{
        border: 2px solid;
    }
    h4{
        text-align: center;
    }
</style>
</html>



<?php  



 require_once __DIR__ . '../../vendor/autoload.php';
if (isset($_POST['btn_print'])) {

    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $date = $_POST['date'];
    $formatted_date = date('D, j M Y', strtotime($date));
    $title = $_POST['title'];
    $reg_number = $_POST['publication'];
    $session = $_POST['session'];
    $status = 'Auto Approved';
    $gen_date = date('D, j M Y g:i a');

    // Generate the HTML code
    $html = '

    <div class="ticket">
	<style>
.ticket {
    width: 550px;
    border: 1px solid black;
    border-radius: 10px;
    padding: 20px;
    margin: 50px auto;
    font-family: Arial, sans-serif;
}

h1 {
    text-align: center;
}
h3{
    text-align: center;
}
img{
   text-align: center;
}
h6{
    text-align: right; 
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th {
    text-align: left;
    padding: 10px;
    border-bottom: 1px solid black;
}
.image-equal {
    width: 150px; /* or any other width you prefer */
    height: 150px; /* or any other height you prefer */
  }

td {
    padding: 10px;
    border-bottom: 1px solid black;
}

</style>
       <img src="LOGO.jpg" alt="" style="margin-right: 200px;" class="image-equal">
        
        <img src="info.png" alt="" class="image-equal">
		<h1>Kisii University Digital Library</h1>
        <h3>Entrance ticket</h3>
        <hr>
		<table>
			<tr>
				<th>Booking Id</th>
				<td>'.$book_id.'</td>
			</tr>
			<tr>
				<th>Attending Date:</th>
				<td>'.$formatted_date.'</td>
			</tr>
			<tr>
				<th>Name:</th>
				<td>'.$title.'</td>
			</tr>
			<tr>
				<th>Reg Number:</th>
				<td>'.$reg_number.'</td>
			</tr>
			<tr>
				<th>Seasion:</th>
				<td>'.$session.'</td>
			</tr>
            <tr>
				<th>Status:</th>
				<td>'.$status.'</td>
			</tr>
           
		</table>
   
        <br>
        <br>
       <h3>Dont forget your Space</h3>
       <h6>Generated on: '.$gen_date.'</h6>
	</div>
    ';
    

       
    // Create a new mPDF object
    $mpdf = new \Mpdf\Mpdf();

    // Generate the PDF
    $mpdf->WriteHTML($html);

    // Output the PDF as a file
    $mpdf->Output("$reg_number.pdf", 'D');


   
    
}



     
    // <h4>Kisumu University Digital Library</h4>
    // <table>
    //     <tr>
    //         <td>Booking Id:</td>
    //         <td>'.$book_id.'</td>
    //     </tr>
    //     <hr>
    //     <tr scope="col">
    //         <td>Applicant name:</td>
    //         <td>'.$title.'</td>
    //     </tr>
    //     <hr>
    //     <tr scope="col">
    //     <td>Registration number:</td>
    //     <td>'.$reg_number.'</td>
    // </tr>
    // <hr>
    //     <tr scope="col">
    //         <td>Booking time:</td>
    //         <td>'.$book_name.'</td>
    //     </tr>
    //     <hr>
    //     <tr>
    //         <td>Visit Date:</td>
    //         <td>'.$date.'</td>
    //     </tr>
        
        
    //     <hr>
       
    //     <tr scope="col">
    //         <td>Sessions:</td>
    //         <td>'.$session.'</td>
    //     </tr>
    //     <hr>
    //     <tr scope="col">
    //     <td>Comments:</td>
    //     <td>'.$status.'</td>
    // </tr>
    // </table>
   