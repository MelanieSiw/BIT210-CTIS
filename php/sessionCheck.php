<?php

if(!(isset($_SESSION['current_user']))){
  echo ("<script> alert ('Session has expired. Please login again');
  window.location.href = 'index.php'; </script>");
}

 ?>
