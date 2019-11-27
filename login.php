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
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <div class="heading">
            <h1>Login</h1>
        </div>
        <nav>
            <ul>
                <li><a href="register.php">Register</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>
<div class="row">            
    <form action="login.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h1>Login</h1> 
                    <hr>
                    <label for="student_id"><b>Student ID</b></label>
                    <input type="text" name="student_id">
                    <br/>
                    <br/>
                    <label for="password"><b>Password</b></label><br>
                    <input type="password" name="password"><br><br>
                    <input type="submit">
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
        
    </body>
</html>