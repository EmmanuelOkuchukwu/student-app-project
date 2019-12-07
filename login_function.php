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