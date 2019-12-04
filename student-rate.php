<?php
session_start();
include("databaseConfig.php");
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$student_id_to_be_rated = (int)$_GET['student_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $student_id_to_be_rated;
    $rate = $mysqli->real_escape_string($_POST['rate']);
    $comment = $mysqli->real_escape_string($_POST['comment']);
    $rater_id = $_SESSION['login_user']; // Loged user
    

    if(groupMemberHasBeenRatedbyMe($db, $student_id_to_be_rated, $rater_id))
    {
        $_SESSION['message'] ='Already Rated';
        header("location:" .HOME_URL."/dashboard.php");
    }
    else{
        
        $sql = "INSERT INTO rate_students (student_id, rate, comment, rater_id)"
                . "VALUES ('$student_id', '$rate', '$comment', '$rater_id')";
                     
        if ($mysqli->query($sql) === true) {
            $_SESSION['message'] ='Feedback successfully submitted';
            header("location:" .HOME_URL."/dashboard.php");
        }
        else {
            $_SESSION['message'] = "Feedback could not be processed";
        }
    }
}

function groupMemberHasBeenRatedbyMe($db, $student_id_to_be_rated, $rater_id)
{
    // Search where 
    $query = mysqli_query($db,"select * from rate_students where student_id = $student_id_to_be_rated AND rater_id = $rater_id");
    if($query->num_rows == 1)
    {
        return true;
    }
    return false;
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Rate Student</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="newmain.css">
    </head>
    <body>
        <div class="heading">
            <h1>Rate Your Team Members</h1>
        </div>
        <nav>
            <ul>
                <li><a href="register.php">Register</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>
        <hr>
        <br>
        <form action="<?php echo HOME_URL ?>/student-rate.php?student_id=<?php echo $student_id_to_be_rated?>" method="POST">
        
        <label for="student_id"><b>Student ID</b></label><br><br>
        <input type="text" name="student_id"><br><br>
        
        <label for="rate"><b>Rate your team-mates</b></label><br><br>
        <select name="rate">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
        </select><br><br>

        <label for="comment"><b>Comments</b></label><br>
        <input type="text" name="comment"><br><br>

        <input type="submit">
        </form>
    </body>
</html>