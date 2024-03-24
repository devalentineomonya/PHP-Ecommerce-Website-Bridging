<?php
include("config/constants.php");
include("config/current_user.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Box icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
  
  <link rel="stylesheet" href="css/styles.css"> />

</head>

<body>
  <!-- Navigation -->
  <div class="top-nav">
    <div class="container d-flex">
      <p>Order Online Or Call Us: (001) 2222-55555</p>
      <ul class="d-flex">
        <li><a href="#">About Us</a></li>
        <li><a href="#">FAQ</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
  </div>
  <div class="navigation">
    <div class="nav-center container d-flex">
      <a href="index.php" class="logo">
        <h1>Dans</h1>
      </a>

      <ul class="nav-list d-flex">
        <li class="nav-item">
          <a href="/" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="product.php" class="nav-link">Shop</a>
        </li>
        <li class="nav-item">
          <a href="#terms" class="nav-link">Terms</a>
        </li>
        <li class="nav-item">
          <a href="#about" class="nav-link">About</a>
        </li>
        <li class="nav-item">
          <a href="#contact" class="nav-link">Contact</a>
        </li>
        <li class="icons d-flex">
          <a href="login.php" class="icon">
            <i class="bx bx-user"></i>
          </a>
          <div class="icon">
            <i class="bx bx-search"></i>
          </div>
          <div class="icon">
            <i class="bx bx-heart"></i>
            <span class="d-flex">0</span>
          </div>
          <?php
          $Id = $_SESSION['valid'];
          $sql = "SELECT*FROM tbl_cart WHERE user_id = $Id ";
          $res = mysqli_query($conn, $sql);
          $count = mysqli_num_rows($res);
      ?>
                <a href="cart.php" class="icon">
            <i class="bx bx-cart"></i>
            <span class="d-flex"><?php echo $count;?></span>
          </a>
      <?php

          ?>




        </li>
      </ul>

      <div class="icons d-flex">
        <a href="config/logout.php" class="icon">
          <i class="bx bx-user"></i>
        </a>
        <div class="icon">
          <i class="bx bx-search"></i>
        </div>
        <div class="icon">
          <i class="bx bx-heart"></i>
          <span class="d-flex">0</span>
        </div>
        <?php
          $Id = $_SESSION['valid'];
          $sql = "SELECT*FROM tbl_cart WHERE user_id = $Id ";
          $res = mysqli_query($conn, $sql);
          $count = mysqli_num_rows($res);
      ?>
                <a href="cart.php" class="icon">
            <i class="bx bx-cart"></i>
            <span class="d-flex"><?php echo $count;?></span>
          </a>
      <?php

          ?>
      </div>

      <div class="hamburger">
        <i class="bx bx-menu-alt-left"></i>
      </div>
    </div>
  </div>