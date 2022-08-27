<?php
include_once('../controller/config.php');
  $id = $_POST["id"];
  $current_month=date('F');
  $current_year=date('Y');
  $current_date=date("Y-m-d");
  $current_day=date("l");
  $current_time=date("h:i:s");
  $msg - 0;
  $my_school = $_POST["my_school"];
  
    $req = "UPDATE teacher SET color='' WHERE id='$id' and id_school=$my_school";
   
    if(mysqli_query($conn,$req)){
        $msg += 1;
    }else{
        $msg += 2;    
    }
    header("Location: ../view/add_attendance.php?dos&msg=$msg");

  
?>