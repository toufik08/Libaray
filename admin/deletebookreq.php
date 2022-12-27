<?php
require "../connection.php";
$issueid=$_GET["issueid"];
$userid=$_GET["userid"];
$bookid=$_GET["bookid"];


mysqli_query($conn,"DELETE from issuebook WHERE issue_book_id='$issueid' AND user_id='$userid' AND status='pending'");
mysqli_query($conn,"UPDATE booklist SET available_copy=available_copy+1  WHERE book_id='$bookid'");
?>
<script type="text/javascript">
	window.location="issuebook.php";
</script>