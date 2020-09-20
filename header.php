<?php
include('con_pdo.php');
session_start();
// print_r($_SESSION['projects_point']); die;

$email = isset($_SESSION['projects_point']['user_email']) ? $_SESSION['projects_point']['user_email'] : '';
$username = isset($_SESSION['projects_point']['name']) ? $_SESSION['projects_point']['name'] : '';
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Projects Point</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
      <div class="d-flex">
        <a href="index.php" class="logo">
          <img src="assets/img/projects_point_logo.png" alt="Projects Point" class="img-fluid">
          <!-- <h1 class="logo">Projects Point</h1> -->
        </a>
      </div>
     
      <!-- Uncomment below if you prefer to use an image logo -->

      <nav class="nav-menu d-none d-lg-block ml-auto">

        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="allprojects.php">Projects</a></li>
          <li><a href="contact.php">Contact</a></li>

        </ul>

      </nav><!-- .nav-menu -->
      <div class="ml-auto">
							<?php if (!isset($_SESSION['projects_point']['user_email'])) { ?>
                <a href="admin/login.php">Admin Login</a>
							<?php } else { ?>
                <a href="admin/logout.php"><?php echo "(".$username.")logout" ?></a>
							<?php } ?>
      </div>


    </div>
  </header><!-- End Header -->
