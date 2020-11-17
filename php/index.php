<?php

session_start();
if(isset($_SESSION['current_user'])){session_unset($_SESSION['current_user']);}

if(isset($_POST['loginBtn'])){
  include_once("ctisdb.php");

  $name = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM User WHERE username='$name' AND password = '$password'";
  $result = mysqli_query($con,$sql);
	$resultArr = mysqli_fetch_array($result);

  if (mysqli_num_rows($result)>0 && $name == $resultArr['username'] && $password == $resultArr['password'] ){
    $currentUser = $resultArr['username'];
    $_SESSION['current_user'] = $currentUser; //Session set the current user
    echo "<script>alert('Login Successfully')</script>";
    if($resultArr['userType'] == "m"){
        header("location:TCOhomepage.php");
    }elseif ($resultArr['userType'] == "t") {
        header("location:recordNewTest.php");
    }else if ($resultArr['userType'] =="p"){
      header("location:patientHomepage.php");
    }
  }else{
    echo "<script>alert('Incorrect username or password')</script>";
  }

}

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CTIS</title>

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- Favicons -->
  <link href="../assets/img/logo.png" rel="icon">

</head>

<body class="login-background">
    <!-- ======= Login Section ======= -->
    <section id="login" class="portfolio section-bg">
      <div class="container pt-5" data-aos="fade-up">

        <header class="section-header text-center">
          <img src="../assets/img/logo.png" alt="logoCTIS" width="70px" height="auto">
          <h3 class="section-title mt-3">Login User</h3>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12">
            <div class="form">
              <form action="loginNew.php" method="post" role="form">
                <div class="form-group login-width">
                  <label for="name"><h6>Username</h6></label>
                  <input type="text" name="username" class="form-control" id="usernameLogin" placeholder="E.g. Samuel"/>
                  <div class="validate"></div>
                </div><br>
                <div class="form-group login-width">
                  <label for="password"><h6>Password</h6></label>
                  <input type="password" class="form-control" name="password" id="passwordLogin" placeholder="Password"/>
                  <div class="validate"></div>
                </div>
                <div class="text-center"><button id="login_button" name="loginBtn" type="submit" onclick="getInfo()">Login</button></div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </section>


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
