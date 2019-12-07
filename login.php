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
            <h1><img src="images/HEIGRELHS.png" width="170" height="100">&nbsp;Student Peer Assessment</h1>
        </div>
        <!-- <nav>
            <ul>
                <li><a href="register.php">Register</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="lecturerlogin.php">Lecturer Login</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>        -->   
    <form action="login_function.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="login-box">
                <h1>Login</h1> 
                <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" placeholder="Student ID" name="student_id">
                </div><br/>
                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Password" name="password"><br><br>
                </div>
                <input class="button" type="submit" value="Login">
                <br><br><br>
                <label class="label" for="register"><b>Need to an account?</b></label>
                <a href="register.php">Register here</a>
                </div>
                <hr>
            </div>
        </div>
    </form>
    <!-- <div class="container-left">

    </div> -->

            
<footer>
    <p>By emmanz95, All rights reserved <a href="#" class="fa fa-instagram"></a><a href="#" class="fa fa-youtube"></a><a href="#" class="fa fa-linkedin"></a></p>
</footer>
        
    </body>
</html>