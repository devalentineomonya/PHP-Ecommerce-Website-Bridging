
<?php include('config/constants.php'); ?>
<!-- Login -->
<div class="container">
  <div class="login-form">
    <form action="" method="post">

      <h1>Sign Up</h1>
      <p>
        Please fill in this form to create an account. or
        <a href="login.php">Login</a>
      </p>

      <label for="full_name">Full Name</label>
      <input type="text" name="full_name" />
      <label for="user_name">User Name</label>
      <input type="text" name="user_name" />

      <label for="email">Email</label>
      <input type="text" name="email" />

      <label for="password">Password</label>
      <input type="password" name="password" />

      <p>
        By creating an account you agree to our
        <a href="#">Terms & Privacy</a>.
      </p>

      <div class="buttons">
        <a href="login.php"> <button type="button" class="cancelbtn">Login</button></a>
        <button name="submit" type="submit" class="signupbtn">Sign Up</button>
      </div>
    </form>
    <?php

    if (isset($_POST['submit'])) {
      if (empty($_POST['full_name'])) {
        echo $_SESSION['add'] = "
            <div class='error'>
            Full Name Is Required
            <div class='btn_close'>
            <a href='signup.php'
            >X</a></div>
            </div>";
      } else if (empty($_POST['user_name'])) {
        echo $_SESSION['add'] = "
            <div class='error'>
            User Name Is Required
            <div class='btn_close'>
            <a href='signup.php'
            >X</a></div>
            </div>";
      } else if (empty($_POST['email'])) {
        echo $_SESSION['add'] = "
            <div class='error'>
            Email Is Required
            <div class='btn_close'>
            <a href='signup.php'
            >X</a></div>
            </div>";
      } else if (empty($_POST['password'])) {
        echo $_SESSION['add'] = "
            <div class='error'>
            Password Is Required
            <div class='btn_close'>
            <a href='signup.php'
            >X</a></div>
            </div>";
      } else {
        $full_name = htmlspecialchars($_POST['full_name']);
        $user_name = htmlspecialchars($_POST['user_name']);
        $email = htmlspecialchars($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "SELECT* FROM tbl_users WHERE
         user_name = '$user_name' OR 
         email = '$email'";

        // find the database you want to insert this data to database
        // inserts data into the database
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if ($count > 0) {
          echo  $_SESSION['add'] = "
       <div class='error'>
       This email already or username already exists
       <div class='btn_close'>
       <a href='signup.php'
       >X</a></div>
       </div>";
        } else {
          $sql = "INSERT INTO tbl_users SET
          full_name = '$full_name',
          user_name = '$user_name', 
          email = '$email',
          password = '$password'";
          $res = mysqli_query($conn, $sql);
          if ($res == true) {
            echo $_SESSION['add'] = "
              <div class='success'>
              User Added Successfully
              <div class='btn_close'>
              <a href='signup.php'
              >X</a></div>
              </div>";
          } else {
            echo $_SESSION['add'] = "
            <div class='error'>
            FAILED TO ADD USER
            <div class='btn_close'>
            <a href='signup.php'
            >X</a></div>
            </div>";
          }
        }
      }
    }

    ?>
  </div>
</div>