<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="newmain.css">
    </head>
    
    <body>
        <div class="heading">
            <h1>Register</h1>
        </div>    
        <nav>
            <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>
            
<form action="register_function.php" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="textbox">
                    <input type="text" name="student_id" placeholder="Student ID"><br>
                </div>
                <div class="textbox">
                    <input class="textbox" type="text" name="email" placeholder="Email"><br>
                </div>
                <div class="textbox">
                    <input class="textbox" type="password" name="password" autocomplete="new-password" placeholder=" Password"><br>
                </div>
                <div class="textbox">
                    <input class="textbox" type="password" name="verifypassword" autocomplete="new-password" placeholder="Comfirm Password"><br>
                </div>
                <label for="group_no"><b>Group Number</b></label><br>                
                <select name="group_no">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                </select>

                <br>
                
                <input class="button2" type="submit" value="Register">
            </div>
        </div>
    </div>
</form>

            
<footer>
    <p>By emmanz95, All rights reserved<a href="#" class="fa fa-instagram"></a><a href="#" class="fa fa-youtube"></a><a href="#" class="fa fa-linkedin"></a></p>
</footer>
    </body>
</html>

