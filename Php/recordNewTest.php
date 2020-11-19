<?php

$mysqli = new mysqli('localhost', 'root', '', 'ctisdb') or die(mysqli_error($mysqli));

session_start();

include_once 'ctisdb.php';
include_once 'sessionCheck.php';

$sql = "SELECT * FROM User WHERE username ='" . $_SESSION["current_user"] . "'";
$result = mysqli_query($con, $sql);
$userArr = mysqli_fetch_array($result);
$tester_username = $userArr['username'];

$username = '';
$password = '';
$fullname = '';
$patientType = '';
$symptoms = '';
$testDate = date("Y-m-d");

if(isset($_POST['submitForm'])){
  $username = $_POST['patientUname'];
  $password = $_POST['patientPassword'];
  $fullname = $_POST['patientName'];
  $patientType = $_POST['patientType'];
  $symptoms = $_POST['symptoms'];
  $symptomsImplode = implode (', ' , $symptoms);
  $testDate = date("Y-m-d");

  $username = mysqli_real_escape_string($mysqli, $_POST['patientUname']);
  $check_duplicate = "SELECT username from User where username = '$username'";
  $result = mysqli_query($mysqli, $check_duplicate);
  $count = mysqli_num_rows($result);

  if($count > 0){
    echo "<script>alert('Username has been taken')</script>";
  } else {
    $mysqli->query("INSERT INTO User (username, password, fullname, patientType, symptoms, userType, registeredBy) VALUES ('$username', '$password', '$fullname', '$patientType', '$symptomsImplode', 'p', '$tester_username')");
    $mysqli->query("INSERT INTO covidTest (testDate, result, status, tester_username, patient_username) VALUES ('$testDate', 'in progress', 'pending', '$tester_username', '$username')");
    header("location: recordNewTest.php");
  }

}

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CTIS</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/logo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Connect to Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="recordNewTest.php"><img src="../assets/img/logo.png" alt="logoCTIS" width="60px" height="auto">CTIS</a></h1>

      <nav class="main-nav d-none d-lg-block">
        <ul>
          <li><a href="#">Welcome fuck horny back, <?php echo $userArr['username']; ?></a></li>
          <li class="drop-down"><a href="">Actions</a>
            <ul>
              <li class="active"><a href="#recordNewTest">Record New Test</a></li>
              <li><a href="updateTestResult.php">Update Test Result</a></li>
              <li><a href="testReportTester.php">Generate Test Report</a></li>
            </ul>
          </li>
          <li><a href="#footer">Contact Us</a></li>
          <li><a href="loginNew.php">Log Out</a></li>
        </ul>
      </nav><!-- .main-nav-->

    </div>
  </header><!-- End Header -->

  <!-- ======= Record New Test image and button Section ======= -->
  <section id="imageButton" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center" data-aos="fade-up">
        <div class="col-md-6 intro-info order-md-first order-last" data-aos="zoom-in" data-aos-delay="100">
          <h2>Covid Testing<br>Information <span>System</span></h2>
          <h3>Record New Test</h3>
          <div>
            <a href="#recordNewTest" class="btn-get-started scrollto">Proceed to Record a new Test</a>
          </div>
        </div>

        <div class="col-md-6 intro-img order-md-last order-first" data-aos="zoom-out" data-aos-delay="200">
          <img src="../assets/img/newTest.png" alt="" class="img-fluid">
        </div>
      </div>
    </div>
  </section>

  <main id="main">

    <!-- ======= Record New Test Section ======= -->
    <section id="recordNewTest" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row">

          <div class="col-lg-5 col-md-6">
            <div class="about-img" data-aos="fade-right" data-aos-delay="100">
              <img src="../assets/img/report.jpg" alt="">
            </div>
          </div>

          <div class="col-lg-7 col-md-6">
            <div class="about-content" data-aos="fade-left" data-aos-delay="100">
              <h2>Record New Test</h2><br>
              <div class="form">
                <form method="POST">
                    <div class="form-group">
                      <input type="text" name="patientUname" class="form-control" id="patientUname" placeholder="Patient's Username" required/>
                      <small class="form-text text-muted">Please Enter Patient's username.</small>
                    </div><br>

                    <div class="form-group">
                      <input type="password" name="patientPassword" class="form-control" id="patientPassword" placeholder="Patient's Password"/>
                      <small class="form-text text-muted">Please Enter Patient's password.</small>
                    </div><br>

                    <div class="form-group">
                      <input type="text" name="patientName" class="form-control" id="patientName" placeholder="Patient's Fullname"/>
                      <small class="form-text text-muted">Please Enter Patient's fullname.</small>
                    </div><br>

                    <div class="form-group">
                      <select id="patientType" name="patientType">
                        <option value="0" disabled>Patient Type</option>
                        <option value="Returnee">Returnee</option>
                        <option value="Quarantined">Quarantined</option>
                        <option value="Infected">Infected</option>
                        <option value="Suspected">Suspected</option>
                        <option value="Clost Contact">Close Contact</option>
                      </select>

                    <!--  <div class="dropdown">
                        <button class="dropdown-toggle" name="patientType" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                          Patient Type
                          <span class="caret"></span>
                        </button>
                        <small class="form-text text-muted">Please select at least <b> ONE </b> patient type</small>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <li><a data-value="returnee">Returnee</a></li>
                          <li><a data-value="quarantined">Quarantined</a></li>
                          <li><a data-value="infected">Infected</a></li>
                          <li><a data-value="suspected">Suspected</a></li>
                          <li><a data-value="close contact">Close Contact</a></li>
                        </ul>
                      </div>
                    </div><br> -->


                    <div class="form-group">
                        <p>Patient Symptoms:</p>
                        <div class="row">
                        <div class="g-full-width--xs g-margin-b-20--xs g-margin-b-0--md"  style="padding-left:30px;">
                              <div class="input-group">
                                <div class="col-md-12">
                              <div class="row">
                                <div class="g-full-width--xs g-margin-b-20--xs g-margin-b-0--md"  style="padding-left:30px;">
                                  <div class="input-group">
                                    <div class="col-md-1 cell">
                                    <input id="Flu" type="checkbox" name="symptoms[]" value = "Flu"> Flu
                                  </div>
                                  </div>
                                </div>

                          <div class="g-full-width--xs g-margin-b-20--xs g-margin-b-0--md"  style="padding-left:30px;">
                                <div class="input-group">
                                  <div class="col-md-1 cell">
                                  <input id="Cough" type="checkbox" name="symptoms[]" value = "Cough" > Cough
                                </div>
                                </div>
                              </div>
                              <div class="g-full-width--xs g-margin-b-20--xs g-margin-b-0--md"  style="padding-left:30px;">
                                    <div class="input-group">
                                      <div class="col-md-1 cell">
                                      <input id="Fever" type="checkbox" name="symptoms[]" value = "Fever" > Fever
                                    </div>
                                    </div>
                                  </div>

                                  <div class="g-full-width--xs g-margin-b-20--xs g-margin-b-0--md"  style="padding-left:30px;">
                                        <div class="input-group">
                                          <div class="col-md-1 cell">
                                          <input id="Sore Throat" type="checkbox" name="symptoms[]" value = "Sore Throat" > Sore Throat
                                        </div>
                                        </div>
                                      </div>
                                  </div>
                                    </div>
                                  </div>
                                      <br><br>

                    <div class="form-group">
                      <input type="text" name = "symptoms[]" class="form-control" id="patientUname" placeholder="Other"/>
                      <small class="form-text text-muted">Other symptoms (if any)</small>
                    </div><br>

                      <div class="text-center"><button id="submitButton" name="submitForm" type="submit" onclick="verifyForm()">Record</button></div>
                      <br><br>

              <ul>
                <li><i class="ion-android-checkmark-circle"></i> Registered Patients are displayed below.</li>
              </ul>
            </div>
          </div>
        </form>
        </div>
      </div>

    </section>

    <!-- ======= Table Section ======= -->
    <section id="viewRecord" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-sm-12">
            <header class="section-header">
              <h3>Recorded New Test</h3>
            </header>
            <div class="text-center">
              <form action="">
                <input class = "form-control" type="text" placeholder="Search Test ID..." name="search" id="search">
              </form>
            </div>
            <?php
              $mysqli = new mysqli ('localhost', 'root', '', 'ctisdb') or die (mysqli_error($mysqli));
              $result = $mysqli->query("SELECT * FROM User u, covidTest ct WHERE ct.tester_username='" . $_SESSION["current_user"] . "' AND u.userType = 'p' AND u.username = ct.patient_username") or die ($mysqli->error);
             ?>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Test ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Patient Type</th>
                    <th scope="col">Symptoms</th>
                    <th scope="col">Test Status</th>
                    <th scope="col">Test Date</th>
                  </tr>
                </thead>
                <?php
                  while($rowTest = $result->fetch_assoc()):
                 ?>
                <tbody id="searchingTable">
                  <tr>
                    <td><?php echo $rowTest['testID'] ?></td>
                    <td><?php echo $rowTest['patient_username'] ?></td>
                    <td><?php echo $rowTest['password'] ?></td>
                    <td><?php echo $rowTest['fullname'] ?></td>
                    <td><?php echo $rowTest['patientType'] ?></td>
                    <td><?php echo $rowTest['symptoms'] ?></td>
                    <td><?php echo $rowTest['status'] ?></td>
                    <td><?php echo $testDate ?></td>
                  </tr>

                </tbody>
                <?php endwhile; ?>
            </table>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="section-bg">
      <div class="footer-top">
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-6">

                  <div class="footer-info">
                    <h3>CTIS</h3>
                    <p>There are many Covid-19 test centres that have been set up to manage Covid-19 testing. A
                        Covid Testing Information System (CTIS) is required that to allow the health ministry to keep
                        track of tests that have been performed by the various test centres.
                    </p>
                  </div>

                  <div class="footer-newsletter">
                    <h4>Covid-19</h4>
                    <p>Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus.
                      Most people infected with the COVID-19 virus will experience mild to moderate respiratory illness and recover without requiring special treatment.
                    </p>
                  </div>

                </div>

                <div class="col-sm-6">
                  <div class="footer-links">
                    <h4>Pages</h4>
                    <ul>
                      <li><a href="recordNewTest.php">Record New Test</a></li>
                      <li><a href="updateTestResult.php">Update Test Result</a></li>
                      <li><a href="testReportTester.php">Generate Test Report</a></li>
                    </ul>
                  </div>

                  <div class="footer-links">
                    <h4>Contact Us</h4>
                    <p>
                      <strong>Address : </strong>No. 15, Jalan Sri Semantan 1, Off, Jalan Semantan<br>
                      Bukit Damansara, 50490<br>
                      Kuala Lumpur<br>
                      <strong>Phone : </strong>012-123-4567<br>
                      <strong>Email : </strong>CTIS@gmail.com<br>
                    </p>
                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>
      </div>

      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong>CTIS</strong>. All Rights Reserved
        </div>
      </div>
    </footer><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/counterup/counterup.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>

  <!-- Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>
