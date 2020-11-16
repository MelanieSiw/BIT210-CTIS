<?php
$servername = "localhost";
$username = "root";
$password ="";
$dbname = "ctisdb";
$con = new mysqli($servername, $username, $password, $dbname);
(!$con){
  die ('Could not connect to database:' .mysql_error());
} ?>
