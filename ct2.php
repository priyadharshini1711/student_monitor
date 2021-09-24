<?php
$conn = mysqli_connect("localhost", "root", "", "student");
static $set=0;
if (isset($_POST["import"])) 
{
    $fileName = $_FILES["file"]["tmp_name"];
    if ($_FILES["file"]["size"] > 0 and $set==0) 
	{
        $file = fopen($fileName, "r");
        fgetcsv($file);
        while (($column = fgetcsv($file, 10000, ","))!== FALSE )
		{
		 $re = "select * from ut1";
		 $re1=mysqli_query($conn, $re);
		 if(!empty($re1))
		 {
		 	$message= "Data already inserted";
		 }
		 else
		 {
$sqlInsert = "INSERT into ct2 values ('".$column[0]."','".$column[1]."','".$column[2]."','".$column[3]."','".$column[4]."','".$column[5]."','".$column[6]."','".$column[7]."','".$column[8]."','".$column[9]."','".$column[10]."','".$column[11]."','".$column[12]."','".$column[13]."','".$column[14]."')";
          $result = mysqli_query($conn, $sqlInsert);
		  $set=1;
            if (! empty($result)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
		}
    }
}
?>
<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>STAFFPAGE</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<script src="jquery-3.2.1.min.js"></script>

<style>
body
{
	align: left;
}
.outer-scontainer {
	background: #F0F0F0;
	border: #e0dfdf 1px solid;
	padding: 20px;
	border-radius: 2px;
}

.input-row {
	margin-top: 0px;
	margin-bottom: 20px;
}

.btn-submit {
	background: #333;
	border: #1d1d1d 1px solid;
	color: #f0f0f0;
	font-size: 0.9em;
	width: 100px;
	border-radius: 2px;
	cursor: pointer;
}

#response {
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 2px;
    display:none;
}

.success {
    background: #c7efd9;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

	    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	    $("#response").addClass("error");
        	    $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo"><a href="index.html">PR TECHNOLOGY</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.html">HOME</a></li>
							<li><a href="#one">ABOUTUS</a></li>
							<li><a href="#four">CONTACT US</a></li>
							<li><a href="#" class="button primary">SIGN IN</a>
							<ul>
								<li><a href="stafflogin.html">STAFF LOGIN</a></li>
								<li><a href="studentlogin.html">STUDENT LOGIN</a></li>
							</ul>
							</li>
						</ul>
					</nav>
				</header>
			<!-- Main -->
				<div id="main" class="wrapper style1" >
					<div class="container">
						<header class="major">
							<h2>STAFF PAGE - CT2</h2>
							<p>We never know which lives we influence, or when, or why.</p>
						</header>
						<div class="row gtr-150">
							<div class="col-4 col-12-medium">


								<!-- Sidebar -->
									<section id="sidebar">
										<section><a href="staffpage.php"><h3>PERSONAL INFO</h3></a></section><hr />
										<section><a href="attendances.php"><h3>ATTENDANCE</h3></a></section><hr />
										<section><a href="internals.php"><h3>INTERNALS</h3></a></section><hr />
										<section><a href="unversitys.php"><h3>UNIVERSITY RESULTS</h3></a></section><hr />
										<section><a href="ccs.php"><h3>CO - CURRICULAR</h3></a></section><hr />
										<section><a href="ecs.php"><h3>EXTRA - CURRICULAR</h3></a></section><hr />
										<section><a href="assignments.php"><h3>ASSIGNMENTS</h3></a></section><hr />
										<section><a href="notes.php"><h3>NOTES</h3></a></section><hr />
										<section><a href="circulars.php"><h3>CIRCULARS</h3></a></section><hr />
										<section><a href="activitys.php"><h3>ACTIVITY LOG</h3></a></section><hr />
										<section><a href="cls.php"><h3>CLASS LOG</h3></a></section><hr />
									</section>

							</div>
							<div class="col-8 col-12-medium imp-medium">

								<!-- Content -->
									<section id="content">
									<div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message))                                    { echo $message; } ?></div>
							  <div class="outer-scontainer">
										<div class="row">
								
											<form class="form-horizontal" action="" method="post"
												name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
												<div class="input-row">
													<label class="col-md-4 control-label">Choose CSV
														File</label> <input type="file" name="file"
														id="file" accept=".csv">
													<button type="submit" id="submit" name="import"
														class="btn-submit">Import</button>
													<br />
								
												</div>
								
											</form>
								
										</div>
										<div class="back">
										<form method="get" action="internals.php">
    									<button type="submit">BACK</button>
										</form></div>
									</section>
							</div>
						</div>
					</div>
				</div>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
						<li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
						<li><a href="#" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>