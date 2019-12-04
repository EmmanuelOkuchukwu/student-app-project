<?php
    ob_start();
    include("databaseConfig.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $techid = mysqli_real_escape_string($db,$_POST['teacher_id']);
        $passw = mysqli_real_escape_string($db,$_POST['password']);
        
        $sql = "SELECT * FROM lecturer where teacher_id = '$techid' and password ='$passw'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];
        
        $email = $row["email"];

        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $_SESSION['email'] = $email;
            ob_start();
            header("location: lecturerDashboard.php");
        }else {
            
            $erorr = "Your ID or password is invalid";
        }

        if (isset($error))
        {
            echo $error;
        }
        
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="newmain.css">
    </head>
    <body>
        <div class="heading">
            <h1>Login</h1>
        </div>
        <nav>
            <ul>
                <!-- <li><a href="register.php">Register</a></li> -->
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>
<div class="row">            
    <form action="lecturerlogin.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h1>Login</h1> 
                    <hr>
                    <label for="student_id"><b>Teacher ID</b></label>
                    <input type="text" name="teacher_id">
                    <br/>
                    <br/>
                    <label for="password"><b>Password</b></label><br>
                    <input type="password" name="password"><br><br>
                    <input type="submit" value="Login">
                    <hr>
                </div>
            </div>
        </div>
    </form>
    <div class="container-left">

    </div>
</div>

            
<footer>
    <p>By emmanz95</p>
    <p>All rights reserved</p>
</footer>