    <!-- Header include Here -->
    <?php include('userheader.php') ?>
    <?php require "../connection.php";
    ?>


			<!-- Admin Body Content Start -->
            <div class="col-sm-9 mt-3">
                <div class="row mx-5 text-center">
    				<!-- Book Request Table Start -->
                    <div class="col-sm-12 mt-3 text-center">
    	                <!-- Table Start -->
    	                <p class="bg-dark text-white p-2">My Issue Book</p>
                        <a href="userissuenewbook.php"><button class="btn btn-primary mb-3">Issue New book Request</button></a>
    	                <table class="table">
    	                    <thead>
    	                        <tr>
    	                            <th scope="col">Book ID</th>
    	                            <th scope="col">Book Name</th>
    	                            <th scope="col">Issue Date</th>
    	                            <th scope="col">Estimated Return Date</th>
    	                            <th scope="col">Status</th>
                                    <th scope="col">Action</th>

    	                            
    	                        </tr>
    	                    </thead>
                            <?php
                            $read_query=mysqli_query($conn,"Select * from issuebook WHERE user_email='$_SESSION[useremail]' and status!='returned'");
                            while($row=mysqli_fetch_array($read_query))
                            {
                                $rdate= $row["return_date"];
                                $userids= $row["user_id"];
                                $bookids= $row["book_id"];
                                $datetoday=date("y-m-d");
                                $rrrrdate=date("y-m-d", strtotime($rdate));

                            ?>
    	                    <tbody>
                                <td style="display: none;" ><?php 

                                if ($rrrrdate<$datetoday) {
                                    mysqli_query($conn,"UPDATE issuebook SET status='dateover' WHERE user_id='$userids' AND status='borrow' AND book_id=' $bookids'");
                                    
                                }


                                ?></td>
    	                        <tr>
    	                            <th><?php echo $row["book_id"];?></th>
    	                            <td><?php echo $row["book_name"];?></td>
    	                            <td><?php echo $row["Issue_date"];?></td>
    	                            <td><?php echo $row["return_date"];?></td>
                                    <td><strong><?php echo $row["status"];?></strong></td>
                                    <?php if ($row["status"]=="pending"){ ?>
    	                            <td>
                                        <a href="deleteissuebook.php?id=<?php echo $row["book_id"]; ?>"><button class="btn btn-danger mb-3"><i class="far fa-trash-alt"></i> Delete</button></a>
    	                            </td>
                                    <?php } ?>
    	                    </tbody>
                            <?php } ?>
    	                </table>
    	                <!-- Table End -->
                    </div>
                <!-- Book Request  Table End -->
                </div>
            </div>            
			<!-- End Body Content Start -->

    <!-- Footer include Here -->
    <?php include('userfooter.php') ?>
