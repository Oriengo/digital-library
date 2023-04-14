<?php
$connection = new mysqli("localhost","root","","imperial_college");
if (! $connection){
    die("Error in connection".$connection->connect_error);
}
