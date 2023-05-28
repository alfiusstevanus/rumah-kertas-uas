<?php
if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['email']);
        header('location:login.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/fontawesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,700;1,900&display=swap" rel="stylesheet">
    <link rel="icon" href="./images/logo books corner 2.png">
    <title>Books Corner</title>
</head>

<body>
    <header class="sticky sticky-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-30 shadow-lg">
            <div class="container">
                <nav class="navbar">
                    <div class="container">
                        <a class="navbar-brand" href="#">
                            <img src="images/logo books corner 1.png" width="100" alt="">
                        </a>
                    </div>
                </nav>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center mx-auto ps-5 " id="navbarNav">
                    <ul class="navbar-nav ">
                        <li class="nav-item ps-5">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item ps-5">
                            <a class="nav-link" aria-current="page" href="#">Shop</a>
                        </li>
                        <li class="nav-item ps-5">
                            <a class="nav-link" aria-current="page" href="aboutus.php">About Us</a>
                        </li>
                    </ul>
                </div>
                <div class=" collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <div class="dropdown">
                                <a class="nav-link active ms-5 " type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-current="page" href="#"><i class="fa-solid fa-user c-10"></i></a>
                                <ul class="dropdown-menu dropdown-menu-light justify-content-center">
                                    <li><a class="dropdown-item " href="#">Profile</a></li>
                                    <li><a class="dropdown-item " href="#">Transaction</a></li>
                                    <li><a class="dropdown-item  " href="#">Settings</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#logout">Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- modal logout -->
    <div class="modal fade z-index-9" id="logout" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>you will exit this session and login again, Are you sure you want to log out? </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button onclick="window.location.href='index.php?logout=1'" type="button" class="btn btn-danger">logout</button>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir dari modal logout -->
    <main>