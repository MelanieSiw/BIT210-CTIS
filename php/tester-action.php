<?php

session_start();

include_once 'ctisdb.php';
  include_once 'sessionCheck.php';

$mysqli = new mysqli('localhost','root','','ctisdb') or die(mysqli_error($mysqli));

  $sql = "SELECT * FROM User WHERE username ='" . $_SESSION["current_user"] . "'";
  $result = mysqli_query($con, $sql);
  $userArr = mysqli_fetch_array($result);
  $usernameSession = $userArr['username'];

  $update = false;
  $username = '';
  $password = '';
  $fullname = '';

if (isset($_POST['submitForm'])){
  $username = $_POST['testerUname'];
  $password= $_POST['testerPassword'];
  $fullname = $_POST['testerName'];

  $username = mysqli_real_escape_string($mysqli, $_POST['testerUname']);
  $check_duplicate = "SELECT username from User where username = '$username'";
  $result = mysqli_query($mysqli, $check_duplicate);
  $count = mysqli_num_rows($result);

  if($count > 0){
    echo "<script>alert('Username has been taken')</script>";
  }
  else{
    $mysqli->query("INSERT INTO User(username,password,fullname,userType, registeredBy) VALUES ('$username', '$password','$fullname','t', '$usernameSession')") or
    die($mysqli->error);
  }
}


if(isset($_GET['edit'])){
  $username = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM User WHERE username ='$username' AND registeredBy = '$usernameSession'") or die($mysqli->error);
  if (count($result)==1){
    $row = $result->fetch_array();
    $username = $row['username'];
    $password = $row['password'];
    $fullname = $row['fullname'];

  }
}

if (isset($_POST['update'])){
  $username = $_POST['testerUname'];
  $password = $_POST['testerPassword'];
  $fullname = $_POST['testerName'];

  $mysqli->query("UPDATE User SET username = '$username', password = '$password', fullname = '$fullname' WHERE username = '$username'") or die($mysqli->error);
  $_SESSION['message'] = "Tester has been updated.";
  $_SESSION['msg_type'] = "success";

  header("location: record-tester.php");
}

 ?>
