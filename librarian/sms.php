<?php
session_start();
if (!$_SESSION["LoginLibrarian"]) {
    header('location:../login/login.php');
}
require_once "../connection/connection.php";
require_once "../login/loggers.php";
?>
<!---------------- Session Ends form here ------------------------>
<?php
date_default_timezone_set('AFRICA/NAIROBI');
?>
<?php

// Set your Africa's Talking API credentials
$username = 'Oritechss';
$api_key = 'd89ffee2e70085606d0008d1a233bbb795f18eaf37c28a9673fa300c79665402';

// Set the phone numbers and messages you want to send

$query = "SELECT phone_number, first_name FROM student_information INNER JOIN borrowing_tbl ON borrowing_tbl.reg_number = student_information.reg_number WHERE borrowing_tbl.comments = 'Returned.'";
$result = mysqli_query($con, $query);
$recipients = array();
while ($row = mysqli_fetch_array($result)) {
    $recipients[] = $row['phone_number'];
    $name = $row['first_name'];

    //   




    $message = "Dear $name, you have an overdue book for Kisii University Digital Library.";
    // }
    // var_dump($recipients);
    // var_dump($name);
}
// Set up the API client
require_once('vendor/autoload.php');

use AfricasTalking\SDK\AfricasTalking;

//Initialize the SDK
$AT = new AfricasTalking($username, $api_key);

// Get the SMS service
$sms = $AT->sms();

// Send the messages
$result = $sms->send([
    'to'      => implode(',', $recipients),
    'message' => $message
]);

// Check the results
if ($result['status'] == 'success') {
    $log = "Librarian pf number $pf_number sent reminders to students";
    logger($log);
    echo "<script>alert('Reminder sent succesfully');window.location.href='borrowing-report.php';</script>";
} else {
    echo 'Error sending messages: ' . $result['message'];
}

?>

<?php



?>