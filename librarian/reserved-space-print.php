<?php
session_start();
if (!$_SESSION["LoginLibrarian"]) {
    header('location:../login/login.php');
}


// require "../css/style.css";
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


 // start output buffering
 ob_start();
?>

    <img src="../student/LOGO.jpg" alt="">
   <h3>Unattended</h3>
<table id="booking-table" class="w-100 table-elements mb-3 table-three-tr text-left" cellpadding="10">
 <thead>
 <style>
   table {
  width: 100%;
}

td, th {
  border: 1px solid black;
}

h3 {
  text-align: center;
}

</style>
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

<?php
 // assign the buffered output to a variable
 $html = ob_get_clean();
?>


    
<?php 
       
    // Create a new mPDF object
    $mpdf = new \Mpdf\Mpdf();

    // Generate the PDF
    $mpdf->WriteHTML($html);

    // Output the PDF as a file
    $mpdf->Output("Report.pdf", 'D');

?>
   
    




     

   