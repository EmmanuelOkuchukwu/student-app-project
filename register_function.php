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

// 
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