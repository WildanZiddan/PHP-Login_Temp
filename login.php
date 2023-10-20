<?php
session_start();
if (isset($_SESSION['admin_username'])) {
    header("location:admin_depan.php");
}

include("connection.php");
$username = "";
$password = "";
$error = "";

if (isset($_POST['Login'])) {
    $username   = $_POST['username'];
    $password   = $_POST['password'];

    if($username == '' or $password == ''){
        $error .= "<li>Please add your username and password</li>";
    }
    if(empty($error)){
        $sql1 = "select * from admin where username = '$username'";
        $q1 = mysqli_query($connection, $sql1);
        $r1 = mysqli_fetch_array($q1);
        if($r1['password'] != md5($password)){
            $error .= "<li>Wrong password!</li>";
        }
    }
    if(empty($error)){
        $_SESSION['admin_username'] = $username;
        header("location:admin_depan.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./CSS/login.css">
</head>
<body>
    <div id="app">
    <h2>Login</h2>
    <?php
    if ($error) {
        echo "<ul>$error</ul>";
    }
    ?>
        <form action="" method="post" class="form">
            <input type="text" value="<?php echo $username ?>" name="username" class="input" placeholder="Username"> <br> <br>
            <input type="password" name="password" class="input" placeholder="Password"> <br> <br>
            <input type="submit" name="Login" value="Login" class="input button">
        </form>
        <div class="signup">
            <p>Don't have an account? <a class="link" href="#">Sign Up</a> </p>
        </div>
    </div>
</body>
</html>