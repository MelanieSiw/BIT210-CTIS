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
      <?php include_once "update-test.php" ?>
      <h1 class="logo mr-auto"><a href="TCOhomepage.html"><img src="../assets/img/logo.png" alt="logoCTIS" width="60px" height="auto">CTIS</a></h1>

      <nav class="main-nav d-none d-lg-block">
        <ul>
          <li><a href="#">Welcome back, <?php echo $userArr['username']; ?></a></li>
          <li class="drop-down"><a href="">Actions</a>
            <ul>
              <li><a href="recordNewTest.php">Record New Test</a></li>
              <li class="active"><a href="updateTestResult.php">Update Test Result</a></li>
              <li><a href="testReportTester.php">Generate Test Report</a></li>
            </ul>
          </li>
          <li><a href="#footer">Contact Us</a></li>
          <li><a href="loginNew.php">Log Out</a></li>
        </ul>
      </nav><!-- .main-nav-->

    </div>
  </header><!-- End Header -->

  <!-- ======= Update Test Result image and button section ======= -->
  <section id="imageButton" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center" data-aos="fade-up">
        <div class="col-md-6 intro-info order-md-first order-last" data-aos="zoom-in" data-aos-delay="100">
          <h2>Covid Testing<br>Information <span>System</span></h2>
          <h3>Update Test Result</h3>
          <div>
            <a href="#viewRecord" class="btn-get-started scrollto">Got results? Proceed to update Test Results</a>
          </div>
        </div>

        <div class="col-md-6 intro-img order-md-last order-first" data-aos="zoom-out" data-aos-delay="200">
          <img src="../assets/img/updateTestResult.png" alt="" class="img-fluid">
        </div>
      </div>
    </div>
  </section>

  <main id="main">

    <!-- ======= Update test report Section ======= -->
    <section id="viewRecord" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-sm-12">
            <header class="section-header">
              <h3>Update Test Result</h3>
            </header>
            <?php require_once 'update-test.php'; ?>
            <div class="text-center">
              <form action="">
                <input class = "form-control" type="text" placeholder="Search Test ID..." name="search" id="search">
              </form>
            </div>
            <table class="table">
              <?php
                $resultTest = $mysqli->query("SELECT testID, patient_username, patientType, symptoms, status, testDate, result, resultDate FROM User u, covidTest ct WHERE u.userType ='p' AND ct.patient_username = u.username AND ct.tester_username='" . $_SESSION["current_user"] . "'") or die ($mysqli->error);
                ?>
                <thead>
                  <tr>
                    <th scope="col">Test ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Patient Type</th>
                    <th scope="col">Symptoms</th>
                    <th scope="col">Status</th>
                    <th scope="col">Test Date</th>
                    <th scope="col">Test Result</th>
                    <th scope="col">Result Date</th>
                    <th scope="col">Edit</th>
                  </tr>
                </thead>
                <tbody id="searchingTable">
                  <?php
                  while($rowTest = $resultTest->fetch_assoc()):
                  ?>
                  <tr>
                    <td><?php echo $rowTest['testID'] ?></td>
                    <td><?php echo $rowTest['patient_username'] ?></td>
                    <td><?php echo $rowTest['patientType'] ?></td>
                    <td><?php echo $rowTest['symptoms'] ?></td>
                    <td><?php echo $rowTest['status'] ?></td>
                    <td><?php echo $rowTest['testDate'] ?></td>
                    <td><?php echo $rowTest['result'] ?></td>
                    <td><?php echo $rowTest['resultDate'] ?></td>
                    <td><td><a href ="updateTestResult.php?edit=<?php echo $rowTest['testID'];?>"
                      class="btn btn-info"><i class="fa fa-edit"></a></td></td>
                  </tr>
                  <?php endwhile; ?>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    </section>

    <div class="row">
      <div class="col-lg-12 col-md-6">
          <form action="update-test.php" method="post">
            <input type="hidden" name="testID" value="<?php echo $testID ?>">
            <div class="container" data-aos="fade-up">
              <table class="table">
              <thead><tr>
            <th>
                <input type="text" name="testID" class="form-control"
                value="<?php echo $testID;?>" placeholder="i.e. plastic" disabled
              <input type="text" name="testID" class="form-control"
              value="<?php echo $testID;?>" placeholder="i.e. plastic" disabled>
            </th>
          </div>

          <th>
              <input type="text" name="patientUname" class="form-control"
              value="<?php echo $username;?>" placeholder="i.e. plastic" disabled
            <input type="text" name="patientUname" class="form-control"
            value="<?php echo $username;?>" placeholder="i.e. plastic" disabled>
          </th>

          <th>
              <input type="text" name="patientType" class="form-control"
              value="<?php echo $patientType ;?>" placeholder="i.e. plastic" disabled
            <input type="text" name="patientType" class="form-control"
            value="<?php echo $patientType;?>" placeholder="i.e. plastic" disabled>
          </th>

          <th>
              <input type="text" name="status" class="form-control"
              value="<?php echo $status;?>" placeholder="i.e. plastic" disabled
            <input type="text" name="status" class="form-control"
            value="<?php echo $status;?>" placeholder="i.e. plastic" disabled>
          </th>

          <th>
            <td><div class="form-group">
              <select id="result" name="result">
                <option value="0">Result</option>
                <option value="Negative">Negative</option>
                <option value="Positive">Positive</option>
              </select></td>
          </th>

            <th>
              <?php if ($update==true): ?>
              <button type="submit" class="btn btn-info" name="update">Update</button>
              <?php else: ?>
                <button type="submit" class="btn btn-info" name="save">Save</button>
                <?php endif; ?>
            </th></tr>
          </table>
          </div>
          </form>
        </div>
      </div>

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

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>
