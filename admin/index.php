<?php
	session_start();
	if(!isset($_SESSION["email"])){ 
?>

<script type="text/javascript">
	window.location="adminlogin.php";
</script>

<?php
    }
    else{ ?>
<script type="text/javascript">
    window.location="admindashboard.php";
</script>

<?php    
    }
?>