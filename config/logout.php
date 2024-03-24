<?php
session_start();
 ($_SESSION['valid']);
session_destroy();
header("Location: ../login.php");
?>