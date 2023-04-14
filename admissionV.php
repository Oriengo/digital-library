<?php include('connection/connection.php');  ?>
<?php include('common/header.php') ?>


<style>
  h1 {
    text-align: center;
    text: bold;
  }
</style>
<?php
$query = "SELECT * from status_tbl WHERE activity='online-registration'";
$run = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($run)) { ?>

  <?php $status =  $row['status'] ?>
<?php
}
?>
<?php


if ($status == "Enabled") {
  header('location: admission.php');
} else {
  echo "  <h1> <b>Thank you for your attempt to register online.</b> <br> <b> Unfortunatelly Admissions office has not enabled the Service </h1>  </b><br>";
  echo '<h1> <a href="index.php"> Go back</a> </h1>';
}

?>

<?php
$query = "SELECT * from status_tbl WHERE activity='view_studentpersonal_info'";
$run = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($run)) { ?>

  <?php $status =  $row['status'] ?>
<?php
}
?>
<?php


if ($status == "Disabled") {
  header('location: /student/student-personal-information.php');
} else {
  echo "  <h1> <b>This page has been Dissabled by Admin.</b> <br> <b> It might be under construction </h1>  </b><br>";
  echo '<h1> <a href="index.php"> Go back</a> </h1>';
}

?>