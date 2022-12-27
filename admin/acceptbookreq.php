<?php
require "../connection.php";
$issueid=$_GET["issueid"];
$userid=$_GET["userid"];
$bookid=$_GET["bookid"];
$rdate=date('d-m-Y', strtotime("+5 days"));


mysqli_query($conn,"UPDATE issuebook SET status='borrow',return_date='$rdate' WHERE issue_book_id='$issueid' AND user_id='$userid'");
mysqli_query($conn,"UPDATE booklist SET available_copy=available_copy-1  WHERE book_id='$bookid'");
?>
<script type="text/javascript">
	window.location="issuebook.php";
</script>