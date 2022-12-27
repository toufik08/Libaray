<?php
include('userheader.php');
require "../connection.php";

$useremails=$_SESSION["useremail"];
$idbook=$_GET["id"];

$read_query=mysqli_query($conn,"Select * from booklist where book_id='$idbook'");
 while($row=mysqli_fetch_array($read_query))
	{
		$bookid=$row["book_id"];
	    $book_name=$row["book_name"];
	}

$read_query1=mysqli_query($conn,"Select * from user where user_email='$useremails'");
 while($row1=mysqli_fetch_array($read_query1))
	{
		$userid=$row1["user_id"];
	    $user_name=$row1["user_name"];
	    $issuedate = date("d-m-y");
		$returndate = date('d-m-y', strtotime("+5 days"));
	}

$sql = "SELECT * FROM issuebook WHERE book_name ='$book_name' AND user_email='$useremails' AND status!='returned'";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);
    if ($count == 0) {
		$sql= mysqli_query($conn,"INSERT INTO issuebook(book_id, book_name, user_email, user_id, user_name, Issue_date, return_date, status) VALUES('$bookid', '$book_name', '$useremails', '$userid','$user_name', '$issuedate', '$returndate','pending')");
		
		if ($sql) {
			mysqli_query($conn,"UPDATE booklist SET available_copy=available_copy-1  WHERE book_id='$bookid'");
	?>
			<script type="text/javascript">
				 window.location="userbooklist.php?id=<?php echo"0"?>";
			</script>
	<?php 
		}
	    else{
	?>
	       <script type="text/javascript">
				 window.location="userbooklist.php?id=<?php echo"1"?>";
			</script>
	<?php 
			} 
	}
	else{
	?>
	<script type="text/javascript">
		window.location="userbooklist.php?id=<?php echo"1"?>";
	</script>
	<?php
		}
	?>