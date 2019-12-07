<?php
    include('session.php');
    if(isset($_SESSION['message']))
    {
      echo $_SESSION['message'];
      unset($_SESSION["message"]);
    }
    $group_no = $_SESSION["group_no"];
    
    function groupMember($db, $group_no)
    {
      $query = mysqli_query($db,"select * from students where group_no = $group_no");
      while($row=mysqli_fetch_array($query)){
        $result[] = $row;        
      }
      return $result;
    }

    function getRateScore($db, $student_id)
    {
        $query = mysqli_query($db,"select rate from rate_students where student_id = $student_id");
        $row = mysqli_fetch_array($query);
        if(isset($row['rate'])){
            return $row['rate'];
        }
    }
    function getComment($db, $student_id) 
    {
      $query = mysqli_query($db,"select comment from rate_students where student_id = $student_id");
      $row = mysqli_fetch_array($query);
      if(isset($row['comment'])){
          return $row['comment'];
      }
    }

    function getRaterid($db, $student_id)
    {
      $query = mysqli_query($db, "select rater_id from rate_students where student_id = $student_id");
      $row = mysqli_fetch_array($query);
      if(isset($row['rater_id'])){
        return $row['rater_id'];
      }
    }
?>