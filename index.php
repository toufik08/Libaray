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


		// Signup 
		if (isset($_POST["signup"])) {

			$user_name = $_POST["user_name"];
			$useremail = $_POST["user_email"];
			$userpass = $_POST["user_pass"];
			$userphno = $_POST["userphoneno"];
			$stuid = $_POST["stuid"];
			$dept = $_POST["dept"];

			$tm=md5(time());
			$fnm=$_FILES["img"]["name"];
			$dst="./image/user_image/".$tm.$fnm;
			$dst1="./image/user_image/".$tm.$fnm;
			move_uploaded_file($_FILES["img"]["tmp_name"], $dst);


			if ($user_name=="") {
				$usernameError="Name Field is Empty";
			}

			else if($useremail=="") {
				$useremailError="Please Enter your Email";
			}
			else if($userpass=="") {
				$userpassError="Please Enter your Password";
			}
			else if($userphno=="") {
				$userphnoError="Please Enter your Phone Number";
			}
			else if($stuid=="") {
				$emptystuidError="Please Enter your Student ID";
			}
			else if($dept=="") {
				$emptydepterror="Please Enter Departent Name";
			}
			else{
				$sql = "SELECT user_email FROM user WHERE user_email = '$useremail'";
			    $result = mysqli_query($conn,$sql);


			    $count = mysqli_num_rows($result);
				    if ($count == 0) {
						$sql= mysqli_query($conn,"INSERT INTO user(user_name, user_email, user_password,user_phoneno,status,student_id,dept,user_pic) VALUES('$user_name', '$useremail', '$userpass', '$userphno', 'no', '$stuid','$dept','$dst1')");

						if ($sql) {

					        $usersignmsg="Successfully Signup";
					    }
					    else{
					        $usersignmsg2="Signup fail";
					    } 
				    }

				    else{
				    	$allradyuserError="Email allready Registered";
				    }
			}
		}

		// Login
		if (isset($_POST["login"])) {

			$useremail = $_POST["useremail"];
			$userpassword = $_POST["userpassword"];

			if ($useremail == "") {
				$emptyemailerror="Please Enter email";
			}
			else if ($userpassword == "") {
				$emptypasserror="PleaseEnter Password";
			}
			else{
				$sql = "SELECT user_email,user_password FROM user WHERE user_email = '$useremail' AND user_password = '$userpassword' AND status='yes'";
			    $result = mysqli_query($conn,$sql);
			    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

			    $count = mysqli_num_rows($result);
				    if ($count == 1) {
				    	$_SESSION["useremail"] = $_POST['useremail'];
				    	header("location: user/userdashboard.php");
				    	
				    }
				    else{
				    	$userloginError="Wrong Email and Password";
				    }
			}
 		}
	?>


<!-- <?php

$sql = "SELECT * FROM user ";
			    $result = mysqli_query($conn,$sql);
			    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

			    $count = mysqli_num_rows($result);
			    echo $count;


?> -->


	<!-- start Nav bar from here -->
	<nav class="navbar bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand text-white" href="#">
				<img src="image/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
				Library Management System User
			</a>
		</div>
	</nav>
	<!-- End Nav bar -->
	
	<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-sm-1"></div>
			<!-- Start Singup From  -->
			<div class="col-sm-5">
				<div class="card">
					<div class="card-header bg-primary text-white">
						<h2>User Sign Up</h2>
					</div>
					<div class="card-body">
						<!--  Singup From  -->
						<form action="" method="POST" enctype="multipart/form-data">

							<div class="mb-3">
								<label for="name" class="form-label">User Name</label>
								<!-- Signup sucessfully -->
								<span style="color: green";> <?php echo isset($usersignmsg)? $usersignmsg :""; ?> </span>
								<!-- Signup fail -->
								<span style="color: red";> <?php echo isset($usersignmsg2)? $usersignmsg2 :""; ?> </span>
								<!-- allready user -->
								<span style="color: red";> <?php echo isset($allradyuserError)? $allradyuserError :""; ?> </span>
								<!-- user name empty -->
								<span style="color: red";> <?php echo isset($usernameError)? $usernameError :""; ?> </span>
								<input type="text" class="form-control" name="user_name" id="name" placeholder="Enter Your Name" value="<?php echo isset($user_name)?$user_name:""; ?>">
							</div>

							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Email address</label>
								<span style="color: red";> <?php echo isset($useremailError)? $useremailError :""; ?> </span>
								<input type="email" class="form-control" name="user_email" id="exampleInputEmail1" placeholder="Enter Your Email" value="<?php echo isset($useremail)?$useremail:""; ?>">
							</div>

							<div class="mb-3">
								<label for="exampleInputPassword1" class="form-label">Password</label>
								<span style="color: red";> <?php echo isset($userpassError)? $userpassError :""; ?> </span>
								<input type="password" class="form-control" name="user_pass" id="exampleInputPassword1" placeholder="Enter Your Password" value="<?php echo isset($userpass)?$userpass:""; ?>">
							</div>

							<div class="mb-3">
								<label for="exampleInputphone" class="form-label">Phone Number</label>
								<span style="color: red";> <?php echo isset($userphnoError)? $userphnoError :""; ?> </span>
								<input type="text" class="form-control" name="userphoneno" id="exampleInputphone" placeholder="Enter Your Phone Number" value="<?php echo isset($userphno)?$userphno:""; ?>">
							</div>

							<div class="mb-3">
								<label for="exampleInputstuid" class="form-label">Student ID</label>
								<span style="color: red";> <?php echo isset($emptystuidError)? $emptystuidError :""; ?> </span>
								<input type="text" class="form-control" name="stuid" id="exampleInputstuid" placeholder="Enter Your Student ID" value="<?php echo isset($stuid)?$stuid:""; ?>">
							</div>
							<div class="mb-3">
								<label for="exampleInputdept" class="form-label">Department</label>
								<span style="color: red";> <?php echo isset($emptydepterror)? $emptydepterror :""; ?> </span>
								<input type="text" class="form-control" name="dept" id="exampleInputdept" placeholder="Enter Your Department Name" value="<?php echo isset($dept)?$dept:""; ?>">
							</div>

							<div class="mb-3">	
								<label for="exampleInputimg" class="form-label">Image</label>
								<input type="file" class="form-control" id="file" name="img">
							</div>

							<button type="submit" name="signup" class="btn btn-primary">Singup</button>
						</form>
						<!--  Singup From  -->
					</div>
				</div>
			</div>
			<!-- End Singup From  -->


			<!-- Start User Login From  -->
			<div class="col-sm-5">
				<div class="card">
					<div class="card-header bg-success text-white">
						<h2>User Login</h2>
					</div>
					<div class="card-body">
						<!--  Login From  -->
						<form action="" method="POST">
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Email address</label>
								<span style="color: red";> <?php echo isset($emptyemailerror)? $emptyemailerror :""; ?> </span>
								<span style="color: red";> <?php echo isset($userloginError)? $userloginError:""; ?> </span>
								<input type="email" name="useremail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email" value="<?php echo isset($useremail)?$useremail:""; ?>" >
							</div>
							<div class="mb-3">
								<label for="exampleInputPassword1" class="form-label">Password</label>
								<span style="color: red";> <?php echo isset($passwordError)? $passwordError :""; ?> </span>
								<input type="password" name="userpassword" class="form-control" placeholder="Enter Your Password" id="exampleInputPassword1" value="<?php echo isset($userpassword)?$userpassword:""; ?>" >
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