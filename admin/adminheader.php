<!DOCTYPE html>
<html>
<head>
	<title>LMS</title>
	<link rel="stylesheet" type="text/css" href="../css/all.min.css"> <!-- Fontawesome css -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> <!-- Booststap css -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /><!-- Select box css -->
</head>
<body>
<?php
	session_start();
	if(!isset($_SESSION["email"])){ 
?>

<script type="text/javascript">
	window.location="adminlogin.php";
</script>

<?php
	}
?>
	<!-- start Nav bar from here -->
	<nav class="navbar bg-dark">
		<div class="container-fluid text-white">
			<a class="navbar-brand text-white" href="#">
				<img src="../image/logo.png" alt="" width="40" height="34" class="d-inline-block align-text-top">
				Library Management System
				<?php 
				require "../connection.php";
				$adminemails=$_SESSION["email"];
				$read_query="Select * from admin where admin_email= '$adminemails'";
				$result = mysqli_query($conn, $read_query);
				$row = mysqli_fetch_assoc($result)
									
				?>
				<h6 class="ml-5"><strong><?php echo $row["admin_name"];?></strong> Dasboard</h6>
			</a>
		</div>
	</nav>
	<!-- End Nav bar -->

		<div class="container-fluid">
		<div class="row">
			<!-- Start Side bar -->
			<div class="col-sm-2">
				<nav class="bg-light sidebar">
					<div class="sidebar-sticky">
						<ul class="nav flex-column">
							<li class="nav-item">
								<a href="admindashboard.php" class="nav-link">
									<i class="fa-solid fa-gauge-high"></i>
									Dashboard
								</a>
							</li>
							<li class="nav-item">
								<a href="booklist.php" class="nav-link">
									<i class="fa-solid fa-book"></i>
									Book List
								</a>
							</li>
							<li class="nav-item">
								<a href="category.php" class="nav-link">
									<i class="fa-solid fa-list"></i>
									Category
								</a>
							</li>
							<li class="nav-item">
								<a href="userslist.php" class="nav-link">
									<i class="fa-solid fa-users"></i>
									Users List
								</a>
							</li>
							<li class="nav-item">
								<a href="issuebook.php" class="nav-link">
									<i class="fa fa-book-medical"></i>
									Issue book
								</a>
							</li>
							<li class="nav-item">
								<a href="borrowbook.php" class="nav-link">
									<i class="fa-solid fa-book-open-reader"></i>
									Borrow Book
								</a>
							</li>
							<li class="nav-item">
								<a href="dateoverbook.php" class="nav-link">
									<i class="fa-solid fa-circle-exclamation"></i>
									Not Return Book
								</a>
							</li>
							<li class="nav-item">
								<a href="returned_book_history.php" class="nav-link">
									<i class="fa-solid fa-clock-rotate-left"></i>
									Returned History
								</a>
							</li>
							<li class="nav-item">
								<a href="adminlogout.php" class="nav-link">
									<i class="fas fa-sign-out-alt"></i>
									Logout
								</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<!-- End Side bar -->