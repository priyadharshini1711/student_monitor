<?php
// Check if a file has been uploaded
if(isset($_FILES['uploaded_file'])) {
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {
        // Connect to the database
        $dbLink = new mysqli('localhost', 'root', '', 'student');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
        // Gather all required data
        $name = $dbLink->real_escape_string($_FILES['uploaded_file']['name']);
        $mime = $dbLink->real_escape_string($_FILES['uploaded_file']['type']);
        $data = $dbLink->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
        $size = intval($_FILES['uploaded_file']['size']);
         // Create the SQL query
        $query = "
            INSERT INTO `assignments` (
                `name`, `mime`, `size`, `data`, `created`
            )
            VALUES (
                '{$name}', '{$mime}', {$size}, '{$data}', NOW()
            )";
         // Execute the query
        $result = $dbLink->query($query);
         // Check if it was successfull
        if($result) {
            echo 'Success! Your file was successfully added!';
        }
        else {
            echo 'Error! Failed to insert the file'
               . "<pre>{$dbLink->error}</pre>";
        }
    }
    else {
        echo 'An error accured while the file was being uploaded. '
           . 'Error code: '. intval($_FILES['uploaded_file']['error']);
    } 
    // Close the mysql connection
    $dbLink->close();
}
else {
    echo 'Error! A file was not sent!';
}
// Echo a link back to the main page
echo '<p>Click <a href="index.html">here</a> to go back</p>';
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
							<h2>STAFF PAGE - ASSIGNMENTS</h2>
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
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="uploaded_file"><br>
        <input type="submit" value="Upload file">
    </form>
								
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