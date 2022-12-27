<!-- Header include Here -->
<?php include('userheader.php') ?>
<?php require "../connection.php";?>
<?php
    $usremail=$_SESSION["useremail"];          
$read_query=mysqli_query($conn,"SELECT * FROM user WHERE user_email='$usremail'");
    while($row=mysqli_fetch_array($read_query)){ 

        $image= $row["user_pic"];
        $username= $row["user_name"];
        $userphn= $row["user_phoneno"];
        $stuid= $row["student_id"];
        $dept= $row["dept"];        
    }


    // new data 

if (isset($_POST["signup"])) {

            $user_name_new = $_POST["edit_user_name"];
            $user_phno_new = $_POST["edit_userphoneno"];
            $stuid_new = $_POST["edit_stuid"];
            $dept_new = $_POST["edit_dept"];

            $tm=md5(time());
            $fnm=$_FILES["img"]["name"];
            $dst="../image/user_image/".$tm.$fnm;
            $dst1="./image/user_image/".$tm.$fnm;
            move_uploaded_file($_FILES["img"]["tmp_name"], $dst);

            if ($fnm=="") {
                $dst1=$image;
                
            }
            else{
               $dst1=$dst1; 
            }

            

            if ($user_name_new =="") {
                $usernameError="Name Field is Empty";
            }
            else if($user_phno_new=="") {
                $user_phnoError="Please Enter your PhoneNumber";
            }
            else if($stuid_new=="") {
                $stuid_newError="Please Enter your Student ID";
            }
            else if($dept_new=="") {
                $dept_newError="Please Enter your Department";
            }
            else{
                $sql= mysqli_query($conn,"UPDATE user SET user_name ='$user_name_new',user_phoneno ='$user_phno_new',student_id ='$stuid_new',dept='$dept_new',user_pic='$dst1'WHERE user_email='$usremail'");

                if ($sql) {

                    $usersignmsg="Successfully Change Password";
                }
                else{
                    $usersignmsg2="Update fail";
                } 
            }
}

?>



<div class="col-sm-8 mt-3">
    <div class="text-center mt-3 mb-3">
            <!-- Success message -->
        <span style="color: green";> <?php echo isset($usersignmsg)? $usersignmsg :""; ?> </span>
          <!--  fail Message -->
         <span style="color: red";> <?php echo isset($usersignmsg2)? $usersignmsg2 :""; ?> </span>
     </div>
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
		  <h2>Edit User Profile</h2>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                    
                <div class="mb-3"> 
                    <label for="exampleInputimg" class="form-label">Image</label>
                    <input type="file" class="form-control" id="file" name="img" value="">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">User Name</label>
                   

                    <!-- user name empty -->
                    <span style="color: red";> <?php echo isset($usernameError)? $usernameError :""; ?> </span>
                    <input type="text" class="form-control" name="edit_user_name" id="name" placeholder="Enter Your Name" value="<?php echo isset($user_name_new)?$user_name_new:$username; ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleInputphone" class="form-label">Phone Number</label>
                    <span style="color: red";> <?php echo isset($userphnoError)? $userphnoError :""; ?> </span>
                    <input type="text" class="form-control" name="edit_userphoneno" id="exampleInputphone" placeholder="Enter Your Phone Number" value="<?php echo isset($user_phno_new)?$user_phno_new:$userphn; ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleInputstuid" class="form-label">Student ID</label>
                    <span style="color: red";> <?php echo isset($emptystuidError)? $emptystuidError :""; ?> </span>
                    <input type="text" class="form-control" name="edit_stuid" id="exampleInputstuid" placeholder="Enter Your Student ID" value="<?php echo isset($stuid_new)?$stuid_new:$stuid; ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleInputdept" class="form-label">Department</label>
                    <span style="color: red";> <?php echo isset($emptydepterror)? $emptydepterror :""; ?> </span>
                    <input type="text" class="form-control" name="edit_dept" id="exampleInputdept" placeholder="Enter Your Department Name" value="<?php echo isset($dept_new)?$dept_new:$dept; ?>">
                </div>
                <button type="submit" name="signup" class="btn btn-primary">Update</button>
                 <a href="userprofile.php" class="btn btn-danger">Cancel</a>
            </form>
         </div>
    </div>
</div>



<!-- Footer include Here -->
<?php include('userfooter.php') ?>