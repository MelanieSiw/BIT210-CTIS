<?php

session_start();

$msg ='';
$mysqli = new mysqli('localhost', 'root', '', 'ctisdb') or die(mysqli_error($mysqli));

$centreName ='';

if (isset($_POST['submitForm'])){
  $centreName = $_POST['centreName'];

  $centreName = mysqli_real_escape_string($mysqli, $_POST['centreName']);
  $check_duplicate = "SELECT centreName from TestCentre where centreName = '$centreName'";
  $result = mysqli_query($mysqli, $check_duplicate);
  $count = mysqli_num_rows($result);

  if($count > 0){
    echo "<script>alert('Test Centre name has been taken')</script>";
  }else {
    $mysqli->query("INSERT INTO TestCentre (centreName) VALUES ('$centreName')") or
    die ($mysqli->error);
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
  <link href="assets/img/logo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Connect to Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="TCOhomepage.html"><img src="assets/img/logo.png" alt="logoCTIS" width="60px" height="auto">CTIS</a></h1>

      <nav class="main-nav d-none d-lg-block">
        <ul>
          <li><a href="#">Welcome back, Test Center Manager</a></li>
          <li class="drop-down"><a href="">Actions</a>
            <ul>
              <li class="active"><a href="#registerTC">Register Test Center</a></li>
              <li><a href="record-tester.html">Record Tester</a></li>
              <li><a href="manage-test-kit.html">Manage Test Kit Stock</a></li>
              <li><a href="testReportTCO.html">Generate Test Report</a></li>
            </ul>
          </li>
          <li><a href="#footer">Contact Us</a></li>
          <li><a href="loginNew.html">Log Out</a></li>
        </ul>
      </nav><!-- .main-nav-->

    </div>
  </header><!-- End Header -->

  <!-- ======= Register Test Center image and button section ======= -->
  <section id="imageButton" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center" data-aos="fade-up">
        <div class="col-md-6 intro-info order-md-first order-last" data-aos="zoom-in" data-aos-delay="100">
          <h2>Covid Testing<br>Information <span>System</span></h2>
          <h3>Register Test Center</h3>
          <div>
            <a href="#registerTC" class="btn-get-started scrollto">Get started by Registering a Test Center</a>
          </div>
        </div>

        <div class="col-md-6 intro-img order-md-last order-first" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/ctis.png" alt="" class="img-fluid">
        </div>
      </div>

    </div>
  </section>

  <main id="main">

    <!-- ======= Register Test Center Section ======= -->
    <section id="registerTC" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row">

          <div class="col-lg-5 col-md-6">
            <div class="about-img" data-aos="fade-right" data-aos-delay="100">
              <img src="assets/img/mask.jpg" alt="">
            </div>
          </div>

          <div class="col-lg-7 col-md-6">
            <div class="about-content" data-aos="fade-left" data-aos-delay="100">
              <h2>Register New Test Center</h2><br>
              <div class="form">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" id="tcName" placeholder="Test Center Name"/>
                      <small class="form-text text-muted">Please enter Test Center name.</small>
                    </div>
                    </div>
                      <div class="text-center"><button id = "submitButton" name = "submitForm" type ="submit" onclick = "verifyTC()">Register</button></div>
                      <br><br><br><br>

              <h2>Registered Test Center</h2>
              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Test Center ID</th>
                      <th scope="col">Test Center Name</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td scope="row">TC-1</td>
                      <td>Sunway Test Center</td>
                      <td><button class="btn"><i class="fa fa-edit"></button></td>
                      <td><button class="btn"><i class="fa fa-trash"></button></td>
                    </tr>
                  </tbody>
              </table>
                <br><br>

              <ul>
                <li><i class="ion-android-checkmark-circle"></i> Only <b>ONE</b> Test Center is allowed for each Test Center Officer.</li>
                <li><i class="ion-android-checkmark-circle"></i> Test Center Name should be entered wisely. Changes are currently <b>NOT</b> available.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </section>

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>What you can do with us?</h3>
        </header>

        <div class="row">
          <div class="col-sm-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="box">
              <div class="icon" style="background: #fff0da;"><i class="ion-android-person-add" style="color: #ff689b;"></i></div>
              <h4 class="title">
                Record Tester
              </h4>
              <p>The person who tests patients for Coronavirus disease (COVID-19) infection</p>
              <a href="record-tester.html" class="btn btn-warning">
                Record Tester
              </a>
            </div>
          </div>

          <div class="col-sm-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="box">
              <div class="icon" style="background: #e6fdfc;"><i class="ion-settings" style="color: #e98e06;"></i></div>
              <h4 class="title">
              Manage Test Kit
              </h4>
              <p>The tools which used to test the patients for Coronavirus disease (COVID-19)</p>
              <a href="manage-test-kit.html" class="btn btn-warning">
                Manage Test Kit
              </a>
            </div>
          </div>

          <div class="col-sm-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="box">
              <div class="icon" style="background: #e6fdfc;"><i class="ion-android-clipboard" style="color: #3fcdc7;"></i></div>
              <h4 class="title">
                Generate Test Report
              </h4>
              <p>The test history of all tests that have been administered at the test centre</p>
              <a href="testReportTCO.html" class="btn btn-warning">
                Generate Test Report
              </a>
            </div>
          </div>

      </div>

      </div>
    </section><!-- End Services Section -->
    <hr>

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
                      <li><a href="TCOhomepage.html">Register Test Center</a></li>
                      <li><a href="record-tester.html">Record Tester</a></li>
                      <li><a href="manage-test-kit.html">Manage Test Kit</a></li>
                      <li><a href="testReportTCO.html">Generate Test Report</a></li>
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
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
