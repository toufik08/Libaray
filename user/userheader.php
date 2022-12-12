<!DOCTYPE html>
<html>
<head>
    <title>LMS</title>
    <link rel="stylesheet" type="text/css" href="../css/all.min.css"> <!-- Fontawesome css -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> <!-- Booststap css -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /><!-- Select box css -->
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
?>
    <!-- start Nav bar from here -->
    <nav class="navbar bg-dark">
        <div class="container-fluid text-white">
            <a class="navbar-brand text-white" href="#">
                <img src="../image/logo.png" alt="" width="40" height="34" class="d-inline-block align-text-top">
                Library Management System
                <?php 
                require "../connection.php";
                $useremails=$_SESSION["useremail"];
                $read_query="Select * from user where user_email= '$useremails'";
                $result = mysqli_query($conn, $read_query);
                $row = mysqli_fetch_assoc($result)
                                    
                ?>
                <h6 class="ml-5"><strong><?php echo $row["user_name"];?>'s</strong> Dasboard</h6>
            </a>
        </div>
    </nav>
    <!-- End Nav bar -->

    <div class="container-fluid">
        <div class="row">
            <!-- Start Side bar -->
            <div class="col-sm-2">
                <nav class="bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="userdashboard.php" class="nav-link">
                                    <i class="fa-solid fa-gauge-high"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="userbooklist.php" class="nav-link">
                                    <i class="fa-solid fa-book"></i>
                                    Book List
                                </a>
                            </li>
                             <li class="nav-item">
                                <a href="returned_book_history.php" class="nav-link">
                                    <i class="fa-solid fa-clock-rotate-left"></i>
                                    Return Book History
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="userprofile.php" class="nav-link">
                                    <i class="fa-solid fa-user"></i>
                                    Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="userlogout.php" class="nav-link">
                                    <i class="fas fa-sign-out-alt"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
<!-- End Side bar -->