<?php
require "../connection.php";
$id=$_GET["id"];
$userid=$_GET["userid"];
$bookid=$_GET["bookid"];
$rdate=date("d-m-y");


mysqli_query($conn,"UPDATE issuebook SET status='returned',return_date='$rdate' WHERE issue_book_id='$id' AND user_id='$userid'");
mysqli_query($conn,"UPDATE booklist SET available_copy=available_copy+1  WHERE book_id='$bookid'");
?>
<script type="text/javascript">
	window.location="dateoverbook.php";
</script>