	<!-- harder include Here -->
	<?php include('adminheader.php') ?>
	<?php require "../connection.php";?>

					<!-- Body Content Start -->
            <div class="col-sm-10 mt-3">
                <div class="row mx-5 text-center">
				<!-- Book Request Table Start -->
                <div class="col-sm-12 mt-3 text-center">
                <a href="issuenewbook.php"><button class="btn btn-primary mb-3">issue new book</button></a>
	                <!-- Table Start -->
	                <p class="bg-dark text-white p-2">Issue List(Request)</p>

	                <form class="form-inline mb-3" name="from1" action="" method="post">
					   <input class="form-control mr-sm-2" type="text" name="t1" placeholder="Enter Book Name" aria-label="Search">
					   <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit1" value="search books">Search</button>
					</form>
					<?php 
					 if (isset($_POST["submit1"]))
					 { ?>

	                <table class="table">
	                    <thead>
	                        <tr>
	                        	<th scope="col">Book ID</th>
	                            <th scope="col">Book Name</th>
	                            <th scope="col">User ID</th>
	                            <th scope="col">User Name</th>
	                            <th scope="col">Issue Date</th>
	                            <th scope="col">The limit for returns</th>
	                            <th scope="col">Status</th>
	                            <th scope="col">Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    <?php
						    $read_query=mysqli_query($conn,"SELECT * from issuebook where book_name like ('%$_POST[t1]%') AND status='pending'");
						    while($row=mysqli_fetch_array($read_query))
						{ ?>
	                        <tr>
	                        	<th scope="row"><?php echo $row["book_id"];?></th>
	                            <td><?php echo $row["book_name"];?></td>
	                            <td><?php echo $row["user_id"];?></td>
	                            <td><?php echo $row["user_name"];?></td>
	                            <td><?php echo $row["Issue_date"];?></td>
	                            <td><?php echo $row["return_date"];?></td>
	                            <td><strong><?php echo $row["status"];?></strong></td>
	                            <td>
	                                <a href="acceptbookreq.php?issueid=<?php echo $row["issue_book_id"];?> & userid=<?php echo $row["user_id"];?>& bookid=<?php echo $row["book_id"];?>"><button type="submit" class="btn btn-success" name="Delete"><i class="fa-solid fa-circle-check"></i> Accept</button></a>

	                                <br><br>
	                                <a href="deletebookreq.php?issueid=<?php echo $row["issue_book_id"];?> & userid=<?php echo $row["user_id"];?>& bookid=<?php echo $row["book_id"];?>"><button type="submit" class="btn btn-danger " name="Delete"><i class="far fa-trash-alt"></i> Delete</button></a>    
	                            </td>
	                        </tr>
	                    <?php }?>

	                    </tbody>
	                </table>
	                <?php }
	                 else { ?>

	                <table class="table">
	                    <thead>
	                        <tr>
	                            <th scope="col">Book ID</th>
	                            <th scope="col">Book Name</th>
	                            <th scope="col">User ID</th>
	                            <th scope="col">User Name</th>
	                            <th scope="col">Issue Date</th>
	                            <th scope="col">The limit for returns</th>
	                            <th scope="col">Status</th>
	                            <th scope="col">Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    <?php
						    $read_query=mysqli_query($conn,"Select * from issuebook WHERE status='pending'");
						    while($row=mysqli_fetch_array($read_query))
						{ ?>
	                        <tr>
	                            <th scope="row"><?php echo $row["book_id"];?></th>
	                            <td><?php echo $row["book_name"];?></td>
	                            <td><?php echo $row["user_id"];?></td>
	                            <td><?php echo $row["user_name"];?></td>
	                            <td><?php echo $row["Issue_date"];?></td>
	                            <td><?php echo $row["return_date"];?></td>
	                            <td><strong><?php echo $row["status"];?></strong></td>
	                            <td>
	                                <a href="acceptbookreq.php?issueid=<?php echo $row["issue_book_id"];?> & userid=<?php echo $row["user_id"];?>& bookid=<?php echo $row["book_id"];?>"><button type="submit" class="btn btn-success" name="Delete"><i class="fa-solid fa-circle-check"></i> Accept</button></a>

	                                <br><br>
	                                <a href="deletebookreq.php?issueid=<?php echo $row["issue_book_id"];?> & userid=<?php echo $row["user_id"];?>& bookid=<?php echo $row["book_id"];?>"><button type="submit" class="btn btn-danger " name="Delete"><i class="far fa-trash-alt"></i> Delete</button></a>                              
	                            </td>
	                        </tr>
	                     <?php }?>
	                    </tbody>
	                </table>
	                <?php }  ?>
	                <!-- Table End -->
                </div>
                <!-- Book Request  Table End -->



	<!-- Footer include Here -->
	<?php include('adminfooter.php') ?>