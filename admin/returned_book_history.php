	<!-- harder include Here -->
	<?php
		include('adminheader.php'); 
		require "../connection.php";
	?>
					<!-- Body Content Start -->
            <div class="col-sm-10 mt-3">
                <div class="row mx-5 text-center">
				<!-- Book Request Table Start -->
                <div class="col-sm-12 mt-3 text-center">
	                <!-- Table Start -->
	                <p class="bg-dark text-white p-2">Return book History</p>
	                <!-- Search Form -->
	                <form class="form-inline mb-3" name="from1" action="" method="post">

					   <input class="form-control mr-sm-2" type="text" name="t1" placeholder="Enter User ID" aria-label="Search">

					   <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit1" value="search books">Search</button>

					 </form>

					<?php 
						if (isset($_POST["submit1"])){ 
					?>

	                <table class="table">
	                    <thead>
	                        <tr>
	                            <th scope="col">Book ID</th>
	                            <th scope="col">Book Name</th>
	                            <th scope="col">User ID</th>
	                            <th scope="col">User Name</th>
	                            <th scope="col">Issue Date</th>
	                            <th scope="col">Return Date</th>
	                            <th scope="col">Status</th>
	                        </tr>
	                    </thead>
	                    <tbody>	                    
	                    <?php	                    	
						    $read_query=mysqli_query($conn,"SELECT * from issuebook WHERE status='returned' AND user_id like ('$_POST[t1]')");
						    while($row=mysqli_fetch_array($read_query))
						{?>
	                        <tr>
	                            <th scope="row"><?php echo $row["book_id"];?></th>
	                            <td><?php echo $row["book_name"];?></td>
	                            <td><?php echo $row["user_id"];?></td>
	                            <td><?php echo $row["user_name"];?></td>
	                            <td><?php echo $row["Issue_date"];?></td>
	                            <td><?php echo $row["return_date"];?></td>
	                           	<td><?php echo $row["status"];?></td>
	                        </tr>
	                        <?php } ?>
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
			                            <th scope="col">Return Date</th>
			                            <th scope="col">Status</th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                    <?php	                    	
								    $read_query=mysqli_query($conn,"Select * from issuebook WHERE status='returned'");
								    while($row=mysqli_fetch_array($read_query))
								{ 
									?>
			                        <tr>
			                            <th scope="row"><?php echo $row["book_id"];?></th>
			                            <td><?php echo $row["book_name"];?></td>
			                            <td><?php echo $row["user_id"];?></td>
			                            <td><?php echo $row["user_name"];?></td>
			                            <td><?php echo $row["Issue_date"];?></td>
			                            <td><?php echo $row["return_date"];?></td>
			                           	<td><?php echo $row["status"];?></td>
			                        </tr>
			                        <?php } ?>
			                    </tbody>
		                </table>
	                <?php }  ?>
	                <!-- Table End -->
                </div>
                <!-- Book Request  Table End -->
	<!-- Footer include Here -->
	<?php include('adminfooter.php') ?>