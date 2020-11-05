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
              <li><a href="TCOhomepage.html">Register Test Center</a></li>
              <li><a href="record-tester.html">Record Tester</a></li>
              <li class="active"><a href="#manageTK">Manage Test Kit Stock</a></li>
              <li><a href="testReportTCO.html">Generate Test Report</a></li>
            </ul>
          </li>
          <li><a href="#footer">Contact Us</a></li>
          <li><a href="loginNew.html">Log Out</a></li>
        </ul>
      </nav><!-- .main-nav-->

    </div>
  </header><!-- End Header -->

  <!-- ======= Manage Test Kit Stock image and button section ======= -->
  <section id="imageButton" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center" data-aos="fade-up">
        <div class="col-md-6 intro-info order-md-first order-last" data-aos="zoom-in" data-aos-delay="100">
          <h2>Covid Testing<br>Information <span>System</span></h2>
          <h3>Manage Test Kit</h3>
          <div>
            <a href="#manageTK" class="btn-get-started scrollto">Proceed to Managing Test Kit Stocks</a>
          </div>
        </div>

        <div class="col-md-6 intro-img order-md-last order-first" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/test_kit.png" alt="" class="img-fluid">
        </div>
      </div>

    </div>
  </section>

  <main id="main">

    <!-- ======= Manage Test Kit Stock Section ======= -->
    <section id="manageTK" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row">

          <div class="col-lg-5 col-md-6">
            <div class="about-img" data-aos="fade-right" data-aos-delay="100">
              <img src="assets/img/test-kit.jpg" alt="">
            </div>
          </div>

          <div class="col-lg-7 col-md-6">
            <div class="about-content" data-aos="fade-left" data-aos-delay="100">
              <h2>Add Test Kit Stock</h2><br>
              <div class="form">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" id="testkitName" placeholder="Test Kit name"/>
                      <small class="form-text text-muted">Please enter Test Kit name.</small>
                    </div>

                    <div class="form-group">
                      <input
                        type="number"
                        name="stock"
                        id="stock"
                        class="form-control"
                        pattern="^$|^([0-9]|[1-9][0-9]|[1][0][0])?"
                        required
                        placeholder="e.g. 1">
                      <small class="form-text text-muted">Please enter the amount for this test kit.</small>
                    </div>

                    </div>
                      <div class="text-center"><button onclick = verifyTestKit()>Add Test Kit</button></div>
                      <br><br><br><br>



              <ul>
                <li><i class="ion-android-checkmark-circle"></i> Test Center Name should be entered wisely. Changes are currently <b>NOT</b> available.</li>
                <li><i class="ion-android-checkmark-circle"></i> To edit or delete any test kits, please proceed to the table <b>below</b>. </a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </section>

    <!-- ======= Table Section ======= -->
    <section id="addDelete" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Manage Test Kit Stocks</h3><br>
        </header>
        <div class="text-center">
          <form action="">
            <input class = "form-control" type="text" placeholder="Search Test Kit..." name="search" id="search"> <br>
          </form>
        </div>

        <div style="overflow-x:auto;">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Test Kit ID</th>
                <th scope="col">Test Kit Name</th>
                <th scope="col">Stock</th>
                <th scope="col">Delete</th>
                <th scope="col">Save</th>
              </tr>
            </thead>
            <tbody id="searchingTable">
              <tr>
                <td scope="row">TK-1</td>
                <td>Blood Test Test Kit</td>
                <td><input
                  type="number"
                  name="stock"
                  id="stockEdit"
                  class="form-control"
                  pattern="^$|^([0-9]|[1-9][0-9]|[1][0][0])?"
                  required
                  placeholder="e.g. 1"></td>
                <td><button class="btn"><i class="fa fa-trash"></button></td>
                <td><button class="btn" onclick = verifyTestKitEdit()><i class="fa fa-save"></button></td>
              </tr>

              <tr>
                <td scope="row">TK-2</td>
                <td>Fluid Test Kit</td>
                <td><input
                  type="number"
                  name="stock"
                  id="stockEdit"
                  class="form-control"
                  pattern="^$|^([0-9]|[1-9][0-9]|[1][0][0])?"
                  required
                  placeholder="e.g. 1"></td>
                <td><button class="btn"><i class="fa fa-trash"></button></td>
                <td><button class="btn" onclick = verifyTestKitEdit()><i class="fa fa-save"></button></td>
              </tr>

              <tr>
                <td scope="row">TK-3</td>
                <td>Flame Test Kit</td>
                <td><input
                  type="number"
                  name="stock"
                  id="stockEdit"
                  class="form-control"
                  pattern="^$|^([0-9]|[1-9][0-9]|[1][0][0])?"
                  required
                  placeholder="e.g. 1"></td>
                <td><button class="btn"><i class="fa fa-trash"></button></td>
                <td><button class="btn" onclick = verifyTestKitEdit()><i class="fa fa-save"></button></td>
              </tr>

            </tbody>
        </table>
          <br><br>
      </div>
    </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->

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
