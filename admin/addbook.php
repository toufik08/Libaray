<!-- harder include Here -->
<?php include('adminheader.php') ?>

<?php
require "../connection.php";
if (isset($_POST["signup"])) {

			$book_name = $_POST["book_name"];

			$tm=md5(time());
			$fnm=$_FILES["img"]["name"];
			$dst="../image/books_image/".$tm.$fnm;
			$dst1="../image/books_image/".$tm.$fnm;
			move_uploaded_file($_FILES["img"]["tmp_name"], $dst);

			$author_name = $_POST["author_name"];
			$number_of_copies = $_POST["number_of_copies"];
			$select_category= $_POST["select_category"];

			if ($book_name=="") {
				$book_nameError="Book Name Field is Empty";
			}

			if($author_name=="") {
				$author_nameError="Please Enter your Author Name";
			}
			if($number_of_copies=="") {
				$number_of_copiesError="Please Enter Number od Books";
			}
			if($select_category=="") {
				$select_categoryError="Please Select Category";
			}

			else{
				$sql = "SELECT book_name FROM booklist WHERE book_name = '$book_name'";
			    $result = mysqli_query($conn,$sql);


			    $count = mysqli_num_rows($result);
				    if ($count == 0) {
						$sql= mysqli_query($conn,"INSERT INTO booklist(book_name, author_name, book_image, no_of_copy, available_copy,	cat_name) VALUES('$book_name', '$author_name', '$dst1', '$number_of_copies', '$number_of_copies', '$select_category')");

						if ($sql) {

					        $addbookmsg="Successfully Added Book!";
					    }
					    else{
					        $addfailmsg="Book adding fail!";
					    } 
				    }

				    else{
				    	$allradyexistError="Book allready Exist!";
				    }
			}
}
?>



        <div class="col-sm-8 mt-3">
			<!-- Start add book From  -->
				<div class="card">
					<div class="card-header bg-primary text-white">
						<h2>Add New Book</h2>
					</div>
					<div class="card-body">
						<!--  add book From  -->
						<form action="" method="POST" enctype="multipart/form-data">

							<div class="mb-3">
								<label for="name" class="form-label">Book Name </label>
								<!--  sucessfully -->
								<span style="color: green";> <?php echo isset($addbookmsg)? $addbookmsg :""; ?> </span>
								<!--  fail -->
								<span style="color: red";> <?php echo isset($addfailmsg)? $addfailmsg :""; ?> </span>
								<!-- allready exist -->
								<span style="color: red";> <?php echo isset($allradyexistError)? $allradyexistError :""; ?> </span>
								<!-- Empty  Error -->
								<span style="color: red";> <?php echo isset($book_nameError)? $book_nameError :""; ?> </span>
								<input type="text" class="form-control" name="book_name" id="name" placeholder="Enter Book Name" value="">
							</div>

							<!-- book image start-->

							<div class="mb-3">
								<label for="exampleInputimg" class="form-label">Book Image</label>
								<input type="file" class="form-control" id="file" name="img">
							</div>

							<!-- book image end -->



							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Author Name</label>
								<span style="color: red";> <?php echo isset($author_nameError)? $author_nameError :""; ?> </span>
								<input type="text" class="form-control" name="author_name" id="authorname" placeholder="Enter Author Name" value="">
							</div>

 						<!-- Add category Start-->
							<div class="mb-3">
								<label for="Category" class="form-label">Select Category</label>
								<span style="color: red";> <?php echo isset($select_categoryError)? $select_categoryError :""; ?> </span>

								<select type="text" class="form-control" name="select_category" id="select_category" placeholder="Select Category" value="">
									<?php
										$sread_query = "SELECT * FROM category";
									    $sresult = mysqli_query($conn,$sread_query);
									   
										// while($row=mysqli_fetch_array($sresult)){}
									?>
									<option value="">Select Category</option>
									<?php
										while($srow=mysqli_fetch_array($sresult)){
									?>
									<option value="<?php echo $srow['category_name'] ;?>"> <?php echo $srow['category_name'] ;?></option>
									<?php } ?>
							    </select>

						    </div>
							<!-- Add category End-->	

							<div class="mb-3">
								<label for="exampleInputphone" class="form-label">Number of Copies</label>
								<span style="color: red";> <?php echo isset($number_of_copiesError)? $number_of_copiesError :""; ?> </span>
								<input type="number" class="form-control" name="number_of_copies" id="number_of_copies" placeholder="Number of Copies" value="">
							</div>
							<button type="submit" name="signup" class="btn btn-primary">Submit</button>
							<a href="booklist.php" class="btn btn-danger"> Cancel </a>
						</form>
						<!--  add book From  -->
					</div>
				</div>
			</div>
		<!-- End add book From  -->



	<!-- Footer include Here -->

	<?php include('adminfooter.php')?>