<?php
$con=mysqli_connect("localhost","root","","student");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $sql="INSERT INTO activity (regno, name , message) VALUES ('".$_POST['id']."','".$_POST['name']."','".$_POST['message']."')";
if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }

header('Location:activitys.php');
mysqli_close($con);
?>