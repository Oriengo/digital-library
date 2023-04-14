<!doctype html>
<html lang="en">

<head>
    <title>Kisii University</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
    h4 {
        text-align: center;
        background: red;
        /* width: 50%; */
        padding: 20px;
        margin: 250px;
        /* padding: auto; */
        margin-top: 100px;
        border-radius: 20px;
    }
</style>
<?php include('../common/common-head.php') ?>
<meta name="viewport" content="width=device-width, initial-scale=1">

<body class="login-background">

    <div class="login-div mt-3 pt-10">
        <div class="logo-div text-center">
         
        </div>
        <div class="login-padding"> 
    <h2 class="text-center text-white">LOGIN</h2>
    <form class="p-1" action="login.php" method="POST">
        <div class="form-group">
            <label>
                <h6>Enter Your ID/Email:</h6>
            </label>
            <input type="text" name="email" placeholder="Enter User ID" class="form-control" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label>
                <h6>Enter Password:</h6>
            </label>
            <input type="password" name="password" placeholder="Enter Password" class="form-control border-bottom" autocomplete="off" required>

        </div>
        <div class="form-group text-center mb-3 mt-4">
            <input type="submit" name="btnlogin" value="LOGIN" class="btn btn-white pl-5 pr-5 ">
        </div>
    </form>
    <script>
        window.addEventListener('load', function() {
            var inputs = document.querySelectorAll('input');
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].setAttribute('autocomplete', 'off');
            }
        });
    </script>
</div>

        </div>
    </div>
</body>

</html>
<br><br><br><br>

<!-- PHP Starts Here -->
<?php


session_start();
include "loggers.php";
require_once "../connection/connection.php";
$message = "Email Or Password Does Not Match";
if (isset($_POST["btnlogin"])) {

    $username = ($_POST["email"]);
    $password = ($_POST["password"]);
    $user_pass = md5($password);
    if (!empty($username) && !empty($password)) {
        $query = "SELECT * FROM login_tbl WHERE user_id='$username' and Password='{$user_pass}' ";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                if ($row["Role"] == "Admin") {
                    $_SESSION['LoginAdmin'] = $row["user_id"];
                    header('Location: ../admin/index.php');
                } else if ($row["Role"] == "lecturer" and $row["account"] == "Activate") {
                    $_SESSION['LoginTeacher'] = $row["user_id"];
                    header('Location: ../lecturer/lecturer-index.php');
                } else if ($row["Role"] == "Student" and $row["account"] == "Activate") {
                    $_SESSION['LoginStudent'] = $row['user_id'];
                      $log = "Student ($username) signed in to their account succesfull";
                      logger($log);
                    header('Location: ../student/index.php');
                } elseif ($row["account"] == "Deactivate") {
                    echo '<h4>Sory your account has been Deactivated <br> Please contact your Admin</h4>';
                } else if ($row["Role"] == "admissions" and $row["account"] == "Activate") {
                    $_SESSION['LoginAdmissions'] = $row['user_id'];
                    header('Location: ../admissions-office/index.php');

                } else if ($row["Role"] == "medical" and $row["account"] == "Activate") {
                    $_SESSION['LoginMedics'] = $row['user_id'];
                    header('Location: ../medical-officer/index.php');

                } else if ($row["Role"] == "cod" and $row["account"] == "Activate") {
                    $_SESSION['LoginCod'] = $row['user_id'];
                    header('Location: ../cod/index.php');

                } else if ($row["Role"] == "dean" and $row["account"] == "Activate") {
                    $_SESSION['LoginDean'] = $row['user_id'];
                    header('Location: ../deanstudent/index.php');

                } else if ($row["Role"] == "librarian" and $row["account"] == "Activate") {
                    $_SESSION['LoginLibrarian'] = $row['user_id'];
                    $log = "Librarian ($username) signed in to their account succesfull";
                    logger($log);
                    header('Location: ../librarian/index.php');

                } else if ($row["Role"] == "lib_admin" and $row["account"] == "Activate") {
                    $_SESSION['LoginLib-admin'] = $row['user_id'];
                    header('Location: ../lib-admin/index.php');
                } else if ($row["Role"] == "Register" and $row["account"] == "Activate") {
                    $_SESSION['LoginLib-device'] = $row['user_id'];
                    header('Location: ../librarian/devices/register.php');
                } else if ($row["Role"] == "Outlet" and $row["account"] == "Activate") {
                    $_SESSION['LoginLib-outlet'] = $row['user_id'];
                    header('Location: ../librarian/devices/outlet.php');
                }

            }
        } if(mysqli_num_rows($result)== 0){
            echo "<script>alert('Your password or Username is wrong!');window.location.href='login.php';</script>";
            $log = "User ($username) tried to sign in unsuccesfully";
            logger($log);
            header("Location: login.php");
        }
    } else {
        echo "All input fields are required!";
    }
}
?>
