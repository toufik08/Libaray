	<!-- harder include Here -->
	<?php include('adminheader.php') ?>
	<?php require "../connection.php";?>

					<!-- Body Content Start -->
            <div class="col-sm-9 mt-3">
                <div class="row mx-5 text-center">
               <!-- User Request Table Start -->
               <a href="adduser.php" class="col-sm-12 mt-3"><button class="btn btn-primary mb-3">Add New User</button></a>
                <div class="col-sm-12 mt-3 text-center">
	                <!-- Table Start -->
	                <p class="bg-dark text-white p-2">Users Request</p>
	                
	                <table class="table">
	                    <thead>
	                        <tr>
	                        	 <th scope="col">User ID</th>
	                        	<th scope="col">User Image</th>	                           
	                            <th scope="col">User Name</th>
	                            <th scope="col">Email</th>
	                            <th scope="col">Contact No.</th>
	                            <th scope="col">Department</th>
	                            <th scope="col">Status</th>
	                            <th scope="col">Change Status</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    <?php
						    $read_query=mysqli_query($conn,"Select * from user Where status='no'");
						    while($row=mysqli_fetch_array($read_query))
						 	{ ?>
	                        <tr>
	                        	<td><img src="<?php echo $row["user_pic"];?>" height=100px width=100px></td>
	                            <th scope="row"><?php echo $row["user_id"];?></th>
	                            <td><?php echo $row["user_name"];?></td>
	                            <td><?php echo $row["user_email"];?></td>
	                            <td><?php echo $row["user_phoneno"];?></td>
	                            <td><?php echo $row["dept"];?></td>
	                            <td><?php echo $row["status"];?></td>
	                            <td>
	                                <a href="userapprove.php?id=<?php echo $row['user_id'];?>"><button class="btn btn-success" target="_blank"><i class="fa-solid fa-check"></i></button></a>
	                                <a href="usernotapprove.php?id=<?php echo $row['user_id'];?>"><button class="btn btn-warning " target="_blank"><i class="fa fa-ban"></i></button></a>
	                            </td>
	                        </tr>
	                        <?php } ?>
	                    </tbody>
	                </table>
	                <!-- Table End -->
                </div>
                <!-- User Request  Table End -->



				<!-- User Table Start -->
                <div class="col-sm-12 mt-3 text-center">
	                <!-- Table Start -->
	                <p class="bg-dark text-white p-2">Active Users List</p>
	                <table class="table">
	                    <thead>
	                        <tr>
	                            <th scope="col">User ID</th>
	                            <th scope="col">User Image</th>
	                            <th scope="col">User Name</th>
	                            <th scope="col">Email</th>
	                            <th scope="col">Contact No.</th>
	                            <th scope="col">Department</th>
	                            <th scope="col">Status</th>
	                            <th scope="col">Change Status</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    <?php
						    $read_query=mysqli_query($conn,"Select * from user Where status='yes'");
						    while($row=mysqli_fetch_array($read_query))
						 	{ ?>
	                        <tr>
	                            <th scope="row"><?php echo $row["user_id"];?></th>
	                            <td><img src="<?php echo ".".$row["user_pic"];?>" height=100px width=100px></td>
	                            <td><?php echo $row["user_name"];?></td>
	                            <td><?php echo $row["user_email"];?></td>
	                            <td><?php echo $row["user_phoneno"];?></td>
	                            <td><?php echo $row["dept"];?></td>
	                            <td><?php echo $row["status"];?></td>
	                            <td>
	                                <a href="userapprove.php?id=<?php echo $row['user_id'];?>"><button class="btn btn-success" target="_blank"><i class="fa-solid fa-check"></i></button></a>
	                                <a href="usernotapprove.php?id=<?php echo $row['user_id'];?>"><button class="btn btn-warning " target="_blank"><i class="fa fa-ban"></i></button></a>
	                            </td>
	                        </tr>
	                        <?php } ?>
	                    </tbody>
	                </table>
	                <!-- Table End -->
                </div>
                <!-- user Table End -->



	<!-- Footer include Here -->
	<?php include('adminfooter.php') ?>