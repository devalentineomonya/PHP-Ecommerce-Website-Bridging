<?php

session_start();
if (isset($_SESSION['valid'])) {
   unset($_SESSION['add']);
} else {
   header("Location: login.php");
}
