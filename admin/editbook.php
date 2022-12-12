<!-- harder include Here -->
<?php include('adminheader.php');
require "../connection.php";
$id=$_GET["id"];
$read_query=mysqli_query($conn,"SELECT * FROM booklist WHERE book_id='$id'");
    while($row=mysqli_fetch_array($read_query)){ 

        $bookname_old= $row["book_name"];
        $bookimage_old= $row["book_image"];
        $authorname_old= $row["author_name"];
        $category_old= $row["cat_name"];
        $numberofcopies_old= $row["no_of_copy"];  
    }




if (isset($_POST["signup"])) {

			$bookname_new = $_POST["book_name"];

			$tm=md5(time());
			$fnm=$_FILES["img"]["name"];
			$dst="../image/books_image/".$tm.$fnm;
			$dst1="../image/books_image/".$tm.$fnm;
			move_uploaded_file($_FILES["img"]["tmp_name"], $dst);

			if ($fnm=="") {
                $dst1=$bookimage_old;
                
            }
            else{
               $dst1=$dst1; 
            }



			$authorname_new = $_POST["author_name"];
			$numberofcopies_new = $_POST["number_of_copies"];
			$category_new= $_POST["select_category"];

			if ($bookname_new=="") {
				$book_nameError="Book Name Field is Empty";
			}

			if($authorname_new=="") {
				$author_nameError="Please Enter your Author Name";
			}
			if($numberofcopies_new=="") {
				$number_of_copiesError="Please Enter Number od Books";
			}
			if($category_new=="") {
				$select_categoryError="Please Select Category";
			}

			else{
				$sql= mysqli_query($conn,"UPDATE booklist SET book_name ='$bookname_new',book_image ='$dst1',author_name ='$authorname_new',cat_name='$category_new',no_of_copy='$numberofcopies_new'WHERE book_id='$id'");

						if ($sql) {

					        $addbookmsg="Successfully update Book!";
					    }
					    else{
					        $addfailmsg="Book update fail!";
					    } 
				    }
			}











?>

				<div class="card-body">
					<div class=" card-header bg-primary text-white text-center mb-3">
					  <h2>Edit Book</h2>
			        </div>
						<!--  add book From  -->

						<form action="" method="POST" enctype="multipart/form-data">

							<div class="mb-3">
								<label for="name" class="form-label">Book Name </label>
								<!--  sucessfully -->
								<span style="color: green";> <?php echo isset($addbookmsg)? $addbookmsg :""; ?> </span>
								<!--  fail -->
								<span style="color: red";> <?php echo isset($addfailmsg)? $addfailmsg :""; ?> </span>
								<!-- Empty  Error -->
								<span style="color: red";> <?php echo isset($book_nameError)? $book_nameError :""; ?> </span>
								<input type="text" class="form-control" name="book_name" id="name" placeholder="Enter Book Name" value="<?php echo isset($bookname_new)?$bookname_new:$bookname_old; ?>">
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
								<input type="text" class="form-control" name="author_name" id="authorname" placeholder="Enter Author Name" value="<?php echo isset($authorname_new)?$authorname_new:$authorname_old; ?>">
							</div>

 						<!-- Add category Start-->
							<div class="mb-3">
								<label for="Category" class="form-label">Select Category</label>
								<span style="color: red";> <?php echo isset($select_categoryError)? $select_categoryError :""; ?> </span>

								<select type="text" class="form-control" name="select_category" id="select_category" placeholder="Select Category" value="<?php echo isset($category_new)?$category_new:$category_old; ?>">
									<?php
										$sread_query = "SELECT * FROM category";
									    $sresult = mysqli_query($conn,$sread_query);
									   
							
									?>
									<option value="<?php echo isset($category_new)?$category_new:$category_old; ?>">Select Category</option>
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
								<input type="number" class="form-control" name="number_of_copies" id="number_of_copies" placeholder="Number of Copies" value="<?php echo isset($numberofcopies_new)?$numberofcopies_new:$numberofcopies_old; ?>">
							</div>
							<button type="submit" name="signup" class="btn btn-primary">Submit</button>
							<a href="booklist.php" class="btn btn-danger"> Cancel </a>
						</form>
						<!--  add book From  -->
					</div>



<!-- Footer include Here -->
<?php include('adminfooter.php') ?>










