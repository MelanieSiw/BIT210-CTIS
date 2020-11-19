<?php

$mysqli = new mysqli('localhost', 'root', '', 'ctisdb') or die(mysqli_error($mysqli));

session_start();
include_once 'ctisdb.php';
include_once 'sessionCheck.php';

$sql = "SELECT(['patientType, symptoms']) FROM User WHERE username ='" . $_SESSION["current_user"] . "'";

$sql = "SELECT * FROM covidTest WHERE username ='" . $_SESSION["current_user"] . "'";
$result = mysqli_query($con, $sql);
$userArr = mysqli_fetch_array($result);
$patient_username = $userArr['username'];

$patientType = '';
$symptoms = '';
$testDate = date("Y-m-d");
$result = '';
$resultDate = date("Y-m-d");
$status = '';

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

      <h1 class="logo mr-auto"><a href="#"><img src="../assets/img/logo.png" alt="logoCTIS" width="60px" height="auto">CTIS</a></h1>


      <nav class="main-nav d-none d-lg-block">
        <ul>
          <li><a href="#">Welcome back, <?php echo $userArr['username']; ?></a></li>
          <li><a href="#footer">Contact Us</a></li>
          <li><a href="loginNew.php">Log Out</a></li>
        </ul>
      </nav><!-- .main-nav-->

    </div>
  </header><!-- End Header -->

  <!-- ======= Patient Homepage Section ======= -->
  <section id="imageButton" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center" data-aos="fade-up">
        <div class="col-md-6 intro-info order-md-first order-last" data-aos="zoom-in" data-aos-delay="100">
          <h2>Covid Testing<br>Information <span>System</span></h2>
          <h3>View Test History</h3>
          <div>
            <a href="#viewTestHistory" class="btn-get-started scrollto">Go ahead and View Test History</a>
          </div>
        </div>

        <div class="col-md-6 intro-img order-md-last order-first" data-aos="zoom-out" data-aos-delay="200">
          <img src="../assets/img/doctors.png" alt="doctors" width="90%" height="auto" class="img-fluid">
        </div>
      </div>

    </div>
  </section>

  <main id="main">

    <!-- ======= View Testing History Section ======= -->
    <section id="viewTestHistory" class="section-bg">

      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-12 col-md-6">
            <div class="about-content" data-aos="fade-left" data-aos-delay="100">
              <br><h2>View result and test history</h2><br>
              <div style="overflow-x:auto;">
              <?php
                $mysqli = new mysqli ('localhost', 'root', '', 'ctisdb') or die (mysqli_error($mysqli));
                $result = $mysqli->query("SELECT * FROM User u, covidTest ct WHERE ct.tester_username='" . $_SESSION["current_user"] . "' AND u.userType = 'p' AND u.username = ct.patient_username") or die ($mysqli->error);
              ?>
              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Test ID</th>
                      <th scope="col">Patient Type</th>
                      <th scope="col">Patient Symptoms</th>
                      <th scope="col">Test Date</th>
                      <th scope="col">Result</th>
                      <th scope="col">Result Date</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <?php
                    while($rowTest = $result->fetch_assoc()):
                   ?>
                  <tbody id="searchingTable">
                    <tr>
                      <td><?php echo $rowTest['testID'] ?></td>
                      <td><?php echo $rowTest['patientType'] ?></td>
                      <td><?php echo $rowTest['symptoms'] ?></td>
                      <td><?php echo $rowTest['status'] ?></td>
                      <td><?php echo $testDate ?></td>
                    </tr>

                  </tbody>
                  <?php endwhile; ?>
              </table>
                <br><br>
            </div>
          </div>
        </div>
      </div>
    </div>

    </section>

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


                </div>

                <div class="col-sm-6">
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

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>
