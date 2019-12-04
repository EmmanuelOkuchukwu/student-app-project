<?php
    ob_start();
    include("databaseConfig.php");
    session_start();
    

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $stuid = mysqli_real_escape_string($db,$_POST['student_id']);
        $passw = mysqli_real_escape_string($db,md5($_POST['password']));
        

        $sql = "SELECT * FROM students WHERE student_id = '$stuid' and password = '$passw'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];
       
        $group_no = $row["group_no"];
        $email = $row["email"];

        $count = mysqli_num_rows($result);
        
        
        
        if($count == 1) {
            $_SESSION["stuid"] = $stuid;
            $_SESSION['login_user'] = $stuid;
            $_SESSION["group_no"] = $group_no;
            $_SESSION['email'] = $email;
            ob_start();
            header("location: dashboard.php");
        }else{
            
            $error = "Your ID or password is invalid";
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
        <div class="user-heading">
            <h1><img src="images/HEIGRELHS.png" width="100" height="100">&nbsp;Login</h1>
        </div>
        <!-- <nav>
            <ul>
                <li><a href="register.php">Register</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="lecturerlogin.php">Lecturer Login</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>        -->   
    <form action="login.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="login-box">
                <h1>Login</h1> 
                <div class="label">
                    <label for="student_id"><b>Student ID</b></label><br>
                </div>
                <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" placeholder="Student ID" name="student_id">
                </div>
                <br/><br/>
                <div class="label">
                    <label for="password"><b>Password</b></label><br>
                </div>
                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Password" name="password"><br><br>
                </div>
                <input class="button" type="submit" value="Login">
                </div>
                <hr>
            </div>
        </div>
    </form>
    <!-- <div class="container-left">

    </div> -->

            
<footer>
    <p>By emmanz95, All rights reserved</p>
</footer>
        
    </body>
</html>