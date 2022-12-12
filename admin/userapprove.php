<?php
require "../connection.php";
$id=$_GET["id"];
mysqli_query($conn,"Update user set status='yes' where user_id=$id");
?>
<script type="text/javascript">
	window.location="userslist.php";
</script>
