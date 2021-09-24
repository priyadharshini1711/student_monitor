<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>STUDENT PAGE</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<style>
		table
		{
		background-color:#CCCCCC;
		border:thick;
		}
		table td
		{
  		color:#000000;
		font-weight:1000;
		}
		</style>
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
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>STUDENT PAGE - CT2</h2>
							<p>Strive To Grow to Unleash Your Potential Heights!</p>
						</header>
						<div class="row gtr-150">
							<div class="col-8 col-12-medium">

								<!-- Content -->
									<section id="content">
									<table border="2">
									<?php
									session_start();
									$var_name = $_SESSION['varname'];
									$con = mysqli_connect("localhost", "root", "", "student");
									$sql= "SELECT * FROM  `ct2` WHERE  `regno` LIKE  '".$var_name."' LIMIT 0 , 30";
									$result = mysqli_query($con, $sql);
									print "<table>";
									while($row = mysqli_fetch_row($result))
									{
									print "<tr><td>REGNO</td><td>" .$row[0] . "</td></tr>"; 
									print "<tr><td>NAME</td><td>" .$row[1] . "</td></tr>"; 
									print "<tr><td>D/H</td><td>" .$row[2] . "</td></tr>"; 
									print "<tr><td>DS</td><td>" .$row[3] . "</td></tr>"; 
									print "<tr><td>AI</td><td>" .$row[4] . "</td></tr>"; 
									print "<tr><td>CD</td><td>" .$row[5] . "</td></tr>"; 
									print "<tr><td>MC</td><td>" .$row[6] . "</td></tr>"; 
									print "<tr><td>DSP</td><td>" .$row[7] . "</td></tr>"; 
									print "<tr><td>TQM</td><td>" .$row[8] . "</td></tr>"; 
									print "<tr><td>TOTAL </td><td>" .$row[9] . "</td></tr>"; 
									print "<tr><td>PERCENTAGE</td><td>" .$row[10] . "</td></tr>"; 
									print "<tr><td>RANK CD</td><td>" .$row[11] . "</td></tr>"; 
									print "<tr><td>FAIL</td><td>" .$row[12] . "</td></tr>"; 
									print "<tr><td>ABSENT</td><td>" .$row[13] . "</td></tr>"; 
									print "<tr><td>PASS</td><td>" .$row[14] . "</td></tr>"; 								
									} 
									print "</table>"; 
									?>
   								</section>

							</div>
							<div class="col-4 col-12-medium">

								<!-- Sidebar -->
									<section id="sidebar">
										<section><a href="studentpage.php"><h3>PERSONAL INFO</h3></a></section><hr />
										<section><a href="attendancet.php"><h3>ATTENDANCE</h3></a></section><hr />
										<section><a href="internalst.php"><h3>INTERNALS</h3></a></section><hr />
										<section><a href="unversityst.php"><h3>UNIVERSITY RESULTS</h3></a></section><hr />
										<section><a href="ccst.php"><h3>CO - CURRICULAR</h3></a></section><hr />
										<section><a href="ecst.php"><h3>EXTRA - CURRICULAR</h3></a></section><hr />
										<section><a href="assignmentst.php"><h3>ASSIGNMENTS</h3></a></section><hr />
										<section><a href="notest.php"><h3>NOTES</h3></a></section><hr />
										<section><a href="circularst.php"><h3>CIRCULARS</h3></a></section><hr />
										<section><a href="activityst.php"><h3>ACTIVITY LOG</h3></a></section><hr />
										<section><a href="clst.php"><h3>CLASS LOG</h3></a></section><hr />
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