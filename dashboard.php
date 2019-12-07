<?php
include('dashboard_backend.php');
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Welcome <?php echo $_SESSION["stuid"]; ?></title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="newmain.css">
   </head>
   <body>
     <div class="heading">
       <h1>Dashboard</h1>
     </div>
       <nav>
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="logoff.php">Sign Out</a></li>
            </ul>
        </nav>
      <h1>Welcome <?php echo $_SESSION["stuid"]; ?></h1> 
      <div class="col-md-12">
          <div class="row">
              <div class="col-md-3">
                  <div class="left-content">
                      <img src="images/user_icon.jpg" width="100" height="100">
                      <hr>
                      <h2>Student id: <?php echo $_SESSION["stuid"]; ?></h2>
                      <h2>Email: <?php echo $_SESSION['email']; ?></h2>
                  </div>
              </div>
              <div class="col-md-9">
                  <div class="right-content">
                    <h2>Team Mates for group <?php echo $group_no?></h2><br/>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="box">
                            <table cellspacing="5" border="1">
                              <tr>
                                <th>Student id</th>
                                <th>Email </th>
                                <th>Rate score</th>
                                <th>Comments on performance</th>
                                <th>Rater ID</th>
                                <th>Delete</th>
                              </tr>
                                <?php foreach(groupMember($db, $group_no) as $student) {?>
                                  <tr>
                                    <td><?php echo $student['student_id'] ?></td>
                                      
                                      
                                       
                                    
                                    <td>
                                        

                                      <?php 
                                        if ($_SESSION["stuid"] == $student['student_id'])
                                        {
                                            echo $student['email'];
                                        }
                                        else{?>
                                          <a href="student-rate.php/?student_id=<?php echo $student['student_id']?>">
                                            <?php  echo $student['email']; ?>
                                          </a>  
                                        <?php }?>
                                    </td>
                                    <td><?php echo getRateScore($db, $student['student_id']); ?></td>
                                    <td><?php echo getComment($db, $student['student_id']); ?></td>
                                    <td><?php echo getRaterid($db, $student['student_id']);?></td>
                                    <td><a href="#">Delete</a></td>
                                  </tr>
                                <?php } ?>
                          </tr>
                          </table>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="box-2">
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est.</p>
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <br>
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <div class="chan-password">
              
            </div>
          </div>
          <div class="col-md-6">
            <div class="email-section"></div>
          </div>
        </div>
      </div>


      <footer>
          <p><b>Enter Footer details here</b><a href="#" class="fa fa-instagram"></a><a href="#" class="fa fa-youtube"></a><a href="#" class="fa fa-linkedin"></a></p>
      </footer>
      
   </body>  
</html>