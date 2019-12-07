<?php 
include('student-rate-backend.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
        body {
    margin: 0;
    background-color: green;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
    /*height: 1000px;*/
}

    nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    background-color: gray;
    overflow: hidden;
}

nav ul li {
    display: inline-block;
}

li a {
    color: white;
    display: block;
    padding: 14px 16px;
    text-decoration: none;
}

a:link {
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}

.heading {
    padding: 20px 10px;
    width: 100%;
    background-color: #cce5ff;
}

.heading h1 {
    text-align: left;
    color: black;
}
</style>
        <title>Rate Student</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <!-- <link rel="stylesheet" href="newmain.css"> -->
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