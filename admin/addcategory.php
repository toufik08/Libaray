<!-- harder include Here -->
<?php include('adminheader.php') ?>

<?php
require "../connection.php";
if (isset($_POST["signup"])) {

			$category_name = $_POST["category_name"];

			if ($category_name=="") {
				$category_nameError="Book Name Field is Empty";
			}
			else{
				$sql = "SELECT category_name FROM category WHERE category_name = '$category_name'";
			    $result = mysqli_query($conn,$sql);


			    $count = mysqli_num_rows($result);
				    if ($count == 0) {
						$sql= mysqli_query($conn,"INSERT INTO category(category_name) VALUES('$category_name')");

						if ($sql) {

					        $addcategorymsg="Successfully Added Category!";
					    }
					    else{
					        $addcategoryfailmsg="Category adding fail!";
					    } 
				    }

				    else{
				    	$allradyexistcategoryError="Category allready Exist!";
				    }
			}
}
?>



        <div class="col-sm-8 mt-3">
			<!-- Start add Category From  -->
				<div class="card">
					<div class="card-header bg-primary text-white">
						<h2>Add New Category</h2>
					</div>
					<div class="card-body">
						<!--  add Category From  -->
						<form action="" method="POST">

							<div class="mb-3">
								<label for="name" class="form-label">Category Name </label>
								<!--  sucessfully -->
								<span style="color: green";> <?php echo isset($addcategorymsg)? $addcategorymsg :""; ?> </span>
								<!--  fail -->
								<span style="color: red";> <?php echo isset($addcategoryfailmsg)? $addcategoryfailmsg :""; ?> </span>
								<!-- allready exist -->
								<span style="color: red";> <?php echo isset($allradyexistcategoryError)? $allradyexistcategoryError :""; ?> </span>
								<!-- Empty  Error -->
								<span style="color: red";> <?php echo isset($category_nameError)? $category_nameError :""; ?> </span>
								<input type="text" class="form-control" name="category_name" id="name" placeholder="Enter Category Name" value="">
							</div>
							<button type="submit" name="signup" class="btn btn-primary">Submit</button>
							<button type="submit" name="signup" class="btn btn-danger">Cancel</button>
						</form>
						<!--  add Category From  -->
					</div>
				</div>
			</div>
		<!-- End add Category From  -->



	<!-- Footer include Here -->

	<?php include('adminfooter.php')?>