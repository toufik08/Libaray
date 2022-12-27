<!DOCTYPE html>
<html>
<head>
	<title>LMS</title>
	<link rel="stylesheet" type="text/css" href="../css/all.min.css"> <!-- Fontawesome css -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> <!-- Booststap css -->
</head>
<body>

	<?php
		session_start();
		require "../connection.php";

		// For Empty Field Check
		if (isset($_POST['login'])) {
			$email= $_POST['email'];
			$password= $_POST['password'];

			if ($email=="") {
				$emailError="Email Field is Empty";
			}

			else if($password=="") {
				$passwordError="Please Enter your Password";
			}
			else{
			    $sql = "SELECT admin_email,admin_password FROM admin WHERE admin_email = '$email' and admin_password = '$password'";
			    $result = mysqli_query($conn,$sql);
			    
			    $count = mysqli_num_rows($result);
				    if ($count == 1) {
				    	$_SESSION["email"]=$_POST['email'];
				    	header("location: admindashboard.php");
				    }
				    else{
				    	$adminloginError="Wrong Email and Password";
				    }
			}
		}
	?>
	
	<!-- start Nav bar from here -->
	<nav class="navbar bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand text-white" href="#">
				<img src="../image/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
				Library Management System Admin
			</a>
		</div>
	</nav>
	<!-- End Nav bar -->
	
	<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-sm-4"></div>
			<!-- Start Login From  -->
			<div class="col-sm-4">
				<div class="card">
					<div class="card-header bg-success text-white">
						<h2 class="text-center">Admin Login</h2>
					</div>
					<div class="card-body">
						<!--  Login From  -->
						<form action="" method="POST">
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Email address</label>
								<span style="color: red";> <?php echo isset($emailError)? $emailError :""; ?> </span>
								<span style="color: red";> <?php echo isset($adminloginError)? $adminloginError:""; ?> </span>
								<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email here" value="<?php echo isset($email)?$email:""; ?>" >
							</div>
							<div class="mb-3">
								<label for="exampleInputPassword1" class="form-label">Password</label>
								<span style="color: red";> <?php echo isset($passwordError)? $passwordError :""; ?> </span>
								<input type="password" name="password" class="form-control" id="exampleInputPassword1" value="<?php echo isset($password)?$password:""; ?>" >
							</div>
							<button type="submit" name="login" class="btn btn-primary">Login</button>
						</form>
						<!--  Login From  -->
					</div>
				</div>
			</div>
			<div class="col-sm-1"></div>
			<!-- End Login From  -->
		</div>
	</div>







<script type="text/javascript" href="js/all.min.js"></script> <!-- Fontawesome js -->
<script type="text/javascript" href="js/bootstrap.min.js"></script> <!-- Booststap js -->
</body>
</html>