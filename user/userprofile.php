<!-- Header include Here -->
<?php include('userheader.php');
require "../connection.php";


?>

<div class="col-sm-3">
</div>
<div class="col-sm-4 mt-3">
	<div class="row row-cols-1 row-cols-md-3 g-4">
		<div class="col">
			<div class="card">				
				<div class="card-body">
					<?php
					    $read_query=mysqli_query($conn,"SELECT * from user Where user_email='$_SESSION[useremail]'");		 
					    while($row=mysqli_fetch_array($read_query))
					    {   
					 
					 	?>	
					 	<img src="<?php echo ".".$row["user_pic"];?>" class="card-img-top" alt="profile image">	
					<table class="table">
						<thead">	
							<tr>
								<th>Name</th>
								<td><?php echo $row["user_name"];?></td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th>User ID</th>
								<td><?php echo $row["user_id"];?></td>
							</tr>
							<tr>
								<th>Email</th>
								<td><?php echo $row["user_email"];?></td>
							</tr>
							<tr>
								<th>Contact Number</th>
								<td><?php echo $row["user_phoneno"];?></td>
							</tr>
							<tr>
								<th>Student ID</th>
								<td><?php echo $row["student_id"];?></td>
							</tr>
							<tr>
								<th>Department</th>
								<td><?php echo $row["dept"];?></td>
							</tr>	
						</tbody>	
					</table>
					<div class="text-center">
					<a href="edituserprofile.php"><button type="submit" class="btn btn-warning" name="Delete"><i class="far fa-trash-alt"></i> Edit Profile</button></a>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Footer include Here -->
<?php include('userfooter.php') ?>
