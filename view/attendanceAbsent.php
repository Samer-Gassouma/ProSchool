<?php
include_once('../controller/config.php');
if (isset($_POST['Absent'])) {
  $id = $_POST["id"];
  
  $Id_School = $_POST["Id_School"];
  echo $Id_School;
  $current_month=date('F');
  $current_year=date('Y');
  $current_date=date("Y-m-d");
  $current_day=date("l");
  $current_time=date("h:i:s");
  $day_no=date("d");



  $sql="INSERT INTO student_attendance (index_number, date,month,year,time,status,id_school) 
  VALUES ('".$id."','".$current_date."','".$current_month."','".$current_year."','".$current_time."','Absent','".$Id_School."')";
    $result1 = mysqli_query($conn,$sql); 
    if($result1){
        $pog = "UPDATE student SET color='red' WHERE id='$id'";
        $result2 = mysqli_query($conn,$pog);
        if($result2){
            $em =  "success";
            header("Location: ../view/Student_Attendance.php?em=$em");
        }
    }else{
        $em =  "error";
        header("Location: ../view/Student_Attendance.php?em=$em");
    }
}
else{


  $id = $_POST["id"];
  
  $Id_School = $_POST["Id_School"];
  $current_month=date('F');
  $current_year=date('Y');
  $current_date=date("Y-m-d");
  $current_day=date("l");
  $current_time=date("h:i:s");
  $day_no=date("d");



  $sql="INSERT INTO student_attendance (index_number, date,month,year,time,status,id_school) 
  VALUES ('".$id."','".$current_date."','".$current_month."','".$current_year."','".$current_time."','Retard','".$Id_School."')";
    $result1 = mysqli_query($conn,$sql); 
    if($result1){
        $pog = "UPDATE student SET color='Yellow' WHERE id='$id'";
        $result2 = mysqli_query($conn,$pog);
        if($result2){
            $em =  "success";
            header("Location: ../view/Student_Attendance.php?em=$em");
        }
    }else{
        $em =  "error";
        header("Location: ../view/Student_Attendance.php?em=$em");
    
}


}


?>


  