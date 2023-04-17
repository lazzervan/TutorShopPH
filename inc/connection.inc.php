<?php

$con = new mysqli('us-cdbr-east-06.cleardb.net', 'b0f64541d7502d', '25dc2cd7', 'heroku_11249fee4af90ce');

if($con->connect_errno > 0){
    die('Unable to connect to database [' . $con->connect_error . ']');
}

?>
