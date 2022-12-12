<!-- harder include Here -->
<?php include('adminheader.php') ?>

<?php
require "../connection.php";
// Signup 
		if (isset($_POST["signup"])) {

			$user_name = $_POST["user_name"];
			$useremail = $_POST["user_email"];
			$userpass = $_POST["user_pass"];
			$userphno = $_POST["userphoneno"];

			if ($username=="") {
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
			else{
				$sql = "SELECT user_email FROM user WHERE user_email = '$useremail'";
			    $result = mysqli_query($conn,$sql);


			    $count = mysqli_num_rows($result);
				    if ($count == 0) {
						$sql= mysqli_query($conn,"INSERT INTO user(user_name, user_email, user_password,user_phoneno) VALUES('$user_name', '$useremail', '$userpass', '$userphno')");

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
?>



        <div class="col-sm-8 mt-3">
			<!-- Start add book From  -->
				<div class="card">
					<div class="card-header bg-primary text-white">
						<h2>Add New User</h2>
					</div>
					<div class="card-body">
						<!--  Singup From  -->
						<form action="" method="POST">

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
								<label for="exampleInputphone" class="form-label">phone number</label>
								<span style="color: red";> <?php echo isset($emptypasserror)? $emptypasserror :""; ?> </span>
								<input type="text" class="form-control" name="userphoneno" id="exampleInputphone" placeholder="Enter Your PHone Number" value="<?php echo isset($userphno)?$userphno:""; ?>">
							</div>

							<button type="submit" name="signup" class="btn btn-primary">Singup</button>
							<a href="userslist.php" class="btn btn-danger"> Cancel </a>
						</form>
						<!--  Singup From  -->
					</div>
				</div>
			</div>
		<!-- End add book From  -->



	<!-- Footer include Here -->

	<?php include('adminfooter.php')?>