<!-- harder include Here -->
<?php include('adminheader.php') ?>

<?php
require "../connection.php";
if (isset($_POST["submit"])) {

			$book_name = $_POST["book_name"];
			$user_email = $_POST["user_email"];
			$issuedate = $_POST["issuedate"];
			$returndate = date('d-m-Y', strtotime("+5 days"));

			if ($book_name=="") {
				$book_nameError="Book Name Field is Empty";
			}
			if($user_email=="") {
				$user_emailError="Please Enter your User Name";
			}

			else{
			    $sread_query = "SELECT * FROM booklist WHERE book_name ='$book_name'";
				$sresult = mysqli_query($conn,$sread_query);
			    $tm1row=mysqli_fetch_array($sresult);
			    $bookid = $tm1row['book_id'];
			    $avcbook = $tm1row['available_copy'];


			    $sread_query2 = "SELECT * FROM user WHERE user_email ='$user_email'";
				$sresult2 = mysqli_query($conn,$sread_query2);
			    $tm2row=mysqli_fetch_array($sresult2);
			    $userid = $tm2row['user_id'];
			    $username = $tm2row['user_name'];

			    if ($avcbook==0) {
			    	$NObook="The book is out of stock!";

			    }
			    else{

			    $sql = "SELECT * FROM issuebook WHERE book_name ='$book_name' AND user_email='$user_email' AND status='pending' OR 'borrow' ";
			    $result = mysqli_query($conn,$sql);
			    $count = mysqli_num_rows($result);
				    if ($count == 0) {
						$sql= mysqli_query($conn,"INSERT INTO issuebook(book_id, book_name, user_email, user_id, user_name, Issue_date, return_date, status) VALUES('$bookid', '$book_name', '$user_email', '$userid','$username', '$issuedate', '$returndate','borrow')");
						
						$upsql=mysqli_query($conn,"UPDATE booklist SET available_copy=available_copy-1  WHERE book_id='$bookid' ");

						if ($sql) {

					        $issuesecessfullmsg="Successfully Issue Book!";
					    }
					    else{
					        $issuefailmsg="Book Issue fail!";
					    } 
				    }

				    else{
				    	$allradyexistError=" allready issue the book!";
				    }
				}
			}
}
?>
        <div class="col-sm-8 mt-3">
			<!-- Start add book From  -->
				<div class="card">
					<div class="card-header bg-primary text-white">
						<h2>Issue New Book</h2>
					</div>
					<div class="card-body">
						<!--  add book From  -->
						<form action="" method="POST">
						<span style="color: red";> <?php echo isset($NObook)? $NObook :""; ?> </span>
						<span style="color: green";> <?php echo isset($issuesecessfullmsg)? $issuesecessfullmsg :""; ?> </span>
						<span style="color: red";> <?php echo isset($issuefailmsg)? $issuefailmsg :""; ?> </span>
						<span style="color: red";> <?php echo isset($allradyexistError)? $allradyexistError :""; ?> </span>
						<!-- Book Name -->
							<div class="mb-3">
								<label for="Category" class="form-label">Select Book</label>
								<span style="color: red";> <?php echo isset($book_nameError)? $book_nameError :""; ?> </span>

								<select type="text" class="js-example-basic-single form-control" name="book_name" id="book_name" placeholder="Select Category" value="">
									<?php
										$sread_query = "SELECT * FROM booklist";
									    $sresult = mysqli_query($conn,$sread_query);
									?>
									<option value="">Select Book</option>
									<?php
										while($srow=mysqli_fetch_array($sresult)){
									?>
									<option value="<?php echo $srow['book_name'] ;?>"> <?php echo $srow['book_name'] ;?></option>
									<?php } ?>
							    </select>

						    </div> 	
							<!-- Email-->

							<div class="mb-3">
								<label for="Category" class="form-label">Select User Email</label>
								<span style="color: red";> <?php echo isset($book_nameError)? $book_nameError :""; ?> </span>
								<?php
									$sread_query = "SELECT * FROM user";
								    $sresult = mysqli_query($conn,$sread_query);
								?>
								<select type="text" class="js-example-basic-single form-control" name="user_email" id="user_email" placeholder="Select User Email" value="">

									<option value="">Select User Email</option>
									<?php
										while($srow=mysqli_fetch_array($sresult)){
									?>
									<option value="<?php echo $srow['user_email'] ;?>"> <?php echo $srow['user_email'] ;?></option> 
									
									<?php } ?>
							    </select>

						    </div> 

						    <div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Issue Date</label>
								<input type="text" class="form-control" name="issuedate" id="issuedate" placeholder="Issue Date" value="<?php echo date("d-m-Y") ?>">
						    </div>

							<button type="submit" name="submit" class="btn btn-primary">Submit</button>
							<a href="issuebook.php" class="btn btn-danger"> Cancel </a>
						</form>
						<!--  add book From  -->
					</div>
				</div>
			</div>
		<!-- End add book From  -->



	<!-- Footer include Here -->

	<?php include('adminfooter.php')?>