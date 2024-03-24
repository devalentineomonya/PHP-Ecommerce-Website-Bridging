<?php
session_start();
include('config/constants.php');
if (isset($_POST['submit'])) {
  if (empty($_POST['user_name'])) {
    echo $_SESSION['add'] = "
        <div class='error'>
        User Name Is Required
        <div class='btn_close'>
        <a href='login.php'
        >X</a></div>
        </div>";
  } else if (empty($_POST['password'])) {
    echo $_SESSION['add'] = "
        <div class='error'>
        Pasword Is Required
        <div class='btn_close'>
        <a href='login.php'
        >X</a></div>
        </div>";
  } else if (empty($_POST['passwordr'])) {
    echo $_SESSION['add'] = "
        <div class='error'>
        Repeat password Required
        <div class='btn_close'>
        <a href='login.php'
        >X</a></div>
        </div>";
  } else {
    $user_name = htmlspecialchars($_POST['user_name']);
    $password = htmlspecialchars($_POST['password']);
    $passwordr = htmlspecialchars($_POST['passwordr']);

    if ($password == $passwordr) {
      $sql = "SELECT*FROM tbl_users WHERE user_name='$user_name' OR 
      email = '$user_name' AND password = '$password'";
      $res = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($res);
      $user_data = mysqli_fetch_assoc($res);

      if ($count > 0 && password_verify($password, $user_data['password'])) {
        // Password is correct, set session and redirect
        $_SESSION['valid'] = $user_data['Id'];
        header('location: index.php');
      } else {
        // Password is incorrect
        echo $_SESSION['add'] = "<div class='error'>Wrong Username or Password<div class='btn_close'><a href='login.php'>X</a></div></div>";
      }
    } else {
      echo $_SESSION['add'] = "
  <div class='error'>
  password didn't match
  <div class='btn_close'>
  <a href='login.php'
  >X</a></div>
  </div>";
    }
  }
}
?>

<link rel="stylesheet" href="css/styles.css">
<!-- Login -->
<div class="container">
  <div class="login-form">
    <form action="" method="post">

      <h1>Login</h1>
      <p>
        PLease fil this form to Login or
        <a href="signup.php">Sign Up</a>
      </p>

      <label for="user_name">User Name</label>
      <input type="text" name="user_name" />

      <label for="Password">Password</label>
      <input type="password" name="password" />

      <label for="password">Password Repeat</label>
      <input type="password" name="passwordr" />

      <p>
        <input type="checkbox">Remember Me</input>.
      </p>

      <div class="buttons">


        <a href="signup.php"> <button type="button" class="cancelbtn">Sign up</button></a>
        <button name="submit" type="submit" class="signupbtn">Login</button>
      </div>
    </form>

  </div>
</div>