<?php
session_start();
include("connection.php");
if (!isset($_SESSION['admin_username'])) {
    header("location:login.php");
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./CSS/page.css">
</head>
<body>
    <div id="app">
        <nav>
            <ul>
                <li><a href="admin_depan.php">Admin Page</a> </li>
                <?php if(in_array("guru", $_SESSION['admin_access'])) { ?>
                    <li><a href="guru_depan.php">Teacher Page</a> </li>
                <?php } ?>
                <?php if(in_array("siswa", $_SESSION['admin_access'])) { ?>
                    <li><a href="siswa_depan.php">Student Page</a> </li>
                <?php } ?>
                <li><a href="logout.php">Logout</a> </li>
            </ul>
        </nav>