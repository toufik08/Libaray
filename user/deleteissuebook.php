<?php
include('userheader.php');
require "../connection.php";
$useremails=$_SESSION["useremail"];
$id=$_GET["id"];
mysqli_query($conn,"delete from issuebook where book_id='$id' and user_email='$useremails'")
?>
<script type="text/javascript">
    window.location="userdashboard.php?id=del";
</script>