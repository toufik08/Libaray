<!DOCTYPE html>
<html>
<head>
    <title>LMS</title>
 
</head>
<body>

<?php
    session_start();
    if(!isset($_SESSION["useremail"])){ 
?>

<script type="text/javascript">
    window.location="../index.php";
</script>

<?php
    }
    else{
?>
<script type="text/javascript">
    window.location="userdashboard.php";
</script>

<?php    
    }
?>

</body>