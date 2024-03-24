<?php
include('config/constants.php');
$Id=$_GET['Id'];
$sql = "DELETE FROM tbl_cart WHERE Id=$Id";
$res = mysqli_query($conn,$sql);
if($res>0){
header("Location: cart.php");
}
