<?php
require "../connection.php";
$issueid=$_GET["issueid"];
$userid=$_GET["userid"];
$bookid=$_GET["bookid"];


mysqli_query($conn,"DELETE from issuebook WHERE issue_book_id='$issueid' AND user_id='$userid' AND status='pending'");
?>
<script type="text/javascript">
	window.location="issuebook.php";
</script>