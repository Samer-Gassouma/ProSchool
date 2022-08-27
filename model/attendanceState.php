<?php
include_once('../controller/config.php');
  $id = $_GET["id"];
  $current_month=date('F');
  $current_year=date('Y');
  $current_date=date("Y-m-d");
  $current_day=date("l");
  $current_time=date("h:i:s");
  $day_no=date("d");
  $s = "SELECT * FROM teacher where id='$id'";
    $result = mysqli_query($conn,$s);
    $row = mysqli_fetch_assoc($result);
    $index_number = $row['index_number'];


  $sql="INSERT INTO teacher_attendance (index_number, date,month,year,time,_status2) 
  VALUES ('".$index_number."','".$current_date."','".$current_month."','".$current_year."','".$current_time."','Present')";

    if(mysqli_query($conn,$sql)){
        $em ="success";
        header("Location: ../view/add_attendance.php?em=$em");
    }else{
        $em =  "error";
        header("Location: ../view/add_attendance.php?em=$em");
    }
?>