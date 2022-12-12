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
	                <p class="bg-dark text-white p-2">Borrow book List</p>
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
	                            <th scope="col">Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>

	                    <?php	                    	
						    $read_query=mysqli_query($conn,"Select * from issuebook WHERE status='borrow'");
						    while($row=mysqli_fetch_array($read_query))
						{ 

	                            $rdate= $row["return_date"];
	                            $userids= $row["user_id"];
	                            $bookids= $row["book_id"];
	                            // $newDate = date("y-m-d", strtotime($rdate));
	                            $datetoday=date("y-m-d");
	                            $rrrrdate=date("y-m-d", strtotime($rdate));
	                            
	                           
							
							?>

							<td style="display: none;" ><?php 

							if ($rrrrdate<$datetoday) {
								mysqli_query($conn,"UPDATE issuebook SET status='dateover' WHERE user_id='$userids' AND status='borrow' AND book_id=' $bookids'");
								
							}


							?></td>
							
	                        <tr>
	                            <th scope="row"><?php echo $row["book_id"];?></th>
	                            <td><?php echo $row["book_name"];?></td>
	                            <td><?php echo $row["user_id"];?></td>
	                            <td><?php echo $row["user_name"];?></td>
	                            <td><?php echo $row["Issue_date"];?></td>
	                            <td><?php echo $row["return_date"];?></td>
	                           	<td><?php echo $row["status"];?></td>
	                            <td>
	                            	<a href="return.php?id=<?php echo $row["issue_book_id"];?> & userid=<?php echo $row["user_id"];?>& bookid=<?php echo $row["book_id"];?>" class="btn btn-outline-warning">Return</a>
	                                
	                            </td>
	                        </tr>
	                        <?php } ?>
	                    </tbody>
	                </table>
	                <!-- Table End -->
                </div>
                <!-- Book Request  Table End -->



	<!-- Footer include Here -->
	<?php include('adminfooter.php') ?>