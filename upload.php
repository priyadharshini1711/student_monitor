<?php
require('connect.php');
$name = $_FILES['file']['name'];
$size = $_FILES['file']['size'];
$type = $_FILES['file']['type'];
$tmp_name = $_FILES['file']['tmp_name'];
 
$extension = substr($name, strpos($name, '.') + 1);
 
$max_size = 100000;
if(isset($name) && !empty($name)){
	if(($extension == "jpg" || $extension == "jpeg") && $type == "image/jpeg" && $extension == $size<=$max_size){
		$location = "uploads/";
		if(move_uploaded_file($tmp_name, $location.$name)){
			$query = "INSERT INTO `upload` (name, size, type, location) VALUES ('$name', '$size', '$type', '$location$name')";
        		$result = mysqli_query($connection, $query);
			$smsg = "Uploaded Successfully.";	
		}else{
			$fmsg = "Failed to Upload File";
		}
	}else{
		$fmsg = "File size should be 100 KiloBytes & Only JPEG File";
	}
}else{
	$fmsg = "Please Select a File";
}
?>
<html>
<head>
	<title>File Upload Script Using PHP & MySQL</title>
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
 
<link rel="stylesheet" href="styles.css" >
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="container">
<?php //echo $name; ?>
<?php //echo $size; ?>
<?php //echo $type; ?>
<?php //echo $tmp_name; ?>
      <form class="form-signin" method="POST" enctype="multipart/form-data">
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>      
        <h2 class="form-signin-heading">Upload File</h2>
	  <div class="form-group">
	    <label for="exampleInputFile">File input</label>
	    <input type="file" name="file" id="exampleInputFile">
	    <p class="help-block">Upload JPEG Files that are below 100 KiloBytes</p>
	  </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Upload</button>
      </form>
</div>
 
</body>
 
</html>