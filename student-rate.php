<!DOCTYPE html>
<html>
    <head>
        <title>Rate Student</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="main.css">
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
        <form action="student-rate.php" method="POST">
        
        <label for="student_id"><b>Student ID</b></label><br><br>
        <input type="text" name="student_id"><br><br>
        
        <label for="rate-student"><b>Rate your team-mates</b></label><br><br>
        <select name="rate-student">
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