<?php
$db_host = "us-cdbr-east-06.cleardb.net";
$db_user = "b0f64541d7502d";
$db_pass = "25dc2cd7";
$db_name = "heroku_11249fee4af90ce";
 
$connect =  mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("Database Connection Error.");
