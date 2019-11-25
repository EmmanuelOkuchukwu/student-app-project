<?php
session_start();
include("databaseConfig.php");
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


function check_if_already_registered($db, $student_id)
{
    $query = mysqli_query($db,"select student_id from students where student_id = $student_id ");
    $row = mysqli_fetch_array($query,MYSQL_ASSOC);
    if($row['student_id'] == $student_id)
    {
        return true;
    }
    return false;
}


function has_max_group_reached($db, $group_no)
{
    $query = mysqli_query($db,"select * from students where group_no = $group_no");
    $row = mysqli_fetch_array($query,MYSQL_ASSOC);

    

    if ($query->num_rows >= 3)
    {
        return true;
    }

    return false;
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if ($_POST['password'] == $_POST['verifypassword']){
        $student_id = $mysqli->real_escape_string($_POST['student_id']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = $mysqli->real_escape_string(md5($_POST['password']));
        $group_no = $mysqli->real_escape_string($_POST['group_no']);

        
        // Check if max group reached

        if(has_max_group_reached($db, $group_no))
        {
            echo "Group $group_no is complete. Join another group";
            $_SESSION['message'] ='Join another group, we are already complete';            
        }
        else{
            

       

            // check if registered
            if(check_if_already_registered($db,  $student_id)){
                echo "you're already there. Go away from here";
                $_SESSION['message'] = "you're already there. Go away from here";
            }
            else{
                $sql = "INSERT INTO students (student_id, email, password, group_no)" 
                        . "VALUES ('$student_id', '$email', '$password', '$group_no')";
                
                if ($mysqli->query($sql) ===  true) {
                    $_SESSION['message'] ='Registeration successful! Added $student_id to the system!';
                    $_SESSION['message'] ='Student ID already exists!';
                    header("location: login.php");
                }
                else {
                    $_SESSION['message'] = "User could not be added to the database!";
                }
            }
        }
    }
    else {
        $_SESSION['message'] = "Two password do not match!";
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
        <title>Register</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="main.css">
    </head>
    
    <body>
        <div class="heading">
            <h1>Register</h1>
        </div>    
        <nav>
            <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>
            
<form action="register.php" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <hr>
                <label for="student_id"><b>Student ID</b></label>
                <input type="text" name="student_id"><br><br>
                
                <label for="email"><b>Email</b></label><br>
                <input type="text" name="email"><br><br>
                
                <label for="password"><b>Password</b></label><br>
                <input type="password" name="password" autocomplete="new-password"><br><br>

                <label for="verifypassword"><b>Verify Password</b></label><br>
                <input type="password" name="verifypassword" autocomplete="new-password"><br><br>
                
                <label for="group_no"><b>Group Number</b></label>
                
                <!-- <input type="text" name="group_no"> -->

                <select name="group_no">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                </select>

                <br><br>
                
                <input type="submit">
                <hr>
            </div>
        </div>
    </div>
</form>

            
<footer>
    <p>By emmanz95</p>
    <p>All rights reserved</p>
</footer>
    </body>
</html>

