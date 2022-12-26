<!DOCTYPE html>
<html>
<head>
	<title>LMS</title>
	<link rel="stylesheet" type="text/css" href="css/all.min.css"> <!-- Fontawesome css -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> <!-- Booststap css -->
</head>
<body>
	<?php
		require "connection.php";
		session_start();

		if (isset($_POST["submit"])) {

			$useremail = $_POST["useremail"];
			$userpassword = $_POST["userpassword"];
			$userid = $_POST["userid"];

			if($useremail=="") {
				$emptyemailerror="Please Enter your Email";
			}
			else if($userpassword=="") {
				$passwordError="Please Enter your Password";
			}
			else if($userid=="") {
				$emptyiderror="Please Enter your Student ID";
			}
			
			else{
				$sql = "SELECT * FROM user WHERE user_email = '$useremail' AND user_id='$userid'";
			    $result = mysqli_query($conn,$sql);

			    $count = mysqli_num_rows($result);		
				    if ($count == 1) {
						$sql= mysqli_query($conn,"UPDATE user SET user_password ='$userpassword' WHERE user_email = '$useremail' AND user_id='$userid'");

						if ($sql) {

					        $sucessmeg="Password Change Successfully!";
					    }
					    else{
					        $failmsg="Password Change Fail!";
					    } 
				    }

				    else{
				    	$notusermsg="Enter Wrong Information";
				    }
			}
		}
	?>

<!-- navbar Start -->
	<nav class="navbar bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand text-white" href="index.php">
				<img src="image/logo.png" alt="logo" width="30" height="24" class="d-inline-block align-text-top">
				Library Management System User
			</a>
			<a href="index.php" class="text-white">Home</a>
		</div>
	</nav>
<!-- navbar End -->


	<!-- Start User Login From  -->

	<div class="col-sm-12 mt-5">
	<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
		<div class="text-center mb-5">
			<span style="color: green";> <?php echo isset($sucessmeg)? $sucessmeg:""; ?></span>
			<span style="color: red";> <?php echo isset($failmsg)? $failmsg:""; ?> </span>
			<span style="color: red";> <?php echo isset($notusermsg)? $notusermsg:""; ?> </span>	
		</div>
		<div class="card">
			<div class="card-header bg-info text-white text-center">
				<h2>Forget Password</h2>
			</div>
			<div class="card-body">
				<!--  Login From  -->
				<form action="" method="POST">
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Email address</label>
						<span style="color: red";> <?php echo isset($emptyemailerror)? $emptyemailerror :""; ?> </span>
						<input type="email" name="useremail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email" value="<?php echo isset($useremail)?$useremail:""; ?>" >
					</div>
					<div class="mb-3">
						<label for="userid" class="form-label">User ID</label>
						<span style="color: red";> <?php echo isset($emptyiderror)? $emptyiderror :""; ?> </span>
						<input type="text" name="userid" class="form-control" id="userid" aria-describedby="emailHelp" placeholder="Enter User ID" value="<?php echo isset($userid)?$userid:""; ?>" >
					</div>
					<div class="mb-3">
						<label for="exampleInputPassword1" class="form-label">New Password</label>
						<span style="color: red";> <?php echo isset($passwordError)? $passwordError :""; ?> </span>
						<input type="password" name="userpassword" class="form-control" placeholder="Enter ew Password" id="exampleInputPassword1" value="<?php echo isset($userpassword)?$userpassword:""; ?>" >
					</div>
					<button type="submit" name="submit" class="btn btn-primary mb-1">Submit</button>
					<a href="index.php" class="btn btn-danger mb-1">Cancel</a>
				</form>
				<!--  Login From  -->
			</div>
		</div>
	</div>
	<div class="col-sm-4"></div>
	</div>
	</div>
	<!-- End Login From  -->


<script type="text/javascript" href="js/all.min.js"></script> <!-- Fontawesome js -->
<script type="text/javascript" href="js/bootstrap.min.js"></script> <!-- Booststap js -->
</body>
</html>