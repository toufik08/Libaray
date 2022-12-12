<!-- harder include Here -->
<?php include('adminheader.php') ?>

<?php
if (isset($_POST["signup"])) {

			$book_name = $_POST["book_name"];
			$author_name = $_POST["author_name"];
			$number_of_copies = $_POST["number_of_copies"];

			if ($book_name=="") {
				$book_nameError="Book Name Field is Empty";
			}

			else if($author_name=="") {
				$author_nameError="Please Enter your Author Name";
			}
			else if($number_of_copies=="") {
				$number_of_copiesError="Please Enter Number od Books";
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
						<form action="" method="POST">

							<div class="mb-3">
								<label for="name" class="form-label">Book Name </label>
								<span style="color: red";> <?php echo isset($book_nameError)? $book_nameError :""; ?> </span>
								<input type="text" class="form-control" name="book_name" id="name" placeholder="Enter Book Name" value="">
							</div>

							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Author Name</label>
								<input type="email" class="form-control" name="author_name" id="exampleInputEmail1" placeholder="Enter Author Name" value="">
							</div>


							<div class="mb-3">
								<label for="exampleInputphone" class="form-label">Number of Copies</label>
								<input type="text" class="form-control" name="number_of_copies" id="number_of_copies" placeholder="Number of Copies" value="">
							</div>
							<button type="submit" name="signup" class="btn btn-primary">Submit</button>
							<button type="submit" name="signup" class="btn btn-danger">Cancel</button>
						</form>
						<!--  add book From  -->
					</div>
				</div>
			</div>
		<!-- End add book From  -->



	<!-- Footer include Here -->

	<?php include('adminfooter.php')?>