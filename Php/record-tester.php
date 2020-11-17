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
        <?php include_once "tester-action.php" ?>
      <h1 class="logo mr-auto"><a href="TCOhomepage.html"><img src="../assets/img/logo.png" alt="logoCTIS" width="60px" height="auto">CTIS</a></h1>


      <nav class="main-nav d-none d-lg-block">
        <ul>
          <li><a href="#">Welcome back, <?php echo $userArr['username']; ?></a></li>
          <li class="drop-down"><a href="">Actions</a>
            <ul>
              <li><a href="TCOhomepage.php">Register Test Center</a></li>
              <li class="active"><a href="#recordTester">Record Tester</a></li>
              <li><a href="manage-test-kit.php">Manage Test Kit Stock</a></li>
              <li><a href="testReportTCO.php">Generate Test Report</a></li>
            </ul>
          </li>
          <li><a href="#footer">Contact Us</a></li>
          <li><a href="loginNew.php">Log Out</a></li>
        </ul>
      </nav><!-- .main-nav-->

    </div>
  </header><!-- End Header -->

  <!-- ======= Record Tester image and button Section ======= -->
  <section id="imageButton" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center" data-aos="fade-up">
        <div class="col-md-6 intro-info order-md-first order-last" data-aos="zoom-in" data-aos-delay="100">
          <h2>Covid Testing<br>Information <span>System</span></h2>
          <h3>Record Tester</h3>
          <div>
            <a href="#recordTester" class="btn-get-started scrollto">Proceed to Record a Tester</a>
          </div>
        </div>

        <div class="col-md-6 intro-img order-md-last order-first" data-aos="zoom-out" data-aos-delay="200">
          <img src="../assets/img/record-tester.png" alt="" class="img-fluid">
        </div>
      </div>
    </div>
  </section>

  <main id="main">

    <!-- ======= Record tester Section ======= -->
    <form action = "record-tester.php" method ="POST">
    <section id="recordTester" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row">

          <div class="col-lg-5 col-md-6">
            <div class="about-img" data-aos="fade-right" data-aos-delay="100">
              <img src="../assets/img/tester.jpg" alt="">
            </div>
          </div>

          <div class="col-lg-7 col-md-6">
            <div class="about-content" data-aos="fade-left" data-aos-delay="100">
              <h2>Record a new Tester</h2><br>
              <div class="form">
                    <div class="form-group">
                      <input type="text" name="testerUname" class="form-control" id="testerUname" placeholder="Tester's Username" required/>
                      <small class="form-text text-muted">Please create Tester's username.</small>
                    </div><br>
                    <div class="form-group">
                      <input type="password" name="testerPassword" class="form-control" id="testerPassword" placeholder="Tester's Password"/>
                      <small class="form-text text-muted">Please create Tester's password.</small>
                    </div><br>
                    <div class="form-group">
                      <input type="text" name="testerName" class="form-control" id="testerName" placeholder="Tester's Fullname"/>
                      <small class="form-text text-muted">Please enter Tester's fullname.</small>
                    </div><br>
                      <div class="text-center"><button name="submitForm" type="submit" onclick = verifyTester()>Register</button></div>
                      <br><br>

              <ul>
                <li><i class="ion-android-checkmark-circle"></i> Testers should be registered wisely. Changes are currently <b>NOT</b> available.</li>
                <li><i class="ion-android-checkmark-circle"></i> Registered testers are displayed below.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </form>
    </section>

    <!-- ======= Tester table Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Recorded Tester</h3>
        </header>
        <?php require_once 'tester-action.php'; ?>
        <?php
          $mysqli = new mysqli('localhost','root','','ctisdb') or die(mysqli_error($mysqli));
          $resultTester = $mysqli->query("SELECT * FROM User WHERE userType ='t' AND registeredBy='" . $_SESSION["current_user"] . "'") or die ($mysqli->error);
          ?>
        <div style="overflow-x:auto;">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Tester's Username</th>
                <th scope="col">Tester's Password</th>
                <th scope="col">Tester's Fullname</th>
                <th scope="col">Edit</th>
              </tr>
            </thead>
            <?php
            while($rowTester = $resultTester->fetch_assoc()):
            ?>
            <tbody>
              <tr>
                <td><?php echo $rowTester['username'] ?></td>
                <td><?php echo $rowTester['password'] ?></td>
                <td><?php echo $rowTester['fullname'] ?></td>

                <td><a href ="record-tester.php?edit=<?php echo $rowTester['username'];?>"
                  class="btn btn-info"><i class="fa fa-edit"></a></td>

              </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php
        if(isset($_SESSION['message'])):
        ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
          <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
          ?>
        </div>
          <br><br>
      </div>
    </div>
    </section><!-- End Services Section -->

    <?php endif; ?>
      </div>
    </div>
    </section><!-- End Services Section -->

    <div class="row">
      <div class="col-lg-12 col-md-6">
          <form action="tester-action.php" method="post">
            <div class="container" data-aos="fade-up">
              <table class="table">
              <thead><tr>
            <th>
                <input type="text" name="testerUname" class="form-control"
                value="<?php echo $username;?>" placeholder="i.e. plastic" required
              <input type="text" name="testerUname" class="form-control"
              value="<?php echo $username;?>" placeholder="i.e. plastic" required>
            </th>
          </div>

          <th>
              <input type="text" name="testerPassword" class="form-control"
              value="<?php echo $password;?>" placeholder="i.e. plastic" required
            <input type="text" name="testerPassword" class="form-control"
            value="<?php echo $password;?>" placeholder="i.e. plastic" required>
          </th>

          <th>
              <input type="text" name="testerName" class="form-control"
              value="<?php echo $fullname;?>" placeholder="i.e. plastic" required
            <input type="text" name="testerName" class="form-control"
            value="<?php echo $fullname;?>" placeholder="i.e. plastic" required>
          </th>
            <th>
              <?php if ($update==true): ?>
              <button type="submit" class="btn btn-info" name="update">Update</button>
              <?php else: ?>
                <button type="submit" class="btn btn-info" name="save">Save</button>
                <?php endif; ?>
            </th></tr>
          </table>

          </form>
        </div>
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
                      <li><a href="TCOhomepage.php">Register Test Center</a></li>
                      <li><a href="record-tester.php">Record Tester</a></li>
                      <li><a href="manage-test-kit.php">Manage Test Kit</a></li>
                      <li><a href="testReportTCO.php">Generate Test Report</a></li>
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
