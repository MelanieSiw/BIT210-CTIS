<?php

session_start();

include_once 'ctisdb.php';
include_once 'sessionCheck.php';

$mysqli = new mysqli('localhost','root','','ctisdb') or die(mysqli_error($mysqli));

  $sql = "SELECT * FROM User WHERE username ='" . $_SESSION["current_user"] . "'";
  $result = mysqli_query($con, $sql);
  $userArr = mysqli_fetch_array($result);
  $userSession = $userArr['username'];

  $testID = 0;
  $username = '';
  $password = '';
  $patientType = '';
  $status = '';
  $testDate = null;
  $testResult = '';
  $resultDate = '';
  $update = false;

  if(isset($_GET['edit'])){
    $testID = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT testID, patient_username, patientType, status, result FROM User u, covidTest ct WHERE ct.testID ='$testID' AND userType = 'p' AND u.username = ct.patient_username AND ct.tester_username = '$userSession' ") or die($mysqli->error);
    if (count($result)==1){
      $row = $result->fetch_array();
      $testID = $row['testID'];
      $username = $row['patient_username'];
      $patientType = $row['patientType'];
      $status = $row['status'];
      $testResult = $row['result'];
    }
  }

  if (isset($_POST['update'])){
    $testID = $_POST['testID'];
    $testResult = $_POST['result'];
    $resultDate = date("Y-m-d");

    $mysqli->query("UPDATE covidTest SET result='$testResult',resultDate='$resultDate',status='completed' WHERE testID ='$testID'") or die($mysqli->error);
    $_SESSION['message'] = "Test Result has been updated.";
    $_SESSION['msg_type'] = "success";

    header("location: updateTestResult.php");
  }

 ?>
