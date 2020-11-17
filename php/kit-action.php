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
  $kitID = 0;
  $kitName = '';
  $stock = '';

  if(isset($_POST['add'])){
    $kitName = $_POST['kitName'];
    $stock = $_POST['stock'];

    $kitName = mysqli_real_escape_string($mysqli, $_POST['kitName']);
    $check_duplicate = "SELECT kitName FROM testkit where kitName = '$kitName'";
    $result = mysqli_query($mysqli, $check_duplicate);
    $count = mysqli_num_rows($result);

    if($count > 0){
      $_SESSION['message'] = "Test Kit Name already exists.";
      $_SESSION['msg_type'] = "danger";
      header("location: manage-test-kit.php");
    } else {
      $mysqli->query("INSERT INTO testkit(kitName, stock) VALUES ('$kitName', '$stock')") or
      die($mysqli->error);

      $_SESSION['message'] = "Test Kit Stock added successfully.";
      $_SESSION['msg_type'] = "success";

      header("location: manage-test-kit.php");
    }
  }

if(isset($_GET['delete'])){
  $kitID = $_GET['delete'];
  $mysqli->query("DELETE FROM testkit WHERE kitID = '$kitID'") or die($mysqli->error);
  $_SESSION['message'] = "Test Kit Stock has been deleted successfully.";
  $_SESSION['msg_type'] = "success";

  header("location: manage-test-kit.php");
}

if(isset($_GET['edit'])){
  $kitID = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM testkit WHERE kitID ='$kitID'") or die($mysqli->error);
  if (count($result)==1){
    $row = $result->fetch_array();
    $kitName = $row['kitName'];
    $stock = $row['stock'];

  }
}

if (isset($_POST['update'])){
  $kitID = $_POST['kitID'];
  $kitName = $_POST['kitName'];
  $stock = $_POST['stock'];

  $mysqli->query("UPDATE testkit SET kitName = '$kitName', stock = '$stock' WHERE kitID = '$kitID'") or die($mysqli->error);
  $_SESSION['message'] = "Test Kit Stock has been updated.";
  $_SESSION['msg_type'] = "success";

  header("location: manage-test-kit.php");
}
 ?>
