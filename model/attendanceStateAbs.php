<?php
include_once('../controller/config.php');
  $id = $_POST["id"];
  $current_month=date('F');
  $current_year=date('Y');
  $current_date=date("Y-m-d");
  $current_day=date("l");
  $current_time=date("h:i:s");
  $day_no=date("d");
  $my_school = $_POST["my_school"];
    $msg = 0;

  $index = "SELECT * FROM teacher where id='$id'";
    $result = mysqli_query($conn,$index);
    $row = mysqli_fetch_assoc($result);
    $index = $row['index_number'];

  $sql="INSERT INTO teacher_attendance (index_number,date,month,year,time,_status2, id_school) 
  VALUES ('".$index."','".$current_date."','".$current_month."','".$current_year."','".$current_time."','Absent',$my_school)";
  $req = "UPDATE teacher SET color='red' WHERE id='$id'";
    if(mysqli_query($conn,$sql) && mysqli_query($conn,$req)){
        $msg += 1;
    }else{
        $msg += 2;    
    }
    header("Location: ../view/add_attendance.php?dos&msg=$msg");
?>