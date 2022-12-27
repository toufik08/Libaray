	<!-- harder include Here -->
	<?php
        include('adminheader.php');
        require "../connection.php";

$sql_booklist="SELECT * FROM booklist";
$sql_user="SELECT * FROM user WHERE status='yes'";
$sql_category="SELECT * FROM category";
$sql_bookreq="SELECT * FROM issuebook WHERE status='pending'";
$sql_bookborrow="SELECT * FROM issuebook WHERE status='borrow'";
$sql_bookdateover="SELECT * FROM issuebook WHERE status='dateover'";


    ?>

			<!-- Admin Body Content Start -->
            <div class="col-sm-9 mt-3">
                <div class="row mx-5 text-center">
                <!-- Info Start -->
                    <div class="col-sm-4">
                        <div class="card text-white mb-3" style="max-width: 18rem; background-image:linear-gradient(#FD878F, #FD7279);">
                            <div class="card-header">Total Book</div>
                            <div class="card-body">
                                <h2 class="card-title">
                                <?php 
                                    if ($result=mysqli_query($conn,$sql_booklist))
                                    {
                                      $rowcount=mysqli_num_rows($result);
                                      echo $rowcount;
                                    }
                                ?>                             
                                </h2>
                                <a href="#" class="btn text-white">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card text-white mb-3" style="max-width: 18rem; background-image:linear-gradient(#4055CF, #2F45C5);">
                            <div class="card-header">Total User</div>
                            <div class="card-body">
                                <h2 class="card-title">
                                <?php 
                                    if ($result=mysqli_query($conn,$sql_user))
                                    {
                                      $rowcount=mysqli_num_rows($result);
                                      echo $rowcount;
                                    }
                                ?> 
                                </h2>
                                <a href="#" class="btn text-white">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card text-white mb-3" style="max-width: 18rem; background-image:linear-gradient(#915CD3, #8145CD);">
                            <div class="card-header">Total Category</div>
                            <div class="card-body">
                                <h2 class="card-title">
                                <?php 
                                    if ($result=mysqli_query($conn,$sql_category))
                                    {
                                      $rowcount=mysqli_num_rows($result);
                                      echo $rowcount;
                                    }
                                ?> 
                                </h2>
                                <a href="#" class="btn text-white">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card text-white mb-3" style="max-width: 18rem; background-image:linear-gradient(#FD878F, #FD7279);">
                            <div class="card-header">Total Book Resuest</div>
                            <div class="card-body">
                                <h2 class="card-title">
                                <?php 
                                    if ($result=mysqli_query($conn,$sql_bookreq))
                                    {
                                      $rowcount=mysqli_num_rows($result);
                                      echo $rowcount;
                                    }
                                ?> 
                                </h2>
                                <a href="#" class="btn text-white">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card text-white mb-3" style="max-width: 18rem; background-image:linear-gradient(#4055CF, #2F45C5);">
                            <div class="card-header">Total Borrow Book</div>
                            <div class="card-body">
                                <h2 class="card-title">
                                <?php 
                                    if ($result=mysqli_query($conn,$sql_bookborrow))
                                    {
                                      $rowcount=mysqli_num_rows($result);
                                      echo $rowcount;
                                    }
                                ?>
                                </h2>
                                <a href="#" class="btn text-white">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card text-white mb-3" style="max-width: 18rem; background-image:linear-gradient(#915CD3, #8145CD);">
                            <div class="card-header">Total Not Return book</div>
                            <div class="card-body">
                                <h2 class="card-title">
                                <?php 
                                    if ($result=mysqli_query($conn,$sql_bookdateover))
                                    {
                                      $rowcount=mysqli_num_rows($result);
                                      echo $rowcount;
                                    }
                                ?>
                                </h2>
                                <a href="#" class="btn text-white">View</a>
                            </div>
                        </div>
                    </div>
                    <!-- Info End -->

				<!-- Book Request Table Start -->

                <div class="col-sm-12 mt-3 text-center">
	                <!-- Table Start -->
	                <p class="bg-dark text-white p-2">Requested Book</p>
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
                            $read_query=mysqli_query($conn,"SELECT * from issuebook WHERE status='pending' ORDER BY Issue_date DESC");
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






                </div>
            </div>            
			<!-- End Body Content Start -->

	<!-- Footer include Here -->

	<?php include('adminfooter.php')?>