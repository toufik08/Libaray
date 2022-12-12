    <!-- Header include Here -->
    <?php include('userheader.php') ?>
    <?php require "../connection.php";
    ?>

					<!-- Body Content Start -->
            <div class="col-sm-10 mt-3">
                <div class="row  text-center">
				<!-- Book Request Table Start -->
                <div class="col-sm-12 mt-3 text-center">

                <?php
                if (isset($_GET["id"])) {
                 	$idissue=$_GET["id"];
					 if ($idissue==0) {
					 	$msg1="Book Request submited Sucesfully!";
					 }
					 elseif ($idissue==1){
					 	$msg2="You are already request/borrow the book or The book is out of stock!";
					 }
				}
                ?>
                <span style="color: red";> <?php echo isset($msg2)? $msg2 :""; ?> </span>
                <span style="color: green";> <?php echo isset($msg1)? $msg1 :""; ?> </span>
				
	                <!-- Table Start -->
	                <p class="bg-dark text-white p-2">book List</p>
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
	                        	<th scope="col">Book Image</th>
	                            <th scope="col">Book ID</th>
	                            <th scope="col">Book Name</th>
	                            <th scope="col">Author Name</th>
	                            <th scope="col">No.Copy</th>
	                            <th scope="col">Available Copy</th>
	                            <th scope="col">Category</th>
	                            <th scope="col">Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    <?php
						    $read_query=mysqli_query($conn,"Select * from booklist where book_name like ('%$_POST[t1]%')");
						    while($row=mysqli_fetch_array($read_query))
						{ ?>
	                        <tr>
	                        	<td><img src="<?php echo $row["book_image"];?>" height=100px width=100px></td>
	                            <th scope="row"><?php echo $row["book_id"];?></th>
	                            <td><?php echo $row["book_name"];?></td>
	                            <td><?php echo $row["author_name"];?></td>
	                            <td><?php echo $row["no_of_copy"];?></td>
	                            <td><?php echo $row["available_copy"];?></td>
	                            <td><?php echo $row["cat_name"];?></td>
	                            <td>
	                            	<?php if ($row["available_copy"]==0) {
	                            		?>

	                            		<a href="userissuenewbookreq2.php"><button class="btn btn-primary mb-3"><i class="fa-solid fa-circle-plus"></i> Issue Book</button></a>

	                            	
	                            	<?php } 
	                            	else{
	                           
	                            	?>


	                             		<a href="userissuenewbookreq.php?id=<?php echo $row["book_id"];?>"><button class="btn btn-primary mb-3"><i class="fa-solid fa-circle-plus"></i> Issue Book</button></a>

	                                <?php } ?>
	                            </td>
	                        </tr>
	                    <?php }?>

	                    </tbody>
	                </table>
	                <?php }



					 // Total book details

					 else { ?>

	                <table class="table">
	                    <thead>
	                        <tr>
	                        	<th scope="col">Book Image</th>
	                            <th scope="col">Book ID</th>
	                            <th scope="col">Book Name</th>
	                            <th scope="col">Author Name</th>
	                            <th scope="col">No.Copy</th>
	                            <th scope="col">Available Copy</th>
	                            <th scope="col">Category</th>
	                            <th scope="col">Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    <?php
						    $read_query=mysqli_query($conn,"Select * from booklist");
						    while($row=mysqli_fetch_array($read_query))
						{ ?>
	                        <tr>
	                        	<td><img src="<?php echo $row["book_image"];?>" height=100px width=100px></td>
	                            <th scope="row"><?php echo $row["book_id"];?></th>
	                            <td><?php echo $row["book_name"];?></td>
	                            <td><?php echo $row["author_name"];?></td>
	                            <td><?php echo $row["no_of_copy"];?></td>
	                            <td><?php echo $row["available_copy"];?></td>
	                            <td><?php echo $row["cat_name"];?></td>
	                            <td>
	                            	<?php if ($row["available_copy"]==0) {
	                            		?>

	                            		<a href="userissuenewbookreq2.php"><button class="btn btn-primary mb-3"><i class="fa-solid fa-circle-plus"></i> Issue Book</button></a>

	                            	
	                            	<?php } 
	                            	else{
	                           
	                            	?>


	                             		<a href="userissuenewbookreq.php?id=<?php echo $row["book_id"];?>"><button class="btn btn-primary mb-3"><i class="fa-solid fa-circle-plus"></i> Issue Book</button></a>

	                                <?php } ?>
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
    <?php include('userfooter.php') ?>
