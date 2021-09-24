<?php
$message="";
if(count($_POST)>0) 
{
	session_start();
	$_SESSION['varname']=$_POST["username"];
	$conn = mysqli_connect("localhost","root","","student");
	$result = mysqli_query($conn,"SELECT * FROM studentuser WHERE uname='". $_POST["username"]. "' and pass = '". $_POST["password"]."'");
	$count  = mysqli_num_rows($result);
	if($count==0) 
	{
		$message = "Invalid Username or Password!";
		echo $message;
	} 
	else 
	{
		header('Location:studentpage.php');
	}
}
?>