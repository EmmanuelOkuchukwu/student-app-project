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