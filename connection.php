<?php
$db_host    = "localhost";
$db_user    = "root";
$db_pass    = "";
$db_name    = "multiuser";

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$connection){
    die("Failed to connect");
}

// menit 37 detik 19